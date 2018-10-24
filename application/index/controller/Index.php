<?php
namespace app\index\controller;

use app\index\model\Space;
use app\index\model\ConsultPolicy;
use app\index\model\Carousel;
use app\index\model\EnterTeam;

class Index
{
    public function index()
    {
        //轮播数据
        $carousel = Carousel::where('status = 1')
            ->order('id', 'desc')
            ->field('id,url,picture')
            ->limit(4)
            ->select();

        // 空间数据
        $space = Space::order('id','desc')
            ->field('id,name,short_description,description')
            ->limit(11)
            ->select();
        // 咨询政策
        $policy = ConsultPolicy::order('id')
            ->limit(4)
            ->select();
        // 入驻企业
        $company = EnterTeam::order('id')->limit(8)->field('id,logo')->select();

        $data = array_merge(['carousel' => $carousel, 'space' => $space, 'policy' => $policy, 'company' => $company]);
        return json(['code' => 200, 'message' => '获取成功', 'data' => $data]);
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
