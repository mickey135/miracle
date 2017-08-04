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

//后台路由栏目管理
Route::group(['middleware' => 'auth'], function () {
	Route::get('admin/index',function(){
	return view('admin/index');
	});
	//电影增删改查
	Route::any('admin/add','admin\MovieController@add');
	Route::any('admin/list','admin\MovieController@list');
	Route::any('admin/edit/{id}','admin\MovieController@edit');
	Route::any('admin/del/{id}','admin\MovieController@del');

	//地区管理
	Route::any('admin/country','admin\CountryController@country');
	Route::any('admin/countryedit/{country_id}','admin\CountryController@countryEdit');
	Route::any('admin/countrydel/{country_id}','admin\CountryController@countryDel');

	//类型管理
	Route::any('admin/type','admin\TypeController@type');
	Route::any('admin/typeedit/{type_id}','admin\TypeController@typeEdit');
	Route::any('admin/typedel/{type_id}','admin\TypeController@typeDel');


    Route::get('auth/logout', 'Auth\AuthController@getLogout');

});
//跳转的地址
Route::get('home',function(){
	return redirect('admin/index');
});
Route::get('myp', 'Auth\AuthController@getLogin');
Route::post('myp', 'Auth\AuthController@postLogin');


