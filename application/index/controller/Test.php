<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Test extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function get_keywords()
    {
        $url = request()->param('url');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $html = curl_exec($ch);
        preg_match('/^Set-Cookie: (.*?);/m',$html,$m);
        if (!empty($m)) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_COOKIE, $m[1]);
            $html = curl_exec($ch);
        }
        $doc = new \DOMDocument();
        @$doc->loadHTML($html);
        // $labels = ['meta','h1','h2', 'title'];
        $keywords = [];
        // 获取h1
        $h1 = $doc->getElementsByTagName('h1');
        if ($h1->length > 0) {
            for ($i = 0; $i < $h1->length; $i++) {
                $h = $h1->item($i);
                $keywords[] = $h->nodeValue;
            }
            $keywords = implode(',', $keywords);
            return json(['code' => 200, 'keywords' => $keywords]);
        }
        // 获取title
        $titles = $doc->getElementsByTagName('title');
        if ($titles->length > 0) {
            for ($i = 0; $i < $titles->length; $i++) {
                $title = $titles->item($i);
                $keywords[] = $title->nodeValue;
            }
            $keywords = implode(',', $keywords);
            return json(['code' => 200, 'keywords' => $keywords]);
        }
        // 获取h2
        $h2 = $doc->getElementsByTagName('h2');
        if ($h2->length > 0) {
            for ($i = 0; $i < $h2->length; $i++) {
                $h = $h2->item($i);
                $keywords[] = $h->nodeValue;
            }
            $keywords = implode(',', $keywords);
            return json(['code' => 200, 'keywords' => $keywords]);
        }
        // 获取keywords
        $metas = $doc->getElementsByTagName('meta');
        for ($i = 0; $i < $metas->length; $i++) {
            $meta = $metas->item($i);
            $name = strtolower($meta->getAttribute('name'));
            $arr_keyword = ['keywords', 'keyword'];
            if (in_array($name, $arr_keyword)) {
                $keyword = $meta->getAttribute('content');
                $keywords[] = $keyword;
            }
        }
        $keywords = implode(',', $keywords);
        return json(['code' => 200, 'keywords' => $keywords]);
    }
}
