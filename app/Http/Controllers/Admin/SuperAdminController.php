<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
session_start();

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('admin-login');
    }

    public function AdminAuthCheck()
    {
        $admin_id = Session::get('id');
        if ($admin_id){
            return;
        }else{
            return redirect()->route('admin-login')->send();
        }
    }
}
