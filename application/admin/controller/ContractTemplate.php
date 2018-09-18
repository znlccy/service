<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\ContractTemplate as ContractTemplateModel;
use app\admin\model\HistoryTemplate;

class ContractTemplate extends BaseController
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
        $name = request()->param('name');
        $status = request()->param('status/d');

        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'name'             => $name,
            'id'               => $id,
            'status'           => $status,
        ];
        $result = $this->validate($data, 'ContractTemplate.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤筛选条件
        $conditions = [];
        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($name) {
            $conditions[] = ['name', 'like', '%' . $name . '%'];
        }
        if ($status === 0 || $status) {
            $conditions[] = ['status', '=', $status];
        }
        $template = ContractTemplateModel::where($conditions)
            ->order('id')
            ->paginate($page_size, false, ['page' => $jump_page]);
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $template]);
    }


    /**
     * 模板新建更新
     *
     */
    public function save()
    {
        // 获取参数
        $id = request()->param('id');
        $name = request()->param('name');
        $remark = request()->param('remark');
        $rich_text = request()->param('rich_text');
        $template_no = 'CT' . uniqid();
        $operator_id = session('admin.id');
        $status = request()->param('status', 1);
        $data = [
            'id' => $id,
            'name' => $name,
            'remark' => $remark,
            'rich_text' => $rich_text,
            'template_no' => $template_no,
            'operator_id' => $operator_id,
            'status' => $status,
        ];
        // 验证
        $result = $this->validate($data, 'ContractTemplate');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        if (empty($id)) {
            $template = new ContractTemplateModel();
            $result = $template->save($data);
        } else {
            // 保存历史数据
            $history = ContractTemplateModel::get($id);
            $history_data = [
                'name' => $history->name,
                'template_no' => $history->template_no,
                'template_id' => $history->id,
                'remark' => $history->remark,
                'rich_text' => $history->rich_text,
                'editor' => $history->operator_id,
                'status' => $history->status,
            ];
            $history = new HistoryTemplate();
            $result = $history->save($history_data);
            if ($result) {
                $template = new ContractTemplateModel();
                $result = $template->save($data,['id',$id]);
            } else {
                return json(['code' => 404, 'message' => '历史模板保存失败']);
            }
        }

        if ($result) {
            return json(['code' => 200, 'message' => '保存成功']);
        } else {
            return json(['code' => 404, 'message' => '保存失败']);
        }

    }

    /**
     * 模板详细
     *
     */
    public function detail()
    {
        // 获取前端传的参数
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];

        $result   = $this->validate($data, 'ContractTemplate.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = ContractTemplateModel::where('id', $id)->find();

        if ($detail) {
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
        $result   = $this->validate($data, 'ContractTemplate.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = ContractTemplateModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }

    /**
     * 模板下拉列表
     */
    public function select()
    {
        $template = ContractTemplateModel::where('status', 1)->field('template_no,name,rich_text')->select();
        if ($template) {
            return json(['code' => 200, 'message' => '获取列表成功', 'data' => $template]);
        } else {
            return json(['code' => 404, 'message' => '获取列表失败']);
        }
    }
}
