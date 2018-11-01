<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\IncidentalOrder;
use app\admin\model\Incidental as IncidentalModel;
use app\admin\model\RecOrder;
use app\admin\model\Invoice;
use app\admin\model\Order;
use app\admin\model\EnterTeam;

class Incidental extends BaseController
{
    /**
     * 显示资源列表
     *
     */
    public function index()
    {
        // 获取参数
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        $id = request()->param('id');
        $order_no = request()->param('order_no');
        $status = request()->param('status');

        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'id'               => $id,
            'status'           => $status,
        ];
        $result = $this->validate($data, 'Incidental.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤筛选条件
        $conditions = [];
        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if (!is_null($status)) {
            $conditions[] = ['status', '=', $status];
        }
        $incidental = IncidentalModel::with('operator')
            ->where($conditions)
            ->order('create_time', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page])->each(function($item) {
                unset($item['operator_id']);
                return $item;
            });
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $incidental]);
//        $this->assign('list', $incidental);
//        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     */
    public function save()
    {
        $id = request()->param('id');
        $project = request()->param('project');
        $pay_type = request()->param('pay_type');
        $teams = request()->param('teams/a');
        $total_price = request()->param('total_price');
        $status = request()->param('status', 0);
        $data = [
            'project' => $project,
            'pay_type' => $pay_type,
            'operator_id' => 16, //session('admin.id')
            'teams' => $teams,
            'status' => $status
        ];
        $result = $this->validate($data, 'Incidental');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $incidental = new IncidentalModel();
        $invoice = new Invoice();
        $incidental->startTrans();
        try {
            $invoice_datas = [];
            if (empty($id)) {
                // 插入杂费收款表
                $incidental->save($data);
            } else {
                $incidental->save($data, ['id' => $id]);
                // 删除原先数据
                $order_ids = IncidentalOrder::where('incidental_id', $id)->column('id');
                IncidentalOrder::where('incidental_id', $id)->delete();
                Invoice::whereIn('rec_order_id', $order_ids)->delete();
            }
            foreach ($teams as $key => $team) {
                switch ($pay_type) {
                    case 1:
                        $count = count($teams);
                        $price = bcdiv($total_price, $count, 2);
                        break;
                    case 2:
                        $price = $team['price'];
                        break;
                    default:
                        $price = 0;
                        break;
                }
                $data = [
                    'order_no' => 'ZFDD' . time() . uniqid(),
                    'incidental_id' => $incidental->id,
                    'project' => $project,
                    'pay_type' => $pay_type,
                    'team_id' => $team['team_id'],
                    'price' => $price,
                    'status' => $status
                ];
                $result = $this->validate($data, 'IncidentalOrder');
                if (true !== $result) {
                    return json(['code' => 401, 'message' => $result]);
                }
                $incidental_order = new IncidentalOrder($data);
                $incidental_order->save();
                // 保存发票信息
                $rec_order = RecOrder::where('team_id', $team['team_id'])->field('id')->find();
                $invoice_data = Invoice::where('rec_order_id', $rec_order['id'])->find();
                if (empty($invoice_data)) {
                    return json(['code' => 401, 'message' => '收款对象还未签约租赁合同']);
                } else {
                    $invoice_data = $invoice_data->toArray();
                }
                unset($invoice_data['id'],$invoice_data['create_time'],$invoice_data['update_time'],$invoice_data['open_time']);
                $invoice_datas[$key] = $invoice_data;
                $invoice_datas[$key]['invoice_no'] = 'IN' . time() . uniqid();
                $invoice_datas[$key]['sale_order_id'] = $incidental->id;
                $invoice_datas[$key]['rec_order_id'] = $incidental->id;
                $invoice_datas[$key]['price'] = $price;
                $invoice_datas[$key]['order_type'] = 2;
                $invoice_datas[$key]['team_id'] = $team['team_id'];
            }
            $invoice->saveAll($invoice_datas);
            $incidental->commit();
            return json(['code' => 200, 'message' => '保存成功']);
        } catch (\Exception $e) {
            $incidental->rollback(); // 事务回滚
            return json(['code' => 404, 'message'=> '保存失败', 'data'=>$e->getMessage()]);
        }

    }

    /**
     * 详细
     */
    public function detail()
    {
        $id = request()->param('id');
        $data = [
            'id' => $id,
        ];
        $result = $this->validate($data, 'Incidental.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = [];
        $incidental = IncidentalModel::with('operator')->find($id);
        $detail['incidental'] = $incidental;
        unset($incidental['operator_id']);
        $incidental_order = IncidentalOrder::with(['team','invoice' => function($query) {
            return $query->where('order_type', '=', 2);
        }])->where('incidental_id', $id)->select();
        $order_info = [];
        $total_price = 0;
        foreach ($incidental_order as $key => $value) {
            if(isset($value['invoice']['rec_order_id'])) {
                unset($value['invoice']['rec_order_id']);
            }
            $order_info[$key]['price'] = $value['price'];
            $order_info[$key]['team'] = $value['team'];
            $order_info[$key]['invoice'] = $value['invoice'];
            $total_price = $total_price + $value['price'];
        }
        $detail['order_info'] = $order_info;
        $detail['incidental']['total_price'] = $total_price;
//        dump($incidental_order);die;

        return json(['code' => 200, 'message' => '获取成功', 'data' => $detail]);

    }

    public function process()
    {
        $order_id = request()->param('id');
        $data = [
            'id' => $order_id,
        ];
        $data = [];
        // 审核流程
        $incidental = IncidentalModel::with('operator')->find($order_id);
        $creator['user'] = $incidental['operator']['nickname'];
        $creator['dateline'] = $incidental['create_time'];
        $creator['status'] = 0;
        $data[] = $creator;
        $run = db('tb_run')->where(['from_table' => 'incidental', 'from_id' => $order_id])->field('id,flow_id')->find();
        $run_id = $run['id'];
        $flow_id = $run['flow_id'];
        $flow_process = db('tb_flow_process')->where('flow_id', $flow_id)->select();
        foreach ($flow_process as $process) {
            $run_process = db('tb_run_process')->where(['run_flow_process' => $process['id'], 'run_id' => $run_id])->find();
            if ($run_process['status'] === 2) {
                $run_log = db('tb_run_log')
                    ->alias('l')
                    ->leftJoin('tb_admin a', 'l.uid = a.id')
                    ->field('a.nickname as user,l.dateline')
                    ->find();
                $run_log['dateline'] = date('Y-m-d H:i:s', $run_log['dateline']);
                $run_log['status'] = 1;
                $data[] = $run_log;
            } elseif($run_process['status'] === 0) {
                // 待审核(找出符合条件的审核人)
                $run_process_data = [];
                $run_process_data['user'] = $run_process['sponsor_text'];
                $run_process_data['dateline'] = '';
                $run_process_data['status'] = 2;
                $data[] = $run_process_data;
            } else {
                $flow_process_data = [];
                switch ($process['auto_person']) {
                    case 4:
                        $flow_process_data['user'] = $process['auto_sponsor_text'];
                        break;
                    case 5:
                        $flow_process_data['user'] = $process['auto_role_text'];
                        break;
                    case 6:
                        $flow_process_data['user'] = $process['auto_dept_text'];
                        break;
                }

                $flow_process_data['dateline'] = '';
                $flow_process_data['status'] = 2;
                $data[] = $flow_process_data;
            }
        }
        return json(['code' => 200, 'data' => $data]);

    }


    /**
     * 删除指定资源
     *
     */
    public function delete()
    {
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];
        $result   = $this->validate($data, 'Incidental.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $incidental = IncidentalModel::get($id);
        if ($incidental) {
            $incidental->startTrans();
            try {
                if ($incidental->status !== 0) {
                    return json(['code' => 404, 'message' => '审核中或已审核的订单不可删除']);
                }
                // 删除订单
                $incidental->delete();
                // 删除收款订单
                IncidentalOrder::where('incidental_id', '=', $id)->delete();
                // 删除发票
                Invoice::where('sale_order_id', '=', $id)->delete();
                $incidental->commit();
                return json(['code' => 200, 'message' => '删除成功!']);
            } catch (\Exception $e) {
                $incidental->rollback();
                return json(['code' => 404, 'message' => '删除失败!']);
            }
        } else {
            return json(['code' => 404, 'message' => '找不到该订单信息']);
        }
    }

    public function enter_teams()
    {
        $team_ids = Order::where('status', '=', 2)->column('team_id');
        $team_ids = array_unique($team_ids);

        $team = EnterTeam::whereIn('id', $team_ids)->field('id,company')->select();
        if (!empty($team)) {
            return json(['code' => 200, 'message' => '获取下拉列表成功', 'data' => $team]);
        } else {
            return json(['code' => 404, 'message' => '获取下拉列表失败']);
        }

    }
}
