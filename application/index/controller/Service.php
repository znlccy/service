<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/14
 * Time: 9:59
 * Comment: 服务控制器
 */

namespace app\index\controller;

use app\index\model\Service as ServiceModel;
use app\index\model\Group as GroupModel;
use think\App;

class Service extends BasisController {

    /* 声明服务模型 */
    protected $service_model;

    /* 声明分组模型 */
    protected $group_model;

    /* 声明服务分页 */
    protected $service_page;

    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->service_model = new ServiceModel();
        $this->group_model = new GroupModel();
        $this->service_page = config('page.pagination');
    }


    /* 资源列表 */
    public function index() {

    /* 获取客户端提交的数据 */
    $page_size = request()->param('page_size', $this->service_page['PAGE_SIZE']);
    $jump_page = request()->param('jump_page', $this->service_page['JUMP_PAGE']);
    $group_id = request()->param('group_id');

    /* 验证数据 */
    $validate_data = [
        'page_size'         => $page_size,
        'jump_page'         => $jump_page,
        'group_id'          => $group_id,
    ];

    //验证结果
    $result   = $this->validate($validate_data, 'Service.index');
    if (!$result) {
        return json(['code' => 401, 'message' => $result]);
    }

    //整理查询
    $where = [];
    if (!empty($group_id) ){
        $where = [
            'group_id' => $group_id,
        ];
    }

    //实例化模型
    $service = $this->service_model->order('id', 'desc')
        ->where($where)
        ->paginate($page_size, false, ['page' => $jump_page]);

    /* 查询分类 */
    $category = $this->group_model->order('id','asc')->select();

    /* 拼装数据 */
    $data = array_merge(['service' => $service, 'category' => $category]);

    /* 返回数据 */
    return json([
        'code'      => 200,
        'message'   => '获取服务列表成功',
        'data'      => $data
    ]);
}

    /* 资源详情 */
    public function detail() {
        /* 获取客户端提交过来的数据 */
        $id = request()->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id,
        ];

        //实例化验证器
        $result   = $this->validate($validate_data, 'Service.detail');
        if (!$result) {
            return json(['code' => '401', 'message' => $result]);
        }

        /* 推荐服务 */
        $recommend = $this->service_model->where('status', '=', '1')
            ->where('id','<>', $id)
            ->order('recommend','desc')
            ->order('id','desc')
            ->limit(3)
            ->select();

        /* 从数据库中查询对应的服务详情 */
        $service_info = $this->service_model->where('id', '=', $id)->find();

        /* 拼装数据 */
        $data = array_merge(['recommend' => $recommend, 'service_info' => $service_info]);

        /* 返回数据 */
        return json([
            'code'      => 200,
            'message'   => '查询成功',
            'data'      => $data
        ]);
    }

    /* 服务商下拉列表 */
    public function spinner() {
        $group = $this->group_model
            ->order('sort', 'desc')
            ->field('id, name')
            ->select();

        if ($group) {
            return json([
                'code'      => 200,
                'message'   => '分组下拉获取成功',
                'data'      => $group
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '分组下拉获取失败',
            ]);
        }
    }
}