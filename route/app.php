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
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'Index/hello');
//Route::post('change', 'Index/change');//登录
Route::post('encodeRequestData', 'Index/encodeRequestData');//加密请求参数
Route::post('decodeResponseData', 'Index/decodeResponseData');//解密回调参数
//Route::post('register', 'Index/doRegister');//注册
//Route::post('logout', 'Index/logout');//退出
//Route::post('getIndex', 'Index/getIndex');//获取首页数据
//Route::post('getCustomer', 'Index/getCustomer');//获取客服列表
//Route::post('getVipList', 'Index/getVipList');//获取VIP列表
