<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/24
 * Time: 11:39
 * Comment: 用户控制器
 */
namespace app\index\controller;

use app\admin\model\Information;
use app\index\model\UserInformation;
use think\facade\Config;
use think\Db;
use think\Loader;
use think\facade\Session;
use think\Validate;
use app\index\model\User as UserModel;
use app\index\model\VerificationCode as VerificationCodeModel;
use app\index\model\EnterTeam as EnterTeamModel;

class User extends BasisController {

    /**
     * 用户登录api接口
     */
    public function login() {

        //接收客户端提交的数据
        $mobile = request()->param('mobile');
        $password = request()->param('password');
        $verify = strtolower(request()->param('verify'));

        /* 验证规则 */
        $validate_data = [
            'mobile'        => $mobile,
            'password'      => $password,
            'verify'        => $verify,
        ];

        $result = $this->validate($validate_data, 'User.login');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $user = UserModel::where('mobile', '=', $mobile)
                         ->where('password', '=', md5($password))
                         ->find();

        if ( empty($user) ) {
            return json(['code' => 404, 'message' => '数据库中还没有该用户或者输入的账号密码错误']);
        }

        Session::set('user', $user);
        $token = general_token($mobile, $password);
        Session::set('access_token', $token);
        $team = EnterTeamModel::where('user_id', $user['id'])->find();
        if ($team) {
            $is_enter = 1;
            $enter_team_id = $team['id'];
        } else {
            $is_enter = 0;
            $enter_team_id = 0;
        }

        return json(['code' => 200, 'message'   => '登录成功',  'access_token' => $token, 'mobile' => $mobile, 'is_enter' => $is_enter, 'enter_team_id' => $enter_team_id]);
    }

    /**
     * 用户注册api接口
     */
    public function register() {
        /* 获取客户端提交过来的数据 */
        $mobile = request()->param('mobile');
        $password = request()->param('password');
        $verify = request()->param('verify');
        $code = request()->param('code');

        /* 验证规则 */
        $validate_data = [
            'password'      => $password,
            'verify'        => $verify,
            'code'          => $code,
            'mobile'        => $mobile,
        ];

        $result = $this->validate($validate_data, 'User.register');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        //实例化模型
        $verification_code_model = new VerificationCodeModel();
        $smsCode = $verification_code_model->where('mobile', '=', $mobile)->find();

        if ( empty($smsCode) ){
            return json(['code' => 404, 'message' => '还没有生成对应的短信验证码']);
        }

        if (strtotime($smsCode['expiration_time']) - time() < 0) {
            return json(['code' => 406, 'message' => '短信验证码已经过期']);
        }

        if ($smsCode['code'] != $code) {
            return json(['code' => 408, 'message' => '短信验证码错误']);
        }
        // 判断手机号是否存在
        if (UserModel::where('mobile', $mobile)->find()) {
            return json(['code' => 401, 'message' => '该手机号已经注册']);
        }

        $user_data = [
            'mobile'        => $mobile,
            'password'      => md5($password),
//            'register_time' => time()
        ];

        $user_model = new UserModel();
        $register_result =$user_model->insertGetId($user_data);
        if ($register_result) {
            $userData['id'] = $register_result;
            Session::set('user',$user_data);
            $token = general_token($mobile, $password);
            Session::set('access_token', $token);

            // 验证码使用一次后立即失效
            $verification_code_model->where('mobile', $mobile)->update(['create_time' => date('Y-m-d H:i:s', time())]);

            return json([
                'code'      => 200,
                'message'   => '注册成功',
                'access_token' => $token,
                'mobile' => $mobile
            ]);
        } else {
            return json([
                'code'      => 402,
                'message'   => '注册失败'
            ]);
        }
    }

    /**
     * 密码找回api接口
     */
    public function recover_pass() {

        /* 获取客户端提供的数据 */
        $mobile = request()->param('mobile');
        $code = request()->param('code');
        $verify = request()->param('verify');

        /* 验证规则 */
        $validate_data = [
            'mobile' => $mobile,
            'code'   => $code,
            'verify' => $verify,
        ];

        $result = $this->validate($validate_data, 'User.recoverPass');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        //实例化模型
        $verification_code_model = new VerificationCodeModel();
        $sms_code = $verification_code_model->where('mobile', '=', $mobile)->find();

        if (empty($sms_code) ){
            return json(['code' => 404, 'message' => '还没有生成对应的短信验证码']);
        }

        if (strtotime($sms_code['expiration_time']) - time() < 0) {
            return json(['code' => 406, 'message' => '短信验证码已经过期']);
        }

        if ($sms_code['code'] != $code) {
            return json(['code' => 408, 'message' => '短信验证码错误']);
        }

        // 获取账号信息
        $user_model = new UserModel();
        $user = $user_model->where('mobile', '=', $mobile)->find();
        // 有效时间(10分钟)
        $effective_time = time() + 600;
        $json = json_encode(['user' => $user['mobile'], 'effective_time' => $effective_time]);
        // 加密串(用于修改密码)
        $key = Config::get('secret_key');
        $encrypted_str = passport_encrypt($json, $key);
        
        return json([
            'code'      => 200,
            'message'   => '验证成功，请在10分钟内完成下一步',
            'data'      => $encrypted_str
        ]);

    }

    /**
     * 找回密码 - 修改密码api接口
     */
    public function change_pass() {
        /* 获取客户端提供的数据 */
        // $mobile = request()->param('mobile');
        $password = request()->param('password');
        $confirm_pass = request()->param('confirm_pass');
        $encrypted_str = request()->param('encrypted_str');

        /* 验证数据 */
        $validate_data = [
            'password' => $password,
            'confirm_pass'   => $confirm_pass,
            'encrypted_str' => $encrypted_str,
        ];

        $result = $this->validate($validate_data, 'User.changePass');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        // 解码加密串
        $key = Config::get('secret_key');
        $arr = json_decode(passport_decrypt($encrypted_str, $key),true);
        // 用户手机号
        $mobile = $arr['user'];
        // 有效时间
        $effective_time = $arr['effective_time'];
        // 判断是否在有效时间内
        if (time() > $effective_time) {
            return json([ 'code' => 406, 'message'   => '操作时间过长，请重新发送验证码']);
        }

        //更新密码
        $passwordData = [
            'password'  => md5($password)
        ];

        //实例化模型
        $user_model = new UserModel();
        $modify_result = $user_model->where('mobile', '=', $mobile)->update($passwordData);
        if ($modify_result) {
            // 验证码使用一次后立即失效
                $verification_code_model  = new VerificationCodeModel();
                $verification_code_model->where('mobile', $mobile)->update(['create_time' => date('Y-m-d H:i:s', time())]);
            return json(['code' => 200, 'message' => '密码更改成功']);
        } else {
            return json(['code' => 406, 'message' => '密码更改失败']);
        }
    }

    /**
     * 个人信息api接口
     */
    public function information() {
        // 用户手机号
        $mobile = session('user.mobile');

        //实例化模型
        $user_model = new UserModel();
        $personal = $user_model->where('mobile', '=', $mobile)->find();
//        dump($personal);die;
        if ($personal) {
            return json([
                'code'      => 200,
                'message'   => '查找成功',
                'data'      => $personal
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '该手机号未注册'
            ]);
        }
    }

    /**
     * 更改个人信息api接口
     */
    public function modify_info() {

        /* 获取客户端提交的数据 */
        $mobile = Session::get('user.mobile');
        $username = request()->param('username');
        $email = request()->param('email');
        $company = request()->param('company');
        $career = request()->param('career');
        $occupation = request()->param('occupation');

        /* 验证数据 */
        $validate_data = [
            'mobile'        => $mobile,
            'username'      => $username,
            'email'         => $email,
            'company'       => $company,
            'career'        => $career,
            'occupation'    => $occupation,
        ];

        //实例化验证器
        $result = $this->validate($validate_data, 'User.modifyInfo');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        /* 更新数据 */
        $user_model = new UserModel();
        $result = $user_model->where('mobile', '=', $mobile)->update($validate_data);

        /* 返回数据 */
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功']);
        } else {
            return json(['code' => 402, 'message' => '保存失败，数据库中还没有该用户信息']);
        }
    }

    /**
     * 已登陆 - 修改密码接口
     */
    public function modify_pass() {

        /* 获取客户端提供的数据 */
        $user_id = Session::get('user.id');
        $old_password = request()->param('old_password');
        $password = request()->param('password');
        $confirm_pass = request()->param('confirm_pass');

        /* 验证数据 */
        $validate_data = [
            'old_password'      => $old_password,
            'password'          => $password,
            'confirm_pass'      => $confirm_pass,
        ];

        //实例化验证器
        $result = $this->validate($validate_data, 'User.modify_pass');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $db_password_old = UserModel::where('id','=', $user_id)
                            ->where('password', '=', md5($old_password))
                            ->field('password')
                            ->find();

        if ( empty($db_password_old) ){
            return json(['code'=>406,'message'=>'原密码错误']);
        }

        if ($db_password_old['password'] == md5($password)) {
            return json(['code'=>405,'message'=>'该密码已经使用了，重新换一个']);
        }

        $data = [
            'password' => md5($password)
        ];
        $result = UserModel::where('id', '=', $user_id)->update($data);
        if ($result) {
            return json([
                'code'      => 200,
                'message'   => '更新成功'
            ]);
        } else {
            return json([
                'code'      => 403,
                'message'   => '更新失败'
            ]);
        }
    }

    /**
     * 通知消息api接口
     */
    public function notification() {
        $page = config('pagination');
        /* 获取客户端提供的 */
        $page_size = request()->param('page_size', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page', $page['JUMP_PAGE']);

        // 用户id
        $user_id = session('user.id');

        /* 验证数据 */
        $validate_data = [
            'page_size'         => $page_size,
            'jump_page'         => $jump_page,
        ];

        $result = $this->validate($validate_data, 'User.notification');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $users = UserInformation::where('userid', $user_id)->field('infoid')->select();

        $info = [];
        foreach ($users as $key => $value) {
            $info[] = $value['infoid'];
        }

        $infomations = Db::table('tb_information')
            ->alias('in')
            ->field('in.id, in.title, in.publish_time, a.nickname as publisher')
            ->join('tb_admin a', 'in.publisher = a.id')
            ->paginate($page_size, false, ['page' => $jump_page])->each(function($item, $key) use ($info){
                if (in_array($item['id'], $info)) {
                    $item['read_status'] = 1;
                } else {
                    $item['read_status'] = 0;
                }
                return $item;
            });

        /* 返回数据 */
        return json([
            'code'      => 200,
            'message'   => '获取通知信息成功',
            'data'      => $infomations
        ]);
    }

    /**
     * 通知信息详情api接口
     */
    public function notification_detail() {

        /* 获取客户端提供的数据 */
        $id = request()->param('id');
        // 用户手机号
        $user_id = session('user.id');


        /* 验证规则 */
        $validate_data = [
            'id'        => $id,
        ];

        $result = $this->validate($validate_data, 'User.notificationDetail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $information = Information::alias('in')
            ->where('in.id', '=', $id)
            ->join('tb_admin a', 'in.publisher = a.id')
            ->field('in.id, in.title, in.publish_time, in.richtext, a.nickname as publisher')
            ->find();

        if ( empty($information) ){
            return json([
                'code'      => 402,
                'message'   => '消息不存在',

            ]);
        }

        $data = UserInformation::where('userid', '=', $user_id)
            ->where('infoid', '=', $id)
            ->find();

        if ( empty($data) ){
            Db::table('tb_user_information')
                ->insert(['userid' => $user_id, 'infoid' => $id, 'status' => 1]);
        }

        return json([
            'code'      => 200,
            'message'   => '查询信息成功',
            'data'      => $information
        ]);
    }

    /**
     * 登出api接口
     */
    public function logout(){
        //删除Session中的数据
        Session::delete('user');
        Session::delete('access_token');
        return json(['code' => 200, 'message'   => '登出成功']);
    }

    /**
     * 验证token
     * @param $mobile
     */
    protected function token($mobile) {
        $now = date('Y-m-d', time());
        $expired = date('Y-m-d', strtotime("+1 day",strtotime(time())));
    }
}