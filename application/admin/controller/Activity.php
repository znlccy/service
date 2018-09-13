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
use think\Controller;

class Activity extends BaseController {

    /* 声明活动模型 */
    protected $activity_model;

    /* 声明活动分页 */
    protected $activity_page;

    /* 默认构造函数 */
    public function __construct(App $app = null) {
        parent::__construct($app);
        $this->activity_model = new ActivityModel();
        $this->activity_page = config('page.pagination');
    }

    /* 活动列表 */
    public function index() {

        //接收客户端提交过来的数据
        $id = $this->request->param('id');
        $title = $this->request->param('title');
        $content = $this->request->param('content');
        $status = $this->request->param('status');
        $recommend = $this->request->param('recommend');
        $publisher = $this->request->param('publisher');
        $create_start = $this->request->param('create_start');
        $create_end = $this->request->param('create_end');
        $update_start = $this->request->param('update_start');
        $update_end = $this->request->param('update_end');
        $page_size = $this->request->param('page_size', $this->activity_page['PAGE_SIZE']);
        $jump_page = $this->request->param('jump_page', $this->activity_page['JUMP_PAGE']);

        //验证数据
        $validate_data = [
            'id'            => $id,
            'title'         => $title,
            'content'       => $content,
            'status'        => $status,
            'recommend'     => $recommend,
            'publisher'     => $publisher,
            'create_start'  => $create_start,
            'create_end'    => $create_end,
            'update_start'  => $update_start,
            'update_end'    => $update_end,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Activity.index');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        //筛选条件
        $conditions = [];

        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($title) {
            $conditions[] = ['title', 'like', '%' . $title . '%'];
        }
        if ($content) {
            $conditions[] = ['content', 'like', '%' . $content . '%'];
        }
        if (is_null($status)) {
            $conditions[] = ['status', 'in',[0,1]];
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
        if ($create_start && $create_end) {
            $conditions[] = ['create_time', 'between time', [$create_start, $create_end]];
        }
        if ($update_start && $update_end) {
            $conditions[] = ['update_time', 'between time', [$update_start, $update_end]];
        }

        //返回结果
        $activity = $this->activity_model
            ->where($conditions)
            ->order('id', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($activity) {
            return json([
                'code'      => '200',
                'message'   => '查询信息成功',
                'data'      => $activity
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询信息失败，数据库中不存在'
            ]);
        }
    }

    /* 活动添加更新 */
    public function save() {

        //接收客户端提交过来的数据
        $id = $this->request->param('id');
        $title = $this->request->param('title');
        $content = $this->request->param('content');
        $status = $this->request->param('status');
        $recommend = $this->request->param('recommend');
        $picture = $this->request->file('picture');
        $publisher = session('admin.mobile');
        $rich_text = $this->request->param('rich_text');
        // 移动图片到框架应用根目录/public/images
        if ($picture) {
            $info = $picture->move(ROOT_PATH . 'public' . DS . 'images');
            if ($info) {
                //成功上传后，获取上传信息
                //输出文件保存路径
                $sub_path = str_replace('\\', '/', $info->getSaveName());
                $picture  = '/images/' . $sub_path;
            }
        }

        //验证数据
        $validate_data = [
            'id'        => $id,
            'title'     => $title,
            'content'   => $content,
            'status'    => $status,
            'recommend' => $recommend,
            'picture'   => $picture,
            'publisher' => $publisher,
            'rich_text' => $rich_text
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Activity.save');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        //返回结果
        if (empty($id)) {
            $operator = $this->activity_model->save($validate_data);
        } else {
            if (empty($picture)) {
                unset($validate_data['picture']);
            }
            $operator = $this->activity_model->save($validate_data, ['id' => $id]);
        }

        if ($operator) {
            return json([
                'code'      => '200',
                'message'   => '操作数据成功'
            ]);
        } else {
            return json([
                'code'      => '401',
                'message'   => '操作数据失败'
            ]);
        }

    }

    /* 活动详情 */
    public function detail() {

        //活动客户端提交过来的数据
        $id = $this->request->param('id');

        //验证数据
        $validate_data = [
            'id'        => $id
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Activity.detail');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        //返回结果
        $activity = $this->activity_model->where('id', $id)->find();

        if ($activity) {
            return json([
                'code'      => '200',
                'message'   => '查询数据成功',
                'data'      => $activity
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询数据失败，数据不存在'
            ]);
        }

    }

    /* 活动删除 */
    public function delete() {

        //接收客户端提交过来的数据
        $id = $this->request->param('id');

        //验证数据
        $validate_data = [
            'id'        => $id
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Activity.delete');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        //返回结果
        $delete = $this->activity_model->where('id', $id)->delete();

        if ($delete) {
            return json([
                'code'      => '200',
                'message'   => '删除数据成功'
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '删除数据不存在，数据不存在'
            ]);
        }
    }

}