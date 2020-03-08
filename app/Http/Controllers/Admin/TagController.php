<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tagList = Tag::withTrashed()
            ->get();
        $assign = compact('tagList');
        return view('admin.tag/index', $assign);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * @param TagRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TagRequest $request)
    {
        $data = $request->except('_token');
        Tag::create($data);
        return redirect('admin/tag/create');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $tag = Tag::withTrashed()->find($id);
        $assign = compact('tag');
        return view('admin.tag.edit', $assign);
    }

    /**
     * @param TagRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(TagRequest $request,int $id)
    {
        $data = $request->except('_token');
        Tag::withTrashed()->find($id)->update($data);
        return redirect('admin/tag/edit/'.$id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(int $id)
    {
        Tag::destroy($id);
        return redirect('admin/tag/index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore(int $id)
    {
        Tag::withTrashed()->find($id)->restore($id);
        return redirect('admin/tag/index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete(int $id)
    {
        Tag::withTrashed()->find($id)->forceDelete();
        return redirect('admin/tag/index');
    }
}
