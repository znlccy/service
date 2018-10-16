<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5
 * Time: 18:18
 * Comment: 活动控制器
 */

namespace app\admin\controller;

use think\App;
use app\admin\model\Activity as ActivityModel;
use app\admin\model\UserActivity as UserActuvityModel;
use think\Controller;

class Activity extends Controller {

    /* 声明活动模型 */
    protected $activity_model;

    /* 用户活动模型 */
    protected $user_activity_model;

    /* 声明活动分页 */
    protected $activity_page;

    /* 默认构造函数 */
    public function __construct(App $app = null) {
        parent::__construct($app);
        $this->activity_model = new ActivityModel();
        $this->user_activity_model = new UserActuvityModel();
        $this->activity_page = config('page.pagination');
    }

    /* 活动列表 */
    public function index() {

        //接收客户端提交的数据e
        $id = $this->request->param('id');
        $title = $this->request->param('title');
        $content = $this->request->param('content');
        $recommend = $this->request->param('recommend');
        $limit_start = $this->request->param('limit_start');
        $limit_end = $this->request->param('limit_end');
        $register_start = $this->request->param('register_start');
        $register_end = $this->request->param('register_end');
        $status = $this->request->param('status');
        $address = $this->request->param('address');
        $location = $this->request->param('location');
        $publisher = $this->request->param('publisher');
        $apply_time_start = $this->request->param('apply_time_start');
        $apply_time_end = $this->request->param('apply_time_end');
        $begin_time_start = $this->request->param('begin_time_start');
        $begin_time_end = $this->request->param('begin_time_end');
        $end_time_start = $this->request->param('end_time_start');
        $end_time_end = $this->request->param('end_time_end');
        $page_size = $this->request->param('page_size', $this->activity_page['PAGE_SIZE']);
        $jump_page = $this->request->param('jump_page', $this->activity_page['JUMP_PAGE']);

        //验证数据
        $validate_data = [
            'id'            => $id,
            'title'         => $title,
            'content'       => $content,
            'recommend'     => $recommend,
            'limit_start'   => $limit_start,
            'limit_end'     => $limit_end,
            'register_start'=> $register_start,
            'register_end'  => $register_end,
            'status'        => $status,
            'address'       => $address,
            'location'      => $location,
            'apply_time_start'=> $apply_time_start,
            'apply_time_end'=> $apply_time_end,
            'begin_time_start'=> $begin_time_start,
            'begin_time_end'=> $begin_time_end,
            'end_time_start' => $end_time_start,
            'end_time_end'  => $end_time_end,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Activity.index');
        if (!$result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        //筛选条件
        $conditions = [];

        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($title) {
            $conditions[] = ['title','like', '%' . $title . '%'];
        }
        if ($content) {
            $conditions[] = ['content','like', '%' . $content .'%'];
        }
        if (is_null($recommend)) {
            $conditions[] = ['recommend', 'in',[0,1]];
        } else {
            switch ($status) {
                case 0:
                    $conditions[] = ['recommend', '=', $recommend];
                    break;
                case 1:
                    $conditions[] = ['recommend', '=', $recommend];
                    break;
                default:
                    break;
            }
        }
        if ($publisher) {
            $conditions[] = ['publisher', 'like', $publisher];
        }
        if ($limit_start && $limit_end) {
            $conditions[] = ['limit','between', [$limit_start, $limit_end]];
        }
        if ($register_start && $register_end) {
            $conditions[] = ['register', 'between', [$register_start, $register_end]];
        }
        if (is_null($status)) {
            $conditions[] = ['status','in',[0,1]];
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
        if ($address) {
            $conditions[] = ['address','like', '%' . $address . '%'];
        }
        if ($location) {
            $conditions[] = ['location','like', '%' . $location . '%'];
        }
        if ($apply_time_start && $apply_time_end) {
            $conditions[] = ['apply_time','between time', [$apply_time_start, $apply_time_end]];
        }
        if ($begin_time_start && $begin_time_end) {
            $conditions[] = ['begin_time','between time', [$begin_time_start, $begin_time_end]];
        }
        if ($end_time_start && $end_time_end) {
            $conditions[] = ['end_time','between time', [$end_time_start, $end_time_end]];
        }

        //返回结果
        $activity = $this->activity_model
            ->where($conditions)
            ->order('id','desc')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($activity) {
            return json([
                'code'      => 200,
                'message'   => '查询数据成功',
                'data'      => $activity
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '查询数据失败'
            ]);
        }
    }

    /* 活动添加更新 */
    public function save() {
        /* 获取前端提交的数据 */
        $id = $this->request->param('id');
        $title       = $this->request->param('title');
        $content     = $this->request->param('content');
        $recommend   = $this->request->param('recommend', 0);
        $picture     = $this->request->file('picture');
        $start       = $this->request->param('start');
        $limit       = $this->request->param('limit');
        $register    = $this->request->param('register', 0);
        $status      = $this->request->param('status', 1);
        $address     = $this->request->param('address');
        $location    = $this->request->param('location');
        $apply_time  = $this->request->param('apply_time');
        $begin_time  = $this->request->param('begin_time');
        $end_time    = $this->request->param('end_time');
        $audit_method= $this->request->param('audit_method', 0);
        $rich_text   = $this->request->param('rich_text');

        // 移动图片到框架应用根目录/public/images
        if ($picture) {
            $info = $picture->move(ROOT_PATH . 'public' . DS . 'images');
            if ($info) {
                /*echo '文件保存的名:' . $info->getFilename();*/
                $sub_path     = str_replace('\\', '/', $info->getSaveName());
                $picture = '/images/' . $sub_path;
            }
        }

        //验证数据
        $validate_data = [
            'title'       => $title,
            'content'     => $content,
            'recommend'   => $recommend,
            'picture'     => $picture,
            'start'       => $start,
            'limit'       => $limit,
            'register'    => $register,
            'status'      => $status,
            'address'     => $address,
            'location'    => $location,
            'apply_time'  => $apply_time,
            'begin_time'  => $begin_time,
            'end_time'    => $end_time,
            'audit_method'=> $audit_method,
            'rich_text'   => $rich_text,
        ];

        //验证结果
        $result   = $this->validate($validate_data, 'Activity.save');
        if (!$result) {
            return json(['code' => 401, 'message' => $result]);
        }

        //返回结果
        if (!empty($id)) {
            if (empty($picture)) {
                unset($validate_data['picture']);
            }
            $result = $this->activity_model->save($validate_data,['id' => $id]);
        } else {
            $result = $this->activity_model->save($validate_data);
        }
        if ($result) {
            $data = ['code' => 200, 'message' => '保存成功!'];
            return json($data);
        } else {
            $data = ['code' => 404, 'message' => '保存失败!'];
            return json($data);
        }
    }

    /* 获取详情 */
    public function detail() {
        //获取客户端提交的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'            => $id
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Activity.detail');
        if (!$result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        //返回数据
        $service = $this->activity_model->where('id', $id)->find();
        if ($service) {
            return json([
                'code'      => 200,
                'message'   => '查询数据成功',
                'data'      => $service
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '查询数据失败,数据不存在'
            ]);
        }
    }

    /* 删除活动 */
    public function delete() {
        //获取客户端提交过来的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'            => $id
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Activity.delete');
        if (!$result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        //返回结果
        $delete = $this->activity_model->where('id', $id)->delete();
        if ($delete) {
            return json([
                'code'      => 200,
                'message'   => '删除数据成功'
            ]);
        } else {
            return json([
                'code'      => 401,
                'message'   => '删除数据失败'
            ]);
        }
    }

    /**
     * 活动报名列表api接口
     */
    public function apply_entry() {

        /* 获取客户端提供的数据 */
        $page_size = request()->param('page_size/d', $this->activity_page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $this->activity_page['JUMP_PAGE']);
        $id = request()->param('id');

        /* 验证数据 */
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'id'               => $id,
        ];

        //验证结果
        $result   = $this->validate($data, 'Activity.apply_entry');
        if (!$result) {
            return json(['code' => 401, 'message' => $result]);
        }

        //返回数据
        $activity_data = $this->user_activity_model-> where('activity_id', '=', $id)
            -> alias('au')
            -> join('tb_user u', 'au.user_id = u.id')
            -> field('au.user_id, u.mobile, au.activity_id, au.status, au.apply_time, u.mobile, u.email, u.industry, u.occupation, u.company')
            ->paginate($page_size, false, ['page' => $jump_page]);
        if ($result) {
            return json(['code' => 200, 'message' => '查询成功', 'data' => $activity_data]);
        } else {
            return json(['code' => 404, 'message' => '查询失败']);
        }

    }

    /* 活动审核接口 */
    public function auditor() {

        //接收客户端提交过来的数据
        $activity_id     = request()->param('id');
        $status = request()->param('status', 1);

        /* 验证规则 */
        $data = [
            'activity_id'   => $activity_id,
            'status'        => $status
        ];

        //验证结果
        $result   = $this->validate($data, 'Activity.auditor');
        if (!$result) {
            return json(['code' => 401, 'message' => $result]);
        }

        //返回结果
        $activity_data = $this->user_activity_model->save($data,['activity_id' => $activity_id]);
        if ($activity_data) {
            return json(['code' => 200, 'message' => '审核通过']);
        } else {
            return json(['code' => 404, 'message' => '审核失败']);
        }
    }

}