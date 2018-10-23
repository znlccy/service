<?php

namespace app\admin\controller;

use app\admin\model\OrderCopy;
use app\admin\model\RecOrder;
use think\Controller;
use think\Request;
use app\admin\model\Order as OrderModel;
use app\admin\model\Invoice;
use app\admin\model\OrderWorkplace;
use app\admin\model\Workplace;
use app\admin\model\Contract;
use think\Db;
use workflow\db\ProcessDb;
use app\admin\model\Admin;


class Order extends Controller
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
        $status = request()->param('status/d');

        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'order_no'         => $order_no,
            'id'               => $id,
            'status'           => $status,
        ];
        $result = $this->validate($data, 'Order.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤筛选条件
        $conditions = [];
        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($order_no) {
            $conditions[] = ['order_no', 'like', '%' . $order_no . '%'];
        }
        if (is_null($status)) {
            $conditions[] = ['status', 'in',[-1,0,1,2]];
        } else {
            $conditions[] = ['status', '=', $status];
        }
        $order = OrderModel::where($conditions)
            ->with('team')
            ->order('status')
            ->order('create_time', 'desc')
            ->field("id,order_no,total_price,status,create_time,team_id,contract_template_no,contract_years")
//            ->select();
            ->paginate($page_size, false, ['page' => $jump_page])->each(function ($item) {
                unset($item['team_id']);
                return $item;
            });
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $order]);
//        $this->assign('list', $order);
//        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     */
    public function save()
    {
        // 获取销售订单参数
        $id = request()->param('id');
        $order_no = 'XSDD' . time() . uniqid();
        $team_id = request()->param('team_id');
        $contract_template_no = request()->param('contract_template_no');
        $begin_time = request()->param('begin_time', date('Y-m-d',time()));
        $contract_years = request()->param('contract_years');
        $pay_type = request()->param('pay_type');
        $deposit = request()->param('deposit');
        $custom_content = request()->param('custom_content');
        $discount = request()->param('discount', 0);
        $remark = request()->param('remark');
        $order_status = request()->param('order_status/d', 0);
//        $total_price = request()->param('total_price');
//        $invoice_no = 'IN' . time() . uniqid();
        // 获取发票参数
        $opener_type = request()->param('opener_type');
        $invoice_title = request()->param('invoice_title');
        $type = request()->param('invoice_type');
        $tax = request()->param('tax');
        $bank = request()->param('bank');
        $account = request()->param('account');
        $address = request()->param('address');
        $phone = request()->param('phone');
        $invoice_status = request()->param('invoice_status/d', 0);
        // 抄送人
        $copy_ids = request()->param('copy_ids/a');
        // 获取工位参数
        $workplaces = request()->param('workplaces');
        // 订单数据
        $order_data = [
            'order_no' => $order_no,
            'team_id' => $team_id,
            'contract_template_no' => $contract_template_no,
            'contract_years' => $contract_years,
            'pay_type' => $pay_type,
            'deposit' => $deposit,
            'discount' => $discount,
            'remark' => $remark,
            'workplaces' => $workplaces,
            'operator_id' => session('admin.id'),
//            'total_price' => $total_price,
            'status' => $order_status,
//            'invoice_no' => $invoice_no,
        ];

        $result = $this->validate($order_data, 'Order');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        unset($order_data['workplaces']);
        // 计算总金额
        $total_price = 0;
        $workplace_ids = [];
        foreach ($workplaces as $workplace) {
            $wp = Workplace::where('id', $workplace['workplace_id'])->field('type,price')->find();
            if ($wp['type'] === 1) {
                $price = $workplace['workplace_area'] * $wp['price'];
            } else {
                $price = $wp['price'];
            }
            $total_price = $total_price + $price;
        }
        if ($total_price < $discount) {
            return json(['code' => 401, 'message' => '折扣金额不能大于总金额']);
        }
        // 减去优惠金额
        $total_price = $total_price - $discount;
        $order_data['total_price'] = $total_price;
        // 合同数据
        $months = $contract_years * 12;
        $end_time = date("Y-m-d",strtotime("+$months month",strtotime($begin_time)));
        $contract_data = [
            'contract_no' => 'CN' . uniqid(),
//            'order_id' => $order->id,
            'contract_template_no' => $contract_template_no,
            'operator_id' => session('admin.id'),
            'custom_content' => $custom_content,
            'status' => 0,
            'begin_time' => $begin_time,
            'end_time' => $end_time,
        ];

        // 发票数据
        $invoice_data = [
//            'invoice_no' => $invoice_no,
//            'order_no' => $order_no,
            'opener_type' => $opener_type,
            'invoice_title' => $invoice_title,
            'type' => $type,
            'tax' => $tax,
            'bank' => $bank,
            'account' => $account,
            'address' => $address,
            'phone' => $phone,
            'team_id' => $team_id,
//            'price' => $deposit,
            'status' => $invoice_status,
        ];

        // 实例化模型
        $order = new OrderModel();
//        $invoice = new Invoice();
        $contract = new Contract();
        $order_workplace = new OrderWorkplace();
        $order_copy = new OrderCopy();
        // 开启事务
        $order->startTrans();
        try {
            // 新增
            if(empty($id)) {
                $order->save($order_data);
//            $invoice->save($invoice_data);
                // 插入订单工位中间表
                if (!empty($workplaces)) {
                    $list = [];
                    foreach ($workplaces as $value) {
                        $workplace_id = isset($value['workplace_id']) ? $value['workplace_id'] : '';
                        $workplace_area = isset($value['workplace_area']) ? $value['workplace_area'] : '';
                        $data = [
                            'order_id' => $order->id,
                            'workplace_id' => $workplace_id,
                            'workplace_area' => $workplace_area
                        ];
                        // 验证参数
                        $result = $this->validate($data, 'OrderWorkplace');
                        if (true !== $result) {
                            return json(['code' => 401, 'message' => $result]);
                        } else {
                            // 更新工位信息
                            $workplace = Workplace::get($workplace_id);
                            // 工位剩余面积
                            $area = OrderWorkplace::where('workplace_id', $workplace_id)->sum('workplace_area');
                            $residual_area = floatval($workplace->total_area) - floatval($area);
                            // 判断工位类型
                            if ($workplace->type == 0) {
                                // 更新工位的租赁团队
                                $workplace->enter_team_id = $team_id;
                                // 工位状态
                                $workplace->status = 1;
                            } else {
                                if ($residual_area == 0) {
                                    // 工位状态
                                    $workplace->status = 1;
                                }
                            }

                            if ($residual_area < $workplace_area) {
                                $workplace_no = $workplace->workplace_no;
                                return json(['code' => 404, 'message' => $workplace_no. '工位面积不足']);
                            }
                            // 更新保存工位状态
                           $workplace->save();

                        }
                        $list[] = $data;
                    }
                    $order_workplace->saveAll($list);
                }
                // 合同新增
                $contract_data['order_id'] = $order->id;
                $result = $this->validate($contract_data, 'Contract');
                if (true !== $result) {
                    return json(['code' => 401, 'message' => $result]);
                }
                // 保存合同数据
                $contract->save($contract_data);

                // 保存订单抄送人
                $order_copy_data = [];
                if (!empty($copy_ids)) {
                    foreach ($copy_ids as $copy_id) {
                        $order_copy_data[] = [
                            'order_id' => $order->id,
                            'user_id' => $copy_id
                        ];
                    }
                    $order_copy->saveAll($order_copy_data);
                }
                // 保存收款订单
                switch ($pay_type) {
                    case 1: // 月付
                        $price = bcdiv($total_price, $months, 2);
                        for ($i = 0; $i < $months; $i++) {
                            $rec_order = new RecOrder();
                            $invoice = new Invoice();
                            $rec_order_no = 'XSDD' . time() . uniqid();
                            $invoice_no = 'IN' . time() . uniqid();
                            // 第一次订单金额需要加上定金金额
                            if ($i === 0) {
                                $real_price = $price + $deposit;
                            } else {
                                $real_price = $price;
                            }
                            // 收款订单数据
                            $data = [
                                'sale_order_id' => $order->id,
                                'order_no' => $rec_order_no,
                                'invoice_no' => $invoice_no,
                                'team_id' => $team_id,
                                'deadline' => date('Y-m-d', strtotime("+$i month",strtotime($begin_time))),
                                'status' => 0,
                                'price' => $real_price
                            ];
                            $result = $this->validate($data, 'RecOrder');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $rec_order->save($data);
                            // 发票数据
                            // 第一次发票金额加上定金金额
                            if ($i === 0) {
                                $invoice_data['price'] = $price + $deposit;
                            } else {
                                $invoice_data['price'] = $price;
                            }
                            $invoice_data['invoice_no'] = $invoice_no;
                            $invoice_data['sale_order_id'] = $order->id;
                            $invoice_data['rec_order_id'] = $rec_order->id;
                            $invoice_data['order_type'] = 1;
                            $result = $this->validate($invoice_data,'Invoice');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $invoice->save($invoice_data);
                        }
                        break;
                    case 2: // 季付
                        $quarter = $contract_years * 12 / 4;
                        $price = bcdiv($total_price, $quarter, 2);
                        for ($i = 0; $i < $quarter; $i++) {
                            $rec_order = new RecOrder();
                            $invoice = new Invoice();
                            $rec_order_no = 'XSDD' . time() . uniqid();
                            $invoice_no = 'IN' . time() . uniqid();
                            // 收款订单数据
                            // 第一次订单金额需要加上定金金额
                            if ($i === 0) {
                                $real_price = $price + $deposit;
                            } else {
                                $real_price = $price;
                            }
                            $data = [
                                'sale_order_id' => $order->id,
                                'order_no' => $rec_order_no,
//                            'invoice_no' => $invoice_no,
                                'team_id' => $team_id,
                                'deadline' => date('Y-m-d', strtotime("+$i month",strtotime($begin_time))),
                                'status' => 0,
                                'price' => $real_price
                            ];
                            $result = $this->validate($data, 'RecOrder');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $rec_order->save($data);
                            // 发票数据
                            // 第一次发票金额加上定金金额
                            if ($i === 0) {
                                $invoice_data['price'] = $price + $deposit;
                            } else {
                                $invoice_data['price'] = $price;
                            }
                            $invoice_data['invoice_no'] = $invoice_no;
                            $invoice_data['sale_order_id'] = $order->id;
                            $invoice_data['rec_order_id'] = $rec_order->id;
                            $invoice_data['order_type'] = 1;
                            $result = $this->validate($invoice_data,'Invoice');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $invoice->save($invoice_data);
                        }
                        break;
                    case 3: // 半年付
                        $half_year = $contract_years * 12 / 6;
                        $price = bcdiv($total_price, $half_year, 2);
                        for ($i = 0; $i < $half_year; $i++) {
                            $rec_order = new RecOrder();
                            $invoice = new Invoice();
                            $rec_order_no = 'XSDD' . time() . uniqid();
                            $invoice_no = 'IN' . time() . uniqid();
                            // 收款订单数据
                            // 第一次订单金额需要加上定金金额
                            if ($i === 0) {
                                $real_price = $price + $deposit;
                            } else {
                                $real_price = $price;
                            }
                            $data = [
                                'sale_order_id' => $order->id,
                                'order_no' => $rec_order_no,
//                            'invoice_no' => $invoice_no,
                                'team_id' => $team_id,
                                'deadline' => date('Y-m-d', strtotime("+$i month",strtotime($begin_time))),
                                'status' => 0,
                                'price' => $real_price
                            ];
                            $result = $this->validate($data, 'RecOrder');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $rec_order->save($data);
                            // 发票数据
                            // 第一次发票金额加上定金金额
                            if ($i === 0) {
                                $invoice_data['price'] = $price + $deposit;
                            } else {
                                $invoice_data['price'] = $price;
                            }
                            $invoice_data['invoice_no'] = $invoice_no;
                            $invoice_data['sale_order_id'] = $order->id;
                            $invoice_data['rec_order_id'] = $rec_order->id;
                            $invoice_data['order_type'] = 1;
                            $result = $this->validate($invoice_data,'Invoice');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $invoice->save($invoice_data);
                        }
                        break;
                    case 4: // 年付
                        $price = bcdiv($total_price, $contract_years, 2);
                        for ($i = 0; $i < $contract_years; $i++) {
                            $rec_order = new RecOrder();
                            $invoice = new Invoice();
                            $rec_order_no = 'XSDD' . time() . uniqid();
                            $invoice_no = 'IN' . time() . uniqid();
                            // 收款订单数据
                            // 第一次订单金额需要加上定金金额
                            if ($i === 0) {
                                $real_price = $price + $deposit;
                            } else {
                                $real_price = $price;
                            }
                            $data = [
                                'sale_order_id' => $order->id,
                                'order_no' => $rec_order_no,
//                            'invoice_no' => $invoice_no,
                                'team_id' => $team_id,
                                'deadline' => date('Y-m-d', strtotime("+$i month",strtotime($begin_time))),
                                'status' => 0,
                                'price' => $real_price
                            ];
                            $result = $this->validate($data, 'RecOrder');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $rec_order->save($data);
                            // 发票数据
                            // 第一次发票金额加上定金金额
                            if ($i === 0) {
                                $invoice_data['price'] = $price + $deposit;
                            } else {
                                $invoice_data['price'] = $price;
                            }
                            $invoice_data['invoice_no'] = $invoice_no;
                            $invoice_data['sale_order_id'] = $order->id;
                            $invoice_data['rec_order_id'] = $rec_order->id;
                            $invoice_data['order_type'] = 1;
                            $result = $this->validate($invoice_data,'Invoice');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $invoice->save($invoice_data);
                        }
                        break;
                    default: // 金额
                        $rec_order = new RecOrder();
                        $invoice = new Invoice();
                        $rec_order_no = 'XSDD' . time() . uniqid();
                        $invoice_no = 'IN' . time() . uniqid();
                        // 收款订单数据
                        $data = [
                            'sale_order_id' => $order->id,
                            'order_no' => $rec_order_no,
//                        'invoice_no' => $invoice_no,
                            'team_id' => $team_id,
                            'deadline' => date('Y-m-d', strtotime($begin_time)),
                            'status' => 0,
                            'price' => $total_price + $deposit
                        ];
                        $result = $this->validate($data, 'RecOrder');
                        if (true !== $result) {
                            return json(['code' => 401, 'message' => $result]);
                        }
                        $rec_order->save($data);
                        // 发票数据
                        // 第一次发票金额加上定金金额
                        $invoice_data['price'] = $price + $deposit;
                        $invoice_data['invoice_no'] = $invoice_no;
                        $invoice_data['sale_order_id'] = $order->id;
                        $invoice_data['rec_order_id'] = $rec_order->id;
                        $invoice_data['order_type'] = 1;
                        $result = $this->validate($invoice_data,'Invoice');
                        if (true !== $result) {
                            return json(['code' => 401, 'message' => $result]);
                        }
                        $invoice->save($invoice_data);
                        break;
                }
            } else {
            // 更新
                $order->save($order_data, ['id' => $id]);
                // 订单工位表更新
                if (!empty($workplaces)) {
                    // 删除原来的数据
                    $workplace_ids = OrderWorkplace::where('order_id', $id)->column('workplace_id');
                    // 更新工位状态为可用
                    $status = Workplace::whereIn('id', $workplace_ids)->update(['status' => 0]);
                    $delete = OrderWorkplace::where('order_id', $id)->delete();
                    $list = [];
                    foreach ($workplaces as $value) {
                        $workplace_id = isset($value['workplace_id']) ? $value['workplace_id'] : '';
                        $workplace_area = isset($value['workplace_area']) ? $value['workplace_area'] : '';
                        $data = [
                            'order_id' => $id,
                            'workplace_id' => $workplace_id,
                            'workplace_area' => $workplace_area
                        ];
                        // 验证参数
                        $result = $this->validate($data, 'OrderWorkplace');
                        if (true !== $result) {
                            return json(['code' => 401, 'message' => $result]);
                        } else {
                            // 更新工位信息
                            $workplace = Workplace::get($workplace_id);
                            // 工位剩余面积
//                            $residual_area = floatval($workplace->residual_area) - floatval($workplace_area);
                            $area = OrderWorkplace::where('workplace_id', $workplace_id)->sum('workplace_area');
                            $residual_area = floatval($workplace->total_area) - floatval($area);
                            // 判断工位类型
                            if (empty($workplace->type)) {
                                // 更新工位的租赁团队
                                $workplace->enter_team_id = $team_id;
                                // 工位状态
                                $workplace->status = 1;
                            } else {
                                if ($residual_area == 0) {
                                    // 工位状态
                                    $workplace->status = 1;
                                }
                            }

                            if ($residual_area < $workplace_area) {
                                $workplace_no = $workplace->workplace_no;
                                return json(['code' => 404, 'message' => $workplace_no. '工位面积不足']);
                            }
                            $workplace->update_time = date('Y-m-d H:i:s', time());
                            if(!$workplace->save()) {
                                return json(['code' => 404, 'message' => '工位状态更新失败']);
                            }
                        }
                        $list[] = $data;
                    }
                    $order_workplace->saveAll($list);
                }
                // 合同更新
                $contract_data['order_id'] = $id;
                $result = $this->validate($contract_data, 'Contract');
                if (true !== $result) {
                    return json(['code' => 401, 'message' => $result]);
                }
                // 更新合同数据
                $contract->save($contract_data, ['order_id' => $id]);
                // 更新抄送人
                $delete = OrderCopy::where('order_id',$id)->delete();
                $order_copy_data = [];
                if (!empty($copy_ids)) {
                    foreach ($copy_ids as $copy_id) {
                        $order_copy_data[] = [
                            'order_id' => $id,
                            'user_id' => $copy_id
                        ];
                    }
                    $order_copy->saveAll($order_copy_data);
                }
                // 更新收款订单
                $rec_order_delete = RecOrder::where(['sale_order_id' => $id])->delete();
                $invoice_delete = Invoice::where(['sale_order_id' => $id])->delete();
                switch ($pay_type) {
                    case 1: // 月付
                        $price = bcdiv($total_price, $months, 2);
                        for ($i = 0; $i < $months; $i++) {
                            $rec_order = new RecOrder();
                            $invoice = new Invoice();
                            $rec_order_no = 'XSDD' . time() . uniqid();
                            $invoice_no = 'IN' . time() . uniqid();
                            // 第一次订单金额需要加上定金金额
                            if ($i === 0) {
                                $real_price = $price + $deposit;
                            } else {
                                $real_price = $price;
                            }
                            // 收款订单数据
                            $data = [
                                'sale_order_id' => $id,
                                'order_no' => $rec_order_no,
                                'invoice_no' => $invoice_no,
                                'team_id' => $team_id,
                                'deadline' => date('Y-m-d', strtotime("+$i month",strtotime($begin_time))),
                                'status' => 0,
                                'price' => $real_price
                            ];
                            $result = $this->validate($data, 'RecOrder');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $rec_order->save($data);
                            // 发票数据
                            $invoice_data['price'] = $price;
                            $invoice_data['invoice_no'] = $invoice_no;
                            $invoice_data['sale_order_id'] = $id;
                            $invoice_data['rec_order_id'] = $rec_order->id;
                            $result = $this->validate($invoice_data,'Invoice');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $invoice->save($invoice_data);
                        }
                        break;
                    case 2: // 季付
                        $quarter = $contract_years * 12 / 4;
                        $price = bcdiv($total_price, $quarter, 2);
                        for ($i = 0; $i < $quarter; $i++) {
                            $rec_order = new RecOrder();
                            $invoice = new Invoice();
                            $rec_order_no = 'XSDD' . time() . uniqid();
                            $invoice_no = 'IN' . time() . uniqid();
                            // 第一次订单金额需要加上定金金额
                            if ($i === 0) {
                                $real_price = $price + $deposit;
                            } else {
                                $real_price = $price;
                            }
                            // 收款订单数据
                            $data = [
                                'sale_order_id' => $id,
                                'order_no' => $rec_order_no,
//                            'invoice_no' => $invoice_no,
                                'team_id' => $team_id,
                                'deadline' => date('Y-m-d', strtotime("+$i month",strtotime($begin_time))),
                                'status' => 0,
                                'price' => $real_price
                            ];
                            $result = $this->validate($data, 'RecOrder');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $rec_order->save($data);
                            // 发票数据
                            $invoice_data['price'] = $price;
                            $invoice_data['invoice_no'] = $invoice_no;
                            $invoice_data['sale_order_id'] = $id;
                            $invoice_data['rec_order_id'] = $rec_order->id;
                            $result = $this->validate($invoice_data,'Invoice');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $invoice->save($invoice_data);
                        }
                        break;
                    case 3: // 半年付
                        $half_year = $contract_years * 12 / 6;
                        $price = bcdiv($total_price, $half_year, 2);
                        for ($i = 0; $i < $half_year; $i++) {
                            $rec_order = new RecOrder();
                            $invoice = new Invoice();
                            $rec_order_no = 'XSDD' . time() . uniqid();
                            $invoice_no = 'IN' . time() . uniqid();
                            // 第一次订单金额需要加上定金金额
                            if ($i === 0) {
                                $real_price = $price + $deposit;
                            } else {
                                $real_price = $price;
                            }
                            // 收款订单数据
                            $data = [
                                'sale_order_id' => $id,
                                'order_no' => $rec_order_no,
//                            'invoice_no' => $invoice_no,
                                'team_id' => $team_id,
                                'deadline' => date('Y-m-d', strtotime("+$i month",strtotime($begin_time))),
                                'status' => 0,
                                'price' => $real_price
                            ];
                            $result = $this->validate($data, 'RecOrder');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $rec_order->save($data);
                            // 发票数据
                            $invoice_data['price'] = $price;
                            $invoice_data['invoice_no'] = $invoice_no;
                            $invoice_data['sale_order_id'] = $id;
                            $invoice_data['rec_order_id'] = $rec_order->id;
                            $result = $this->validate($invoice_data,'Invoice');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $invoice->save($invoice_data);
                        }
                        break;
                    case 4: // 年付
                        $price = bcdiv($total_price, $contract_years, 2);
                        for ($i = 0; $i < $contract_years; $i++) {
                            $rec_order = new RecOrder();
                            $invoice = new Invoice();
                            $rec_order_no = 'XSDD' . time() . uniqid();
                            $invoice_no = 'IN' . time() . uniqid();
                            // 第一次订单金额需要加上定金金额
                            if ($i === 0) {
                                $real_price = $price + $deposit;
                            } else {
                                $real_price = $price;
                            }
                            // 收款订单数据
                            $data = [
                                'sale_order_id' => $id,
                                'order_no' => $rec_order_no,
//                            'invoice_no' => $invoice_no,
                                'team_id' => $team_id,
                                'deadline' => date('Y-m-d', strtotime("+$i month",strtotime($begin_time))),
                                'status' => 0,
                                'price' => $real_price
                            ];
                            $result = $this->validate($data, 'RecOrder');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $rec_order->save($data);
                            // 发票数据
                            $invoice_data['price'] = $price;
                            $invoice_data['invoice_no'] = $invoice_no;
                            $invoice_data['sale_order_id'] = $id;
                            $invoice_data['rec_order_id'] = $rec_order->id;
                            $result = $this->validate($invoice_data,'Invoice');
                            if (true !== $result) {
                                return json(['code' => 401, 'message' => $result]);
                            }
                            $invoice->save($invoice_data);
                        }
                        break;
                    default: // 金额
                        $rec_order = new RecOrder();
                        $invoice = new Invoice();
                        $rec_order_no = 'XSDD' . time() . uniqid();
                        $invoice_no = 'IN' . time() . uniqid();
                        // 收款订单数据
                        $data = [
                            'sale_order_id' => $id,
                            'order_no' => $rec_order_no,
//                        'invoice_no' => $invoice_no,
                            'team_id' => $team_id,
                            'deadline' => date('Y-m-d', strtotime($begin_time)),
                            'status' => 0,
                            'price' => $total_price + $deposit
                        ];
                        $result = $this->validate($data, 'RecOrder');
                        if (true !== $result) {
                            return json(['code' => 401, 'message' => $result]);
                        }
                        $rec_order->save($data);
                        // 发票数据
                        $invoice_data['price'] = $total_price;
                        $invoice_data['invoice_no'] = $invoice_no;
                        $invoice_data['sale_order_id'] = $id;
                        $invoice_data['rec_order_id'] = $rec_order->id;
                        $result = $this->validate($invoice_data,'Invoice');
                        if (true !== $result) {
                            return json(['code' => 401, 'message' => $result]);
                        }
                        $invoice->save($invoice_data);
                        break;
                }
            }
            $order->commit();
            return json(['code' => 200, 'message'=> '保存成功']);
        } catch (\Exception $e) {
            $order->rollback(); // 事务回滚
            return json(['code' => 404, 'message'=> '保存失败', 'data'=>$e->getMessage()]);
        }
    }

    /**
     * 订单详情
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
        $result = $this->validate($data,'Order.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $order = OrderModel::where($data)
            ->with(['operator' => function ($query) {
                $query->field('id,nickname');
            }, 'team', 'rec_order.invoice'])
            ->find();
        $workplace_arr = [];
        if (!empty($order)) {
            $order_workplaces = OrderWorkplace::where('order_id', $id)
                ->with(['workplace.space'])
                ->select();
            foreach ($order_workplaces as $order_workplace) {
                // 获取工位所属空间
                $space = $order_workplace->workplace->space;
                $space_data[] = $space;
            }
            foreach ($space_data as $key => $value) {
                $workplace_arr[$key]['space'] = $value->toArray();
                foreach ($order_workplaces as $order_workplace) {
                    $workplace = $order_workplace->workplace;
                    if ($workplace->space_id == $value->id) {
                        if ($workplace->type == 1) {
                            $workplace_arr[$key]['space']['workplace']['id'] = $workplace->id;
                            $workplace_arr[$key]['space']['workplace']['workplace_no'] = $workplace->workplace_no;
                            $workplace_arr[$key]['space']['workplace']['price'] = $workplace->price;
                            $workplace_arr[$key]['space']['workplace']['area'] = $order_workplace->workplace_area;
                        } else {
                            $workplace_arr[$key]['space']['workplace']['id'] = $workplace->id;
                            $workplace_arr[$key]['space']['workplace']['workplace_no'] = $workplace->workplace_no;
                            $workplace_arr[$key]['space']['workplace']['price'] = $workplace->price;
//                            $workplace_arr[$key]['space']['workplace']['area'] = $order_workplace->workplace_area;
                        }
                    }
                }
            }
            // 收款计划
            $rec_plans = [];
//            $rec_orders = $order->recOrder;
            $order['space_workplace'] = $workplace_arr;
            // 发票信息
            $order['invoice'] = Invoice::where(['order_type' => 1, 'sale_order_id' => $id])->find();
            // 抄送人信息
            $copy_users = OrderCopy::with('user')->where('order_id', $id)->select();
            $copys =[];
            foreach ($copy_users as $key => $copy_user) {
                $copys[] = $copy_user['user'];
            }
            $order['copy_user'] = $copys;
        }
        $detail = ['order' => $order];
        if ($detail) {
            unset($order['team_id'],$order['operator_id'],$order['recOrder']);
            return json(['code' => 200, 'message' => '获取详情成功!', 'data' => $detail]);
        } else {
            return json(['code' => 404, 'message' => '获取详情失败!']);
        }
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
        $result   = $this->validate($data, 'Order.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $order = OrderModel::get($id);
        if ($order) {
            $order->startTrans();
            try {
                if ($order->status !== 0) {
                    return json(['code' => 404, 'message' => '审核中或已审核的订单不可删除']);
                }
                // 删除订单
                $order->delete();
                // 删除收款订单
                RecOrder::where('sale_order_id', '=', $id)->delete();
                // 删除合同
                Contract::where('order_id', '=', $id)->delete();
                // 删除发票
                Invoice::where('sale_order_id', '=', $id)->delete();
                $order->commit();
                return json(['code' => 200, 'message' => '删除成功!']);
            } catch (\Exception $e) {
                $order->rollback();
                return json(['code' => 404, 'message' => '删除失败!']);
            }
        } else {
            return json(['code' => 404, 'message' => '找不到该订单信息']);
        }
    }

    /**
     * 流程进度
     *
     */
    public function progress()
    {
        $order_id = request()->param('id');
        // 验证
        $data = [
            'id' => $order_id,
        ];
        $result = $this->validate($data,'Order.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $data = [];
        // 审核流程
        $order = OrderModel::with('operator')->find($order_id);
        $creator['user'] = $order['operator']['nickname'];
        $creator['dateline'] = $order['create_time'];
        $creator['status'] = 0;
        $data[] = $creator;
        $run = db('tb_run')->where(['from_table' => 'order', 'from_id' => $order_id])->field('id,flow_id')->find();
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
     * 抄送人选择
     *
     */
    public function copy()
    {
        $copy = Admin::field('id,nickname')->select();
        return json(['code' => 200, 'message' => '获取列表成功', 'data' => $copy]);
    }

    /**
     * 查看订单(审核时）
     *
     */
    public function view()
    {
        $info = db('tb_order')->find(input('id'));
        $this->assign('info', $info);
        return $this->fetch();
    }

}
