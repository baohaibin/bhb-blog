<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use App\Models\Type;
use Baijunyao\LaravelUpload\Upload;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //文章列表
    public function index(Article $articleModel)
    {
        $articleList = $articleModel->with('type')
            ->withTrashed()
            ->paginate(15);
//        $articleList = Article::with('type')
//            ->orderBy('created_at', 'desc')
//            ->withTrashed()
//            ->paginate(15);
        $assign = compact('articleList');
        return view('admin.article.index', $assign);
    }
    //发布文章
    public function create()
    {
        $typeList = Type::get();
        $tagList = Tag::get();
        $assign = compact('typeList', 'tagList');
        return view('admin.article.create', $assign);
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->except('_token');

        if ($request->hasFile('cover')) {
            $result = Upload::file('cover', 'uploads/article');
            if ($result['status_code'] === 200) {
                $data['cover'] = $result['data'][0]['path'];
            }
        }
        $tag_ids = $data['tag_id'];
        unset($data['tag_id']);
        $article = Article::create($data);

        if ($article) {
            // 给文章添加标签
            $articleTag = new ArticleTag();
            $articleTag->addArticleTags($article->id, $tag_ids);
        }

        return redirect('admin/article/index');
    }

    /**
     * 配合editormd上传图片的方法
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage()
    {
        $result = Upload::image('editormd-image-file', 'uploads/article');
        if ($result['status_code'] === 200) {
            $data = [
                'success' => 1,
                'message' => $result['message'],
                'url'     => $result['data'][0]['path'],
            ];
        } else {
            $data = [
                'success' => 0,
                'message' => $result['message'],
                'url'     => '',
            ];
        }

        return response()->json($data);
    }

    /**
     * 编辑页面
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $article = Article::withTrashed()->find($id);
        $article->tag_ids = ArticleTag::where('article_id', $id)->withoutTrashed()->pluck('tag_id')->toArray();
        $typeList = Type::get();
        $tagList = Tag::get();
        $assign = compact('article', 'typeList', 'tagList');
        return view('admin.article.edit', $assign);
    }

    /**
     * 编辑文章
     * @param ArticleRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ArticleRequest $request,int $id)
    {
        $data = $request->except('_token');
        // 上传封面图
        if ($request->hasFile('cover')) {
            $result = Upload::file('cover', 'uploads/article');
            if ($result['status_code'] === 200) {
                $data['cover'] = $result['data'][0]['path'];
            }
        }
        $tag_ids = $data['tag_id'];
        unset($data['tag_id']);
        $article = Article::withTrashed()->find($id)->update($data);

        if ($article) {
            ArticleTag::where('article_id', $id)->forceDelete();
            $articleTagModel = new ArticleTag();
            $articleTagModel->addArticleTags($id, $tag_ids);
        }

        return redirect('admin/article/edit/'.$id);
    }

    /**
     * 删除文章
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(int $id)
    {
        Article::destroy($id);
        return redirect('admin/article/index');
    }

    /**
     * 恢复文章
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore(int $id)
    {
        Article::onlyTrashed()->find($id)->restore();
        return redirect('admin/article/index');
    }

    /**
     * 彻底删除
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete(int $id)
    {
        Article::onlyTrashed()->find($id)->forceDelete();
        return redirect('admin/article/index');
    }
}
