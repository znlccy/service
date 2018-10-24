<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/31
 * Time: 16:50
 * Comment: 跨域行为
 */
namespace app\index\behavior;

use think\Request;

class Cross {

    public function run(Request $request, $params)
    {    // 响应头设置 我们就是通过设置header来跨域的 这就主要代码了 定义行为只是为了前台每次请求都能走这段代码
//        $origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : '';
//        $request = Request::instance();
//        header('Access-Control-Allow-Origin:' . $origin);
//        header('Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS');
//        header('Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
//        header('Access-Control-Allow-Credentials:true');
//        header('Content-Type:application/x-www-form-urlencoded; charset=UTF-8');

        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods:*');
        header('Access-Control-Allow-Headers:*');
        header('Access-Control-Allow-Credentials:false');
    }
}