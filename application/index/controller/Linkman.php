<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Linkman as LinkmanModel;
use app\index\model\VerificationCode;

class Linkman extends BasisController
{
    /**
     * 显示资源列表
     *
     */
    public function index()
    {
        //
    }


    /**
     * 联系人新增更新
     *
     */
    public function save()
    {
        // 获取参数
        $id = request()->param('id');
        $enter_team_id = request()->param('enter_team_id');
        $f_linkman = request()->param('f_linkman');
        $f_mobile = request()->param('f_mobile');
        $f_mobile_code = request()->param('f_mobile_code');
        $f_email = request()->param('f_email');
        $f_remind = request()->param('f_remind');
        $e_linkman = request()->param('e_linkman');
        $e_mobile = request()->param('e_mobile');
        $e_mobile_code = request()->param('e_mobile_code');
        $e_email = request()->param('e_email');
        $e_remind = request()->param('e_remind');
        $a_linkman = request()->param('a_linkman');
        $a_mobile = request()->param('a_mobile');
        $a_mobile_code = request()->param('a_mobile_code');
        $a_email = request()->param('a_email');
        $a_remind = request()->param('a_remind');
        // 验证
        $data = [
            'id' => $id,
            'enter_team_id' => $enter_team_id,
            'f_linkman' => $f_linkman,
            'f_mobile' => $f_mobile,
            'f_mobile_code' => $f_mobile_code,
            'f_email' => $f_email,
            'f_remind' => $f_remind,
            'e_linkman' => $e_linkman,
            'e_mobile' => $e_mobile,
            'e_mobile_code' => $e_mobile_code,
            'e_email' => $e_email,
            'e_remind' => $e_remind,
            'a_linkman' => $a_linkman,
            'a_mobile' => $a_mobile,
            'a_mobile_code' => $a_mobile_code,
            'a_email' => $a_email,
            'a_remind' => $a_remind
        ];
        $result = $this->validate($data, 'Linkman');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $linkman = new LinkmanModel();
        unset($data['f_mobile_code'],$data['e_mobile_code'],$data['f_mobile_code']);
        $codes = VerificationCode::whereIn('mobile', [$f_mobile,$e_mobile,$a_mobile])->column('code');
        if (empty($id)) {
            // 验证码校验
            #code...
            if (!in_array($a_mobile_code,$codes) || !in_array($f_mobile_code,$codes) || !in_array($e_mobile_code,$codes)) {
                return json(['code' => 401, 'message' => '验证码不正确']);
            }
            $result = $linkman->save($data);
        } else {
            $status = 0;
            if(isset($a_mobile_code) && in_array($a_mobile_code, $codes)){
                $status = 1;
            }
            if(isset($e_mobile_code) && in_array($e_mobile_code, $codes)){
                $status = 1;
            }
            if(isset($f_mobile_code) && in_array($f_mobile_code, $codes)){
                $status = 1;
            }
            if (!$status) {
                return json(['code' => 401, 'message' => '验证码不正确']);
            }
            $result = $linkman->save($data, ['id' => $id]);
        }
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功']);
        } else {
            return json(['code' => 404, 'message' => '保存失败']);
        }

    }

    /**
     * 联系人详情
     */
    public function detail()
    {
        // 获取前端传的参数
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];

        $result   = $this->validate($data, 'EnterTeamMember.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = LinkmanModel::where('id', $id)->find();
        $a_mobile_code = VerificationCode::whereIn('mobile', $detail['a_mobile'])->value('code');
        $e_mobile_code = VerificationCode::whereIn('mobile', $detail['e_mobile'])->value('code');
        $f_mobile_code = VerificationCode::whereIn('mobile', $detail['f_mobile'])->value('code');
        $detail['codes'] = array(
            'a_mobile_code' => $a_mobile_code,
            'e_mobile_code' => $e_mobile_code,
            'f_mobile_code' => $f_mobile_code,
        );
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
    public function delete($id)
    {
        //
    }
}
