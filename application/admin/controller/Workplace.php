<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Workplace as WorkplaceModel;
use app\admin\model\Space;
use app\admin\model\OrderWorkplace;
use app\admin\model\Contract;

class Workplace extends BaseController
{
    /**
     * 工位列表
     *
     */
    public function index()
    {
        // 获取参数
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        $type = request()->param('type/d',0);
        $id = request()->param('id/d');
        $workplace_no= request()->param('workplace_no');
        $status = request()->param('status');

        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'workplace_no'     => $workplace_no,
            'type'             => $type,
            'status'           => $status,
            'id'               => $id,
        ];
        $result = $this->validate($data, 'Workplace.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤筛选条件
        $conditions = [];
        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($workplace_no) {
            $conditions[] = ['workplace_no', 'like', '%' . $workplace_no . '%'];
        }
        if (is_null($status)) {
            $conditions[] = ['status', 'in',[0,1]];
        } else {
            switch ($status) {
                case 0:
                    $conditions[] = ['status', '=', $status];
                    break;
                case 1:
                    $conditions[] = ['status', '=', $status];
                    break;
                default:
                    break;
            }
        }
        $conditions[] = ['type', '=', $type];
        $workplace = WorkplaceModel::with(['workplaceGroup' => function($query) {
            $query->field('id,name');
        }, 'enterTeam', 'space'])->where($conditions)
            ->order('id')
            ->paginate($page_size, false, ['page' => $jump_page])
            ->each(function($item) {
                if ($item['type'] === 1){
                    $use_area = OrderWorkplace::where('workplace_id', $item['id'])->sum('workplace_area');
                    $item['residual_area'] = (string)($item['total_area'] - $use_area);
                } else {
                    unset($item['total_area']);
                }
                unset($item['enter_team_id']);
                unset($item['group_id']);
                return $item;
            });
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $workplace]);
    }


    /**
     * 新建更新
     *
     */
    public function save()
    {
        $id = request()->param('id');
        $workplace_no = request()->param('workplace_no');
        $space_id = request()->param('space_id/d');
        $type = request()->param('type/d', 0);
        $group_id = request()->param('group_id');
        $enter_team_id = request()->param('enter_team_id');
        $price = request()->param('price');
        $status = request()->param('status/d', 0);
        $deadline = request()->param('deadline');
        $total_area = request()->param('total_area');

        $data = [
            'id' => $id,
            'workplace_no' => $workplace_no,
            'space_id' => $space_id,
            'type' => $type,
            'group_id' => $group_id,
            'price' => $price,
            'status' => $status,
            'deadline' => $deadline,
        ];
        // 根据工位类型判断是按工位租赁还是按面积租赁
        if (!empty($type)) {
            // 按面积租赁
            $new_data = [
                'total_area' => $total_area,
            ];
            // 验证
            $data = array_merge($data,$new_data);
            $result   = $this->validate($data, 'Workplace.area_save');
            if (true !== $result) {
                return json(['code' => 401, 'message' => $result]);
            }
        } else {
            // 按工位租赁
            $new_data = [
                'enter_team_id' => $enter_team_id
            ];
            $data = array_merge($data,$new_data);
            $result   = $this->validate($data, 'Workplace.one_save');
            if (true !== $result) {
                return json(['code' => 401, 'message' => $result]);
            }
        }

        if (!empty($id)) {
            /* 更新数据 */
            $information = new WorkplaceModel;
            $result      = $information->save($data, ['id' => $id]);
        } else {
            /* 保存数据 */
            $information = new WorkplaceModel;
            $result      = $information->save($data);
        }

        if ($result) {
            return json(['code' => 200, 'message' => '保存成功!']);
        } else {
            return json(['code' => 404, 'message' => '保存失败!']);
        }

    }

    /**
     * 工位详情
     *
     */
    public function detail()
    {
        // 获取参数
        $id = request()->param('id');
        // 验证
        $data = [
            'id' => $id,
        ];
        $result = $this->validate($data,'Workplace.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $workplace = WorkplaceModel::where($data)
            ->with(['space','workplaceGroup'])
            ->field("enter_team_id,create_time,update_time",true)
            ->find()
            ->toArray();
        if ($workplace) {
            $use_area = OrderWorkplace::where('workplace_id', $id)->sum('workplace_area');
            $lease = [];
            // 按面积工位详情
            if ($workplace['type'] == 1) {
                $workplace['residual_area'] = (string)($workplace['total_area'] - $use_area);
                // 获取租赁信息
                $order_workplace = OrderWorkplace::where(['workplace_id' => $id])
                    ->with('order.team')
                    ->select();
                foreach ($order_workplace as $value) {
                    $contract = Contract::where('order_id',$value->order->id)
                        ->field("id,contract_no,begin_time,end_time")
                        ->find();
                    $lease['pay_type'] = $value->order->pay_type;
                    $lease['area'] = $value->workplace_area;
                    $lease['contract'] = $contract;
                    $lease['team'] = $value->order->team;
                    $lease['pay_type'] = $value->order->pay_type;
                }
            } else {
                // 按个租赁详情
                $order_workplace = OrderWorkplace::where(['workplace_id' => $id])
                    ->with('order,order.team')
                    ->find();
                if ($order_workplace) {
                    $contract = Contract::where('order_id',$order_workplace->order->id)
                        ->field("id,contract_no,begin_time,end_time")
                        ->find();
                    $lease['pay_type'] = $order_workplace->order->pay_type;
                    $lease['contract'] = $contract;
                    $lease['team'] = $order_workplace->order->team;
                    $lease['pay_type'] = $order_workplace->order->pay_type;
                }
                unset($workplace['total_area']);
            }
//            return json(['lease'=>$lease_data]);
            return json(['code' => 200, 'message' => '获取详情成功!', 'data' => ['workplace' => $workplace, 'lease' => $lease]]);
        } else {
            return json(['code' => 404, 'message' => '获取详情失败!']);
        }
    }

    /**
     * 工位删除
     *
     */
    public function delete()
    {
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];
        $result   = $this->validate($data, 'Workplace.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = WorkplaceModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }

    /**
     * 工位选择
     *
     */
    public function select()
    {
        $space_id = request()->param('space_id/d');
        $type = request()->param('type');
        if (empty($space_id)) {
            $space = Space::field('id,name')->select();
            return json(['code' => 200, 'message' => '获取空间列表成功', 'data' => $space]);
        } else {
            $workplaces = WorkplaceModel::where(['status' => 0, 'space_id' => $space_id, 'type' => $type])->field('id,workplace_no,type,total_area,price')->select();
            $data = [];
            foreach ($workplaces as $workplace) {
                if ($workplace['type'] === 1){
                    $use_area = OrderWorkplace::where('workplace_id', $workplace['id'])->sum('workplace_area');
                    $max_area = $workplace['total_area'] - $use_area;
                    $workplace['max_area'] = $max_area;
                }
                unset($workplace['total_area']);
                $data[] = $workplace;
            }
            return json(['code' => 200, 'message' => '获取工位列表成功', 'data' => $data]);
        }
    }
}
