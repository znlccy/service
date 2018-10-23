<?php
// 本类由系统自动生成，仅供测试用途
namespace app\admin\Controller;
use think\Controller;
use workflow\workflow;
use think\facade\Session;
use think\Db;

class Flow extends BaseController {

    protected $uid;
    protected $role;

	protected function initialize()
    {
       $this->uid = session('admin.id');
	   // 获取用户角色
        $this->role = Db('tb_admin_role')->where('user_id', $this->uid)->column('role_id');
    }
	/*流程监控*/
	public function index($map = [])
	{

		$workflow = new workflow();
		$flow = $workflow->worklist();
		$this->assign('list', $flow);
		return $this->fetch();
		
	}
	public function btn($wf_fid,$wf_type,$status,$wf_title)
	{
		$url = url("/admin/flow/do_check/",["wf_type"=>$wf_type,"wf_title"=>$wf_title,'wf_fid'=>$wf_fid]);
		$url_star = url("/admin/flow/start/",["wf_type"=>$wf_type,"wf_title"=>$wf_title,'wf_fid'=>$wf_fid]);
		switch ($status)
		{
		case 0:
		  return '<span class="btn  radius size-S" onclick=layer_show(\'发起工作流\',"'.$url_star.'","450","350")>发起工作流</span>';
		  break;
		case 1:
			$st = 0;
			$workflow = new workflow();
			$flowinfo = $workflow->workflowInfo($wf_fid,$wf_type);
			if (isset($flowinfo['status'])) {
                $user = explode(",", $flowinfo['status']['sponsor_ids']);
                if($flowinfo['status']['auto_person']==3||$flowinfo['status']['auto_person']==4){
                    if (in_array($this->uid, $user)) {
                        $st = 1;
                    }
                }
                if($flowinfo['status']['auto_person']==5){
                    $role = array_intersect($this->role, $user);
                    if (!empty($role)) {
                        $st = 1;
                    }
                }
                if($flowinfo['status']['auto_person']==6){
                    // 判断用户是否属于该部门
                    $user_department = Db('tb_admin')->where('id', $this->uid)->value('department_id');
                    if (in_array($user_department, $user)) {
                        $st = 1;
                    }
                }
            }

			if($st == 1){
				 return '<span class="btn  radius size-S" onclick=layer_show(\'审核\',"'.$url.'","850","650")>审核</span>';
				}else{
				 return '<span class="btn  radius size-S">无权限</span>';
			}
		  break;
		default:
		  return '';
		}
	}
	public function status($status)
	{
		switch ($status)
		{
		case 0:
		  return '<span class="label radius">保存中</span>';
		  
		  break;
		case 1:
		  return '<span class="label radius" >流程中</span>';
		  break;
		case 2:
		  return '<span class="label label-success radius" >审核通过</span>';
		  break;
		default: //-1
		  return '<span class="label label-danger radius" >退回修改</span>';
		}
		
	}
	
    /*发起流程，选择工作流*/
	public function start()
	{
		$wf_type = input('wf_type');
		$info = ['wf_type'=>input('wf_type'),'wf_title'=>input('wf_title'),'wf_fid'=>input('wf_fid')];
		$workflow = new workflow();
		$flow = $workflow->getWorkFlow($wf_type);
        $this->assign('flow',$flow);
        $this->assign('info',$info);
        return $this->fetch();
	}
	/*正式发起工作流*/
	public function start_save()
	{
		$data = $this->request->param();
        $workflow = new workflow();
        $flow = $workflow->startworkflow($data,$this->uid);
        if($flow['code']==1){
			return msg_return('Success!');
		} elseif ($flow['code']==2) {
            // 订单审核通过，更新订单
            $info = Db::name('tb_'. $data['wf_type'])->where('id',$data['wf_fid'])->update(['status' => 2]);
            return msg_return('Success!');
        } else {
            return msg_return($flow['msg'],$flow['code']);
        }
	}
	/*工作流状态信息*/
	public function get_flowinfo()
	{
		$wf_type = input('wf_type');
		$wf_fid = input('wf_fid');
		$workflow = new workflow();
		$flowinfo = $workflow->workflowInfo($wf_fid,$wf_type);
		
	}
	public function do_check()
	{
		$wf_fid = input('wf_fid');
		$wf_type = input('wf_type');
		$info = ['wf_title'=>input('wf_title'),'wf_fid'=>$wf_fid,'wf_type'=>$wf_type];
		$workflow = new workflow();
		$flowinfo = $workflow->workflowInfo($wf_fid,$wf_type);
		$this->assign('info',$info);
		$this->assign('flowinfo',$flowinfo);
		return $this->fetch();
	}
	public function do_check_save()
	{
		$data = $this->request->param();
		$workflow = new workflow();
		$flowinfo = $workflow->workdoaction($data,$this->uid);
		return msg_return('Success!');
	}
	public function ajax_back(){
		$pid = input('back_id');
		$run_id = input('run_id');
		$workflow = new workflow();
		$flowinfo = $workflow->getprocessinfo($pid,$run_id);
		return $flowinfo;
	}
	public function upindex()
    {
        return $this->fetch('upload');
    }
	public function upload()
    {
        $files = $this->request->file('file');
        $insert = [];
        foreach ($files as $file) {
            $path = \Env::get('root_path') . '/public/uploads/';
            $info = $file->move($path);
            if ($info) {
                $data[] = $info->getSaveName();
            } else {
                $error[] = $file->getError();
            }
        }
        return msg_return($data,0,$info->getInfo('name'));
    }
}