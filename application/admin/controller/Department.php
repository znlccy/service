<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Department as DepartmentModel;
use app\admin\model\DepartmentUser;
use app\admin\model\Admin as Member;
class Department extends BaseController
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
        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'name'             => $name,
            'id'               => $id,
        ];
        $result = $this->validate($data, 'Department.index');
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
        $department = DepartmentModel::where($conditions)->field('id,name,p_id,description')->select()->toArray();
        $list = $this->generateTree($department);
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $list]);
    }
    /**
     * 新建更新部门
     *
     */
    public function save()
    {
        // 获取参数
        $id = request()->param('id');
        $name = request()->param('name');
        $p_id = request()->param('p_id', 0);
        $description = request()->param('description');
        // 验证
        $data = [
            'id' => $id,
            'name' => $name,
            'p_id' => $p_id,
            'description' => $description
        ];
        $result = $this->validate($data, 'Department');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $department = new DepartmentModel();
        if (empty($id)) {
            $result = $department->save($data);
        } else {
            $result = $department->save($data, ['id' => $id]);
        }
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功']);
        } else {
            return json(['code' => 404, 'message' => '保存失败']);
        }
    }
    /**
     * 部门详情
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
        $result   = $this->validate($data, 'Department.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = DepartmentModel::where('id', $id)->find();
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
        $result   = $this->validate($data, 'Department.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = DepartmentModel::destroy($id);
        if ($result) {
            // 删除中间表
            DepartmentUser::where(['department_id' => $id])->delete();
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }

    /**
     * 设置负责人
     *
     */
    public function leader()
    {
        $id = request()->param('id');
        $data = [
            'id' => $id
        ];
        $result = $this->validate($data, 'Department.leader');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = DepartmentUser::where('user_id', $id)->update(['role' => 1]);
        if ($result) {
            return json(['code' => 200, 'message' => '设置成功']);
        } else {
            return json(['code' => 404, 'message' => '设置失败']);
        }
    }

    /**
     * 成员下拉列表
     */
    public function select_member()
    {
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];
        $result   = $this->validate($data, 'Department.member');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $member = Member::where(['department_id' => $id])->field('id,nickname')->select();
        return json(['code' => 200, 'message' => '获取成员信息成功', 'data' => $member]);
    }

    /**
     * 部门下拉选择
     */
    public function select()
    {
        $team_id = request()->param('operation_team_id/d', 0);
        $department = DepartmentModel::where('operation_team_id', $team_id)->field('id,p_id,name')->select();
        $tree = $this->buildTrees($department, 0);
        if ($tree) {
            return json(['code' => 200, 'message' => '获取列表成功', 'data' => $tree]);
        } else {
            return json(['code' => 404, 'message' => '获取列表失败']);
        }
    }
    /**
     * 显示部门成员
     */
    public function member()
    {
        $id = request()->param('id');
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        /* 验证 */
        $data = [
            'id' => $id,
        ];
        $result   = $this->validate($data, 'Department.member');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $member = DepartmentUser::where(['department_id' => $id])
            ->with(['user'])->paginate($page_size, false, ['page' => $jump_page])
            ->each(function($item) {
                unset($item['id'],$item['user_id'],$item['update_time']);
                return $item;
            });
        return json(['code' => 200, 'message' => '获取成员信息成功', 'data' => $member]);
    }
    /**
     * 成员编辑部门
     */
    public function selectDepartment()
    {
        $user_id = request()->param('user_id');
        $department_id = request()->param('department_id');
        $data = [
            'user_id' => $user_id,
            'department_id' => $department_id,
            'role' => 0
        ];
        $result = $this->validate($data, 'DepartmentUser');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $department_user = DepartmentUser::where('user_id', $user_id)->find();
        if ($department_user) {
            $result = $department_user->save($data,['user_id' => $user_id]);
        } else {
            $result = DepartmentUser::create($data);
        }
        if ($result) {
            // 更新用户表的部门字段
            $member = Member::where('id', $user_id)->update(['department_id' => $department_id]);
            return json(['code' => 200, 'message' => '编辑成功']);
        } else {
            return json(['code' => 404, 'message' => '编辑失败']);
        }
    }
    /**
     * 递归实现无限极分类
     * @param $array 分类数据
     */
    public static function generateTree($array){
        //第一步 构造数据
        $items = array();
        foreach($array as $value){
            $items[$value['id']] = $value;
        }
        //第二步 遍历数据 生成树状结构
        $tree = array();
        foreach($items as $key => $value){
            if(isset($items[$value['p_id']])){
                $items[$value['p_id']]['son'][] = &$items[$key];
            }else{
                $tree[] = &$items[$key];
            }
        }
        return $tree;
    }


    public function buildTrees($data, $pId)
    {
        $tree_nodes = array();
        foreach($data as $k => $v)
        {
            if($v['p_id'] == $pId)
            {
                $v['child'] = $this->buildTrees($data, $v['id']);
                $tree_nodes[] = $v;
            }
        }
        return $tree_nodes;
    }
}