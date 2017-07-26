<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//首页&最新电影
Route::get('/','IndexController@latest');
//热门电影
Route::get('hot','IndexController@hot');
//电影信息
Route::get('detail/{id}','IndexController@movie');


//后台路由基本设置
Route::get('admin/index',function(){
	return view('admin/index');
});

Route::get('admin/login',function(){
	return view('admin/login');
});

Route::get('admin/info',function(){
	return view('admin/info');
});

Route::get('admin/password',function(){
	return view('admin/password');
});
//单页管理
Route::get('admin/page',function(){
	return view('admin/page');
});
//首页轮播图
Route::get('admin/adv',function(){
	return view('admin/adv');
});
//留言管理
Route::get('admin/comment',function(){
	return view('admin/comment');
});
//栏目管理
Route::get('admin/column',function(){
	return view('admin/column');
});
//后台路由栏目管理

//电影增删改查
Route::any('admin/add','admin\MovieController@add');
Route::any('admin/list','admin\MovieController@list');
Route::any('admin/edit/{id}','admin\MovieController@edit');


//分类管理(blog栏目列表&添加)
Route::any('admin/cat','admin\CatController@cat');
//分类修改(blog栏目修改)
Route::any('admin/catedit/{cat_id}','admin\CatController@catEdit');
//分类删除(blog栏目删除)
Route::any('admin/catdel/{cat_id}','admin\CatController@catDel');

//地区管理
Route::any('admin/country','admin\CountryController@country');
//类型管理
Route::any('admin/type','admin\TypeController@type');
