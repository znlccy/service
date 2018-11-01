<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use app\admin\controller\Department;
use app\admin\model\Admin;

class Flowdesign extends Controller {
	/**
	 *前置方法
	 */
	protected $beforeActionList = [
        'type'  =>  ['only'=>'add,edit,lists'],
    ];
	/**
	 *前置方法角色及类别部署
	 */
	protected function type()
    {
        $tb_type = [
			'order'=>'销售订单',
			'incidental'=>'杂费订单',
		];
		$this->assign('type', $tb_type);
    }
    /**
	 * 流程设计首页
	 * @param $map 查询参数
	 */
    public function lists($map = []){
        $map = ['is_del'=>0];
		$list=controller('Base', 'event')->commonlist('tb_flow',$map);
		$list->each(function($item, $key){
			$item['edit'] = db('tb_run')->where('flow_id',$item['id'])->where('status','0')->value('id');
			return $item;
		});
		$data = [];
		$data['flow'] = $list;
        $this->assign('list', $data);
        return  $this->fetch();
    }
    /**
	 * 流程添加
	 */
    public function add()
    {
		if ($this->request->isPost()) {
		$data = input('post.');
		$table = $this->get_db_column_comment($data['type']);
		if(empty($table)||$table==''){
			return msg_return($data['type'].'数据表表不存在',1);
		}
		$ret=controller('Base', 'event')->commonadd('tb_flow',$data);
	    if($ret['code']==0){
			return msg_return('发布成功！');
			}else{
			return msg_return($ret['data'],1);
		}
	   }
       return  $this->fetch();
    }
	 /**
	 * 流程修改
	 */
	public function edit()
    {
        if ($this->request->isPost()) {
        $data = input('post.');
	    $ret=controller('Base', 'event')->commonedit('tb_flow',$data);
		if($ret['code']==0){
			return msg_return('修改成功！');
			}else{
			return msg_return($ret['data'],1);
		}
	   }
	   if(input('id')){
		 $info = db('tb_flow')->find(input('id'));
		 $this->assign('info', $info);
	   }
       return $this->fetch('add');
    }
	/**
	 * 状态改变
	 */
	public function change()
	{
		 if ($this->request->isGet()) {
			$data = [
				'id'=>input('id'),
				'status'=>input('status')
			];
			$ret=controller('Base', 'event')->commonedit('tb_flow',$data);
			if($ret['code']==0){
                return msg_return('操作成功!');
				}else{
                return msg_return('操作失败!');
			}
		 }
	}
	/**
	 * 工作流设计界面
	 */
    public function index(){
        $flow_id = intval(input('flow_id'));
        if($flow_id<=0){
            $this->error('参数有误，请返回重试!');
		}
        $one = db('tb_flow')->find($flow_id);
        if(!$one){
            $this->error('未找到数据，请返回重试!');
        }
        $list = db('tb_flow_process')->where('flow_id',$flow_id)->order('id asc')->select();
        $process_data = [];
        $process_total = 0;
        foreach($list as $value)
        {
            $process_total +=1;
            $style = json_decode($value['style'],true);
            $process_data[] = array(
                'id'=>$value['id'],
                'flow_id'=>$value['flow_id'], 
                'process_name'=>$value['process_name'],
                'process_to'=>$value['process_to'],
                'icon'=>$style['icon'],//图标
                'style'=>'width:'.$style['width'].'px;height:'.$style['height'].'px;line-height:'.$style['height'].'px;color:'.$style['color'].';left:'.$value['setleft'].'px;top:'.$value['settop'].'px;',
            );
        }
        $this->assign('one', $one);
	
        $this->assign('process_data', json_encode(array('total'=>$process_total,'list'=>$process_data)));
        return $this->fetch();
    }
    /**
	 * 删除流程
	 **/
    function delete_process()
    {
        $process_id = input('process_id');
        $flow_id = input('flow_id');
        if($process_id<=0 or $flow_id<=0){
            return json(['status'=>0,'msg'=>'操作不正确','info'=>'']);
        }
        $map = ['id'=>$process_id,'flow_id'=>$flow_id,'is_del'=>0];
        $process_model = db('tb_flow_process');
        //开启数据库事务 , 确保整个操作 全部正常 才删除成功  
        $process_model->startTrans(); 
        $trans = $process_model->where($map)->delete();
        if(!$trans){
            $process_model->rollback();
            return json(['status'=>0,'msg'=>'删除失败','info'=>'']);
        }
        //start  删除成功后，会重新保存设计，此步可省略
        // 修改 同流程中与$process_id有关的 process_to
        $list = db('tb_flow_process')->field('id,process_to')->where('flow_id','eq',$flow_id)->where('is_del','eq',0)->where('','exp',"FIND_IN_SET(".$process_id.",process_to)")->select();
		if(is_array($list)){
        foreach($list as $value){
            //把 process_to 去除 $process_id 再保存
            $arr = explode(',',$value['process_to']);
            $k = array_search($process_id,$arr);
            unset($arr[$k]);
            $process_to = '';
            if(!empty($arr)){
                $process_to = implode(',',$arr);
            }
            $data = array(
                'process_to'=>$process_to,
                'updatetime'=>time(),
            );
            $trans = db('tb_flow_process')->where('id',$value['id'])->update($data);
            if(!$trans){//有错误，跳出
                break;
            }
        }
        //end  删除成功后，会重新保存设计，此步可省略
        }
        //有错误 回滚
        if(!$trans){
            $process_model->rollback();
            return json(['status'=>0,'msg'=>'删除失败，请重试','info'=>'']);
        }
        $process_model->commit();
		// 如果全部删除，则修改工作流状态为未设置
        $flow_process = db('tb_flow_process')->where('flow_id',$flow_id)->find();
        if (!$flow_process) {
            $status = db('tb_flow')->where('id', 'eq',$flow_id)->update(['status' => 0]);
        }
        return json(['status'=>1,'msg'=>'删除成功','info'=>'']);
    }
	/**
	 * 添加流程
	 **/
    public function add_process()
    {
        //获取参数
        $flow_id = input('flow_id');
        $left  = input('left');
        $top  = input('top');
        $one = db('tb_flow')->find($flow_id);
        if(!$one){
          return json(['status'=>0,'msg'=>'添加失败,未找到流程','info'=>'']);
        }
        //是否有步骤  设为第一步
        $process_count = db('tb_flow_process')->where('flow_id',$flow_id)->count();
        
        $process_type = 'is_step';//正常步骤
        if($process_count<=0)
            $process_type = 'is_one';//设为第一步
        $data = array(
           'flow_id'=>$flow_id, 
           'process_type'=>$process_type,
           'process_name'=>'新建步骤',
           'setleft'=>$left,
           'settop'=>$top,
           'process_to'=>'',
           'style'=>json_encode(array(
                'icon'=>'icon-star',//图标
                'width'=>'120',
                'height'=>'30',
                'color'=>'#0e76a8',
           )),
           //默认值 
           'child_after'=>1,//子流程结束后动作  默认 1 同时结束父流程    2返回父流程步骤
           'auto_unlock'=>1,//权限：允许更改
        );
        $id = db('tb_flow_process')->insertGetId($data);
        if($id<=0){
            return json(['status'=>0,'msg'=>'添加失败','info'=>'']);
        }
        //返回 json 数据
        $data=array(
            'status'=>1,
            'msg'=>'success',
            'info'=>array(
                'id'=>$id,
                'flow_id'=>$flow_id, 
                'process_name'=>'新建步骤',
                'process_to'=>'',
                'icon'=>'',//图标
                'style'=>'left:'.$left.'px;top:'.$top.'px;color:#0e76a8;'//样式 
            ),
        );
		return $data;
    }
    /**
	 * 保存布局  位置 和 步骤连接
	 **/
    public function save_canvas()
    {
        $flow_id = input('flow_id');
        $process_info = trim(input('process_info'));
		$process_info = json_decode(htmlspecialchars_decode($process_info),true);
        if($flow_id<=0 or !$process_info){
			$this->return_iframe_ajax(['status'=>0,'msg'=>'参数有误，请重试','info'=>'']);
        }
        $one = db('tb_flow')->find($flow_id);
        if(!$one){
           $this->return_iframe_ajax(['status'=>0,'msg'=>'未找到流程数据','info'=>'']);
        }
        //保存数据
        foreach($process_info as $process_id=>$value){
            $map = array(
                'id'=>$process_id,
                'flow_id'=>$flow_id,
                'is_del'=>0,
            );
            $datas = array(
                'setleft'=>(int)$value['left'],
                'settop'=>(int)$value['top'],
                'process_to'=>ids_parse($value['process_to']),
                'updatetime'=>time()
            );
            $ret = db('tb_flow_process')->where('id','eq',$process_id)->where('flow_id','eq',$flow_id)->update($datas);
        }
        $data = json(['status'=>1,'msg'=>'^_^ 保存成功','info'=>'']);
		return $data;
    }
    
    
    //右键属性
    public function attribute()
    {
        $process_id = intval(input('id'));
        $op = trim(input('op'));
        if(!$op)$op = 'basic';
        //连接数据表用的。表 model 
        $flow_model = db('tb_flow');
        $process_model = db('tb_flow_process');
        $one = db('tb_flow_process')->find($process_id);
        if(!$one){
            exit('T_T 未找到步骤信息');
        }
        $flow_one = db('tb_flow')->find($one['flow_id']);
        if(!$flow_one){
            exit('T_T 未找到流程信息');
        }
		
        //初始化必须字段
        $one['process_to'] = $one['process_to']=='' ? array() : explode(',',$one['process_to']);
        //转出条件 但没 process_to
        if($op=='judge' && empty($one['process_to']))
        {
            exit('T_T 请先设置属性 -> 选择下一步步骤');
        }
        $one['style'] = json_decode($one['style'],true);
        $one['write_fields'] = $one['write_fields']=='' ? array() : explode(',',$one['write_fields']);//可写字段
        $one['secret_fields'] = $one['secret_fields']=='' ? array() : explode(',',$one['secret_fields']);//保密 隐藏的字段
        $one['out_condition'] = self::parse_out_condition($one['out_condition'],'');//json
        //备选步骤  同一个流程全部步骤
        $map = array(
            'flow_id'=>$one['flow_id'],//流程ID
            //'id'=>array('neq',$one['id']),//不用排除当前步骤ID    子流程结束后 返回步骤  要用
            'is_del'=>0,
        );
        $process_to_list = db('tb_flow_process')->field('id,process_name,process_type')->where($map)->select();
        //子流程 列表 process_to_list
        $map = array(
            'is_del'=>0,
        );
        $child_flow_list = db('tb_flow')->field('id,flow_name')->where($map)->select();
        //赋值到模板上
        $this->assign('op',$op);
        $this->assign('one',$one);
		$this->assign('from',$this->get_db_column_comment($flow_one['type']));
        $this->assign('process_to_list',$process_to_list);
        $this->assign('child_flow_list',$child_flow_list);
		return $this->fetch();
    }
    
    //$json_data is json    
    //return json
    public function parse_out_condition($json_data,$field_data)
    {
        $array = json_decode($json_data,true);
        if(!$array)
        {
            return '[]';
        }
        
        $json_data = array();//重置
        foreach($array as $key=>$value)
        {
            $condition = '';
            foreach($value['condition'] as $val)
            {
                //匹配 $field_data 
                //把data_x 替换回 中文名称
                $preg =  "/'(data_[0-9]*|checkboxs_[0-9]*)'/s";
                preg_match_all($preg,$val,$temparr);
                $val_text = '';
                foreach($temparr[0] as $k=>$v)
                {
                    $field_name = self::get_field_name($temparr[1][$k],$field_data);
                    if($field_name)
                        $val_text = str_replace($v,"'".$field_name."'",$val);
                    else
                        $val_text = $val;
                }
                
                $condition.='<option value="'.$val.'">'.$val_text.'</option>';
            }
            
            $value['condition'] = $condition;
            $json_data[$key] = $value;
        }
        
        return json_encode($json_data);
    }
    
    //通过 name  data_x 找到 title
    public function get_field_name($field,$field_data)
    {
        $field = trim($field);
        if(!$field) return '';
        $title = '';
        foreach($field_data as $value)
        {
            if($value['leipiplugins'] =='checkboxs' && $value['parse_name']==$field)
            {
                $title = $value['title'];
                break;
            }else if($value['name']==$field)
            {
                $title = $value['title'];
                break;
            }
        }
        return $title;
    }
    
    public function save_attribute()
    {
        $flow_id = intval(input('post.flow_id'));//流程ID
        $process_id = intval(input('post.process_id'));//步骤ID
        $process_name = trim(input('post.process_name'));//步骤名称
        $process_type = trim(input('post.process_type'));//类型
        $auto_person = intval(input('post.auto_person'));//自动选人
        $process_to = ids_parse(input('post.process_to/a'));//下一步
        $auto_unlock = intval(input('post.auto_unlock'));//>预先设置自动选人，更方便转交工作
		$auto_sponsor_ids = trim(input('post.auto_sponsor_ids'));//指定主办人
        $auto_sponsor_text = trim(input('post.auto_sponsor_text'));
        $auto_respon_ids = trim(input('post.auto_respon_ids'));//指定经办人
        $auto_respon_text = trim(input('post.auto_respon_text'));
        $auto_role_ids = trim(input('post.auto_role_ids'));//指定角色
        $auto_role_text = trim(input('post.auto_role_text'));
        $auto_dept_ids = trim(input('post.auto_dept_ids'));
        $auto_dept_text = trim(input('post.auto_dept_text'));
        $range_user_ids = trim(input('post.range_user_ids'));//授权人员
        $range_user_text = trim(input('post.range_user_text'));
        $range_dept_ids = trim(input('post.range_dept_ids'));//授权部门
        $range_dept_text = trim(input('post.range_dept_text'));
        $range_role_ids = trim(input('post.range_role_ids'));//授权角色
        $range_role_text = trim(input('post.range_role_text'));
        //操作
        $receive_type = intval(input('post.receive_type'));//交接方式
        $is_user_end = intval(input('post.is_user_end'));//允许主办人办结流程
        $is_userop_pass = intval(input('post.is_userop_pass'));//经办人可以转交下一步
//        $is_sing = intval(input('post.is_sing'));//会签方式
        $is_sing = 0;//会签方式
        $sign_look = intval(input('post.sign_look'));//可见性
        $is_back = intval(input('post.is_back'));//回退方式
        //转出条件
       $process_condition =  trim(input('post.process_condition'),',');//process_to
       $process_condition = explode(',',$process_condition);
       $out_condition = array();

       foreach($process_condition as $value)
       {
           $value = intval($value);
           if($value>0)
           {
               $condition = trim($_POST['process_in_set_'.$value],"@leipi@");
               $condition = $condition ? explode("@leipi@",$condition) : array();
               $out_condition[$value] = array(
                     'condition'=>$condition,
                     'condition_desc'=>trim($_POST['process_in_desc_'.$value]),
               );
           }
       }
       //样式
       $style_width = intval(input('post.style_width'));
       $style_height = intval(input('post.style_height'));
       $style_color = trim(input('post.style_color'));
       $style_icon = trim(input('post.style_icon'));
		//end 避免出错，都列出来先
       $process_model = db('tb_flow_process');
       //对数据进行判断
       if($flow_id<=0 || $process_id<=0){
		   return msg_return('保存失败',1);
       }
        $process_one = db('tb_flow_process')->find($process_id);
        if(!$process_one){
			return msg_return('未找到步骤，请刷新再试',1);
        }
        //保存数据， 不列出来的，直接写这里也可以呀
        $data = array(
            //常规
            'process_name'=>$process_name,
            'process_type'=>$process_type,
			'process_to'=>$process_to,
            //权限
            'auto_person'=>$auto_person,
            'auto_unlock'=>$auto_unlock,
            'auto_sponsor_ids'=>$auto_sponsor_ids,
            'auto_sponsor_text'=>$auto_sponsor_text,
            'auto_respon_ids'=>$auto_respon_ids,
            'auto_respon_text'=>$auto_respon_text,
            'auto_role_ids'=>$auto_role_ids,
            'auto_role_text'=>$auto_role_text,
            'auto_dept_ids'=>$auto_dept_ids,
            'auto_dept_text'=>$auto_dept_text,
            'range_user_ids'=>$range_user_ids,
            'range_user_text'=>$range_user_text,
            'range_dept_ids'=>$range_dept_ids,
            'range_dept_text'=>$range_dept_text,
            'range_role_ids'=>$range_role_ids,
            'range_role_text'=>$range_role_text,
            //操作
            'receive_type'=>$receive_type,
            'is_user_end'=>$is_user_end,
            'is_userop_pass'=>$is_userop_pass,
            'is_sing'=>$is_sing,
            'sign_look'=>$sign_look,
            'is_back'=>$is_back,
            //转出条件
            'out_condition'=>json_encode($out_condition),
            //样式
            'style'=>json_encode(array(
                'width'=>$style_width,
                'height'=>$style_height,
                'color'=>$style_color,
                'icon'=>$style_icon,
            )),
           
        );
		db('tb_flow_process')->where('id',$process_id)->update($data);
		// 判断工作流状态
        $status = db('tb_flow')->where('id',$flow_id)->update(['status' => 1]);
		return msg_return('发布成功！');
    }
    //返回给firame提交的表单
    public function return_iframe_ajax($ajax_return)
    {
        echo '<script type="text/javascript">parent.saveAttribute('.json_encode($ajax_return).');</script>';
        exit;
    } 
	private function get_db_column_comment($table_name = '', $field = true, $table_schema = ''){
		$database = config('database.');
		$table_schema = empty($table_schema) ? $database['database'] : $table_schema;
        // $table_name = $database['prefix'] . $table_name;
		$table_name = 'tb_' . $table_name;
		$fieldName = $field === true ? 'allField' : $field;
		$cacheKeyName = 'db_' . $table_schema . '_' . $table_name . '_' . $fieldName;
		$param = [
			$table_name,
			$table_schema
		];
		$columeName = '';
		if($field !== true){
			$param[] = $field;
			$columeName = "AND COLUMN_NAME = ?";
		}
		$res = Db::query("SELECT COLUMN_NAME as field,column_comment as comment FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = ? AND table_schema = ? $columeName", $param);
		$result=array();
		foreach($res as $k =>$value){
			foreach($value as $key=>$v){
				if($value['comment'] !=''){
					$result[$value['field']]=$value['comment'];
				}
			}  
		}
		return count($result) == 1 ? reset($result) : $result;
	}
	//用户选择控件
    public function super_user()
    {
        $operation_team_id = session('admin.operation_team_id');
        $user = Admin::where('operation_team_id',$operation_team_id)->with('department')->field('id,department_id,nickname as username')->select()->toArray();
		$data = [];
		foreach ($user as $value) {
		    if($value['department_id'] === 0) {
		        $value['department'] = ['id' => 0, 'name' => '公司'];
            }
            $data[] = $value;
        }
        $this->assign('user',$data);
		
		$this->assign('kid',input('kid'));
        return $this->fetch();
    }
	//角色选择控件
    public function super_role()
    {
        $operation_team_id = session('admin.operation_team_id');
		$this->assign('role',db('tb_role')->where('operation_team_id',$operation_team_id)->field('id,name as username')->select());
        return $this->fetch();
    }
    //部门选择控件
    public function super_department()
    {
        $operation_team_id = session('admin.operation_team_id');
        $department = db('tb_department')->where('operation_team_id',$operation_team_id)->field('id,name as username')->select();
//        $list = Department::generateTree($department);
        $this->assign('department',db('tb_department')->where('operation_team_id',$operation_team_id)->field('id,name as username')->select());
        return $this->fetch();
    }
	public function super_get()
	{
        $operation_team_id = session('admin.operation_team_id');
		 $type = trim(input('type'));
		 if($type=='user'){
			$info =  db('tb_admin')->where('operation_team_id',$operation_team_id)->where('nickname','like','%'.input('key').'%')->field('id as value,nickname as text')->select();
		 }elseif($type=='role'){
			 $info =  db('tb_role')->where('operation_team_id',$operation_team_id)->where('name','like','%'.input('key').'%')->field('id as value,name as text')->select();
		 }else{
             $info =  db('tb_department')->where('operation_team_id',$operation_team_id)->where('name','like','%'.input('key').'%')->field('id as value,name as text')->select();
         }
		 return ['data'=>$info,'code'=>1,'msg'=>'查询成功！'];
	}
}