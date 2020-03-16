<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth
Route::namespace('Auth')->prefix('auth')->group(function () {
    // 后台登录
    Route::prefix('admin')->group(function () {
        Route::post('login', 'AdminController@login');
    });
});

// 后台登录页面
Route::namespace('Admin')->prefix('admin')->group(function () {

    Route::redirect('/', url('admin/login/index'));
    Route::prefix('login')->group(function () {
        // 登录页面
        Route::get('index', 'LoginController@index')->middleware('login.admin');
        // 登录
//        Route::post('login', 'LoginController@login');
        // 退出
        Route::get('logout', 'LoginController@logout');
    });
});

Route::namespace('Admin')->prefix('admin')->middleware('auth.admin')->group(function () {
    //首页
    Route::prefix('index')->group(function () {
        // 后台首页
        Route::get('/', 'IndexController@index');
    });
    // 文章管理
    Route::prefix('article')->group(function () {
        // 文章列表
        Route::get('index', 'ArticleController@index');
        // 发布文章
        Route::get('create', 'ArticleController@create');
        Route::post('store', 'ArticleController@store');
        // 编辑文章
        Route::get('edit/{id}', 'ArticleController@edit');
        Route::post('update/{id}', 'ArticleController@update');
        // 上传图片
        Route::post('uploadImage', 'ArticleController@uploadImage');
        // 删除文章
        Route::get('destroy/{id}', 'ArticleController@destroy');
        // 恢复删除的文章
        Route::get('restore/{id}', 'ArticleController@restore');
        // 彻底删除文章
        Route::get('forceDelete/{id}', 'ArticleController@forceDelete');
    });
    // 分类管理
    Route::prefix('type')->group(function () {
        // 分类列表
        Route::get('index', 'TypeController@index');
        // 新增分类
        Route::get('create', 'TypeController@create');
        Route::post('store', 'TypeController@store');

        // 编辑分类
        Route::get('edit/{id}', 'TypeController@edit');
        Route::post('update/{id}', 'TypeController@update');

        //软删除
        Route::get('destroy/{id}', 'TypeController@destroy');
        //恢复
        Route::get('restore/{id}', 'TypeController@restore');
        //彻底删除
        Route::get('forceDelete/{id}', 'TypeController@forceDelete');
    });

    Route::prefix('tag')->group(function () {
        // 分类列表
        Route::get('index', 'TagController@index');
        // 新增分类
        Route::get('create', 'TagController@create');
        Route::post('store', 'TagController@store');

        // 编辑分类
        Route::get('edit/{id}', 'TagController@edit');
        Route::post('update/{id}', 'TagController@update');

        //软删除
        Route::get('destroy/{id}', 'TagController@destroy');
        //恢复
        Route::get('restore/{id}', 'TagController@restore');
        //彻底删除
        Route::get('forceDelete/{id}', 'TagController@forceDelete');
    });

    Route::prefix('nav')->group(function () {
        // 分类列表
        Route::get('index', 'NavController@index');
        // 新增分类
        Route::get('create', 'NavController@create');
        Route::post('store', 'NavController@store');

        // 编辑分类
        Route::get('edit/{id}', 'NavController@edit');
        Route::post('update/{id}', 'NavController@update');

        //软删除
        Route::get('destroy/{id}', 'NavController@destroy');
        //恢复
        Route::get('restore/{id}', 'NavController@restore');
        //彻底删除
        Route::get('forceDelete/{id}', 'NavController@forceDelete');
    });
});
