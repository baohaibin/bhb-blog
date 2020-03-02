<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //文章列表
    public function index(Article $articleModel)
    {
        $articleList = $articleModel->get();
        $assign = compact('articleList');
        return view('admin.article.index', $assign);
    }
    //发布文章
    public function create()
    {
        return view('admin.article.create');
    }

    public function store(ArticleRequest $request)
    {
        $result = Article::create($request);
        redirect('admin/article/index');
    }

    //编辑页面
    public function edit($id)
    {

    }

    //编辑文章
    public function update()
    {

    }

    //上传图片
    public function uploadImage()
    {

    }

    //删除文章
    public function destroy()
    {

    }

    //恢复文章
    public function restore()
    {

    }

    //彻底删除
    public function forceDelete()
    {

    }
}
