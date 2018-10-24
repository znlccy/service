<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/7
 * Time: 18:35
 * Comment：活动报名
 */

namespace app\admin\controller;

use app\index\model\User as UserModel;
use app\admin\model\Activity as ActivityModel;
use app\admin\model\UserActivity as UserActivityModel;
use think\App;

class ActivityRegistration extends BaseController {

    /* 声明用户模型 */
    protected $user_model;

    /* 声明活动模型 */
    protected $activity_model;

    /* 声明用户活动模型 */
    protected $user_activity_model;

    /* 声明活动注册分页 */
    protected $activity_registration_page;

    /* 声明默认构造函数 */
    public function __construct(App $app = null){
        parent::__construct($app);
        $this->user_model = new UserModel();
        $this->activity_model = new ActivityModel();
        $this->user_activity_model = new UserActivityModel();
        $this->activity_registration_page = config('page.pagination');
    }

    /* 声明报名列表 */
    public function index() {

        //获取客户端提交过来的数据
        $user_id = $this->request->param('user_id');
        $activity_id = $this->request->param('activity_id');
        $activity_name = $this->request->param('activity_name');
        $company = $this->request->param('company');
        $apply_start = $this->request->param('apply_start');
        $apply_end = $this->request->param('apply_end');
        $mobile = $this->request->param('mobile');
        $email = $this->request->param('email');
        $page_size = $this->request->param('page_size', $this->activity_registration_page['PAGE_SIZE']);
        $jump_page = $this->request->param('jump_page', $this->activity_registration_page['JUMP_PAGE']);

        //验证数据
        $validate_data = [
            'user_id'       => $user_id,
            'activity_id'   => $activity_id,
            'activity_name' => $activity_name,
            'company'       => $company,
            'apply_start'   => $apply_start,
            'apply_end'     => $apply_end,
            'mobile'        => $mobile,
            'email'         => $email,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        //验证结果
        $result = $this->validate($validate_data, 'ActivityRegistration.index');

        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        //筛选条件
        $conditions = [];

        if ($user_id) {
            $conditions[] = ['tu.id', '=', 'user_id'];
        }
        if ($activity_id) {
            $conditions[] = ['ta.id', '=', $activity_id];
        }
        if ($activity_name) {
            $conditions[] = ['ta.title', 'like', '%' . $activity_name . '%'];
        }
        if ($company) {
            $conditions[] = ['tu.company', 'like', '%' . $company . '%'];
        }
        if ($apply_start && $apply_end) {
            $conditions[] = ['ua.apply_time', 'between time', [$apply_start, $apply_end]];
        }
        if ($mobile) {
            $conditions[] = ['tu.mobile', 'like', '%' . $mobile . '%'];
        }
        if ($email) {
            $conditions[] = ['tu.email', 'like', '%' . $email . '%'];
        }

        //返回结果
        $activity_registration = $this->user_activity_model->alias('ua')
            ->where($conditions)
            ->join('tb_user tu', 'tu.id = ua.user_id')
            ->join('tb_activity ta', 'ta.id = ua.activity_id')
            ->field('tu.id as user_id, ta.id as activity_id, ua.apply_time as apply_time, ta.title as activity_name, tu.company, tu.email, tu.mobile')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($activity_registration) {
            return json([
                'code'      => 200,
                'message'   => '查询信息成功',
                'data'      =>$activity_registration
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '查询信息失败'
            ]);
        }
     }

    /* 声明报名活动 */
    public function attach() {

        //获取客户端提交过来的数据
        $user_id = $this->request->param('user_id');
        $activity_id = $this->request->param('activity_id');

        //验证数据
        $validate_data = [
            'user_id'       => $user_id,
            'activity_id'   => $activity_id
        ];

        //验证结果
        $result = $this->validate($validate_data, 'ActivityRegistration.attach');
        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        //查看数据库中是否已经报名了
        $apply = $this->user_activity_model->where('user_id', $user_id)->where('activity_id', $activity_id)->find();
        if ($apply) {
            return json([
                'code'      => 201,
                'message'   => '已经报名'
            ]);
            exit();
        }

        //返回结果
        $res = $this->user_activity_model->save(['user_id' => $user_id, 'activity_id' => $activity_id, 'apply_time' => date('Y-m-d H:i:s', time())]);
        if ($res) {
            return json([
                'code'      => 200,
                'message'   => '添加报名成功'
            ]);
        } else {
            return json([
                'code'      => 401,
                'message'   => '添加报名失败'
            ]);
        }

    }

    /* 声明取消活动 */
    public function detach() {

        //获取客户端提交过来的数据
        $user_id = $this->request->param('user_id');
        $activity_id = $this->request->param('activity_id');

        //验证数据
        $validate_data = [
            'user_id'       => $user_id,
            'activity_id'   => $activity_id
        ];

        //验证数据
        $result = $this->validate($validate_data, 'ActivityRegistration.detach');
        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        //查询是否报名了
        $apply = $this->user_activity_model->where('user_id', $user_id)->where('activity_id', $activity_id)->find();

        if (empty($apply) || is_null($apply)) {
            return json([
                'code'      => 404,
                'message'   => '你还没报名这项活动'
            ]);
        }

        //返回结果
        $user = \app\admin\model\User::get($user_id);
        $activity = \app\admin\model\Activity::get($activity_id);

        $res = $user->Activity()->detach($activity);
        if ($res) {
            return json([
                'code'      => 200,
                'message'   => '取消报名成功'
            ]);
        } else {
            return json([
                'code'      => 401,
                'message'   => '取消报名失败'
            ]);
        }
    }

    /* 声明报名活动详情 */
    public function detail() {

        //获取客户端提交过来的数据
        $activity_id = $this->request->param('activity_id');

        //验证数据
        $validate_data = [
            'activity_id'    => $activity_id,
        ];

        //验证结果
        $result = $this->validate($validate_data, 'ActivityRegistration.detail');
        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        //返回结果
        $activity = $this->activity_model->where('id', $activity_id)->find();

        if ($activity) {
            return json([
                'code'      => 200,
                'message'   => '查询数据成功',
                'data'      => $activity
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '查询诗句就失败'
            ]);
        }
    }

}