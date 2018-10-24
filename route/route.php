<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

// 运营团队相关
Route::rule('admin/operation_team/add_user','admin/OperationTeam/addUser');
Route::rule('admin/operation_team/delete_user','admin/OperationTeam/deleteUser');
Route::rule('admin/operation_team/add_role','admin/OperationTeam/addRole');
Route::rule('admin/operation_team/delete_role','admin/OperationTeam/deleteRole');
Route::rule('admin/department/select_department','admin/Department/selectDepartment');
return [
];
