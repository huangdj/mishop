<?php

use think\facade\Route;

/***
 * 后台管理系统的接口路由
 */
Route::group('backstage', function () {
    Route::get('admin', 'backstage/Index/index')->allowCrossDomain(); // 后台首页

    Route::resource('brand','backstage/brand')->except(['create', 'read']); // 商品品牌
});

/***
 * 前台手机端接口路由
 */
Route::group('api', function () {
    Route::get('home/:id', 'api/Home/show')->allowCrossDomain();  // 商品详情
    Route::get('home', 'api/Home/index')->allowCrossDomain(); // 首页
    Route::post('home/get_products', 'api/Home/get_products')->allowCrossDomain(); // 首页--加载更多

    Route::post('cart', 'api/Cart/store')->allowCrossDomain()->middleware(thans\jwt\middleware\JWTAuth::class); // 加入购物车
    Route::get('cart', 'api/Cart/index')->allowCrossDomain()->middleware(thans\jwt\middleware\JWTAuth::class); // 购物车列表
    Route::patch('cart', 'api/Cart/change_num')->allowCrossDomain()->middleware(thans\jwt\middleware\JWTAuth::class); // 改变数量
    Route::delete('cart/:id', 'api/Cart/destroy')->allowCrossDomain()->middleware(thans\jwt\middleware\JWTAuth::class); // 删除购物车

    Route::post('user/login', 'api/User/login')->allowCrossDomain();  // 登录
    Route::post('user/register', 'api/User/register')->allowCrossDomain(); // 注册
//    Route::get('oauth/login','api/Oauth/login')->allowCrossDomain();  // qq登录
//    Route::get('oauth/callback','api/Oauth/callback')->allowCrossDomain();  // qq登录回调
});



