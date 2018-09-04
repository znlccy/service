<?php

namespace app\common\controller;

use Mpdf\Mpdf;
use think\App;
use think\Controller;

class GenerateFile extends Controller
{
    public function __construct(App $app = null)
    {
        parent::__construct($app);
    }

    /**
     * 生成pdf文件
     */
    public function topdf()
    {

        // 引入MPDF类文件
        set_time_limit(0);
        include '/include/MPDF57/mpdf.php';

        // 实例化mpdf
        $mpdf = new Mpdf('utf-8', 'A4', '', '宋体', 0, 0, 20, 10);

        // 设置字体,解决中文乱码
        $mpdf->useAdobeCJK = true;
        // $mpdf->SetAutoFont(AUTOFONT_ALL);//使用6.0以上版本不需要

        // 获取要生成的静态文件
        $html = file_get_contents('template.html');

        echo $html;exit;

        // 设置PDF页眉内容
        $header = '<table width="95%" style="margin:0 auto;border-bottom: 1px solid #4F81BD; vertical-align: middle; font-family:
        serif; font-size: 9pt; color: #000088;"><tr>
        <td width="10%"></td>
        <td width="80%" align="center" style="font-size:16px;color:#A0A0A0">页眉</td>
        <td width="10%" style="text-align: right;"></td>
        </tr></table>';

        // 设置PDF页脚内容
        $footer = '<table width="100%" style=" vertical-align: bottom; font-family:
        serif; font-size: 9pt; color: #000088;"><tr style="height:30px"></tr><tr>
        <td width="10%"></td>
        <td width="80%" align="center" style="font-size:14px;color:#A0A0A0">页脚</td>
        <td width="10%" style="text-align: left;">页码：{PAGENO}/{nb}</td>
        </tr></table>';

        // 添加页眉和页脚到pdf中
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);

        // 设置pdf显示方式
        $mpdf->SetDisplayMode('fullpage');

        // 设置pdf的尺寸为270mm*397mm
        // $mpdf->WriteHTML('<pagebreak sheet-size="270mm 397mm" />');

        // 创建pdf文件
        $mpdf->WriteHTML($html);

        // 删除pdf第一页(由于设置pdf尺寸导致多出了一页)
        // $mpdf->DeletePages(1,1);

        // 输出pdf
        $mpdf->Output(); // 可以写成下载此pdf   $mpdf->Output('文件名','D');
    }
}
