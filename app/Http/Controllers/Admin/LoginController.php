<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{

    //
    public function index()
    {
        return view('admin.login.login');
    }

    /**
     * 退出登录
     *
     * @return mixed
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('admin/login/index');
    }
}
