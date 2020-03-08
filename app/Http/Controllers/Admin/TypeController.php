<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * 类型列表
     * @param Type $typeModel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Type $typeModel)
    {
        $typeList = $typeModel->withTrashed()->get();
        $assign = compact('typeList');
        return view('admin.type.index', $assign);
    }

    /**
     * 添加分类页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.type.create');
    }

    /**
     * 添加分类
     * @param TypeRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TypeRequest $request)
    {
        $data = $request->except('_token');
        Type::create($data);
        return redirect('admin/type/index');
    }

    /**
     * 编辑分类页面
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $type = Type::withTrashed()->find($id);
        $assign = compact('type');
        return view('admin.type.edit',$assign);
    }

    /**
     * 更新分类
     * @param TypeRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(TypeRequest $request, int $id)
    {
        $data = $request->except('_token');
        Type::withTrashed()->find($id)->update($data);
        return redirect('admin/type/edit/'.$id);
    }

    /**
     * 软删除
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(int $id)
    {
        Type::destroy($id);
        return redirect('admin/type/index');
    }

    /**
     * 恢复
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore(int $id)
    {
        Type::onlyTrashed()->find($id)->restore();
        return redirect('admin/type/index');
    }

    /**
     * 彻底删除
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete(int $id)
    {
        Type::onlyTrashed()->find($id)->forceDelete();
        return redirect('admin/type/index');
    }
}
