<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NavRequest;
use App\Models\Nav;
use Illuminate\Http\Request;

class NavController extends Controller
{
    /**
     * @param Nav $navModel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Nav $navModel)
    {
        $navList = $navModel->withTrashed()->orderBy('sort')->get();
        $assign = compact('navList');
        return view('admin.nav.index', $assign);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.nav.create');
    }

    /**
     * @param NavRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(NavRequest $request)
    {
        $data = $request->except('_token');
        Nav::create($data);
        return redirect('admin/nav/index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $nav = Nav::withTrashed()->find($id);
        $assign = compact('nav');
        return view('admin.nav.edit', $assign);
    }

    /**
     * @param NavRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(NavRequest $request, int $id)
    {
        $data = $request->except('_token');
        Nav::withTrashed()->find($id)->update($data);
        return redirect('admin/nav/edit/'.$id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(int $id)
    {
        Nav::destroy($id);
        return redirect('admin/nav/index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore(int $id)
    {
        Nav::onlyTrashed()->find($id)->restore();
        return redirect('admin/nav/index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete(int $id)
    {
        Nav::onlyTrashed()->find($id)->forceDelete();
        return redirect('admin/nav/index');
    }
}
