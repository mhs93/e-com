<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
session_start();


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->loginCheck();
        return view('admin.admin_login');
    }

    public function loginCheck()
    {
        $login = Session::get('id');
        if ($login){
            return redirect()->route('dashboard')->send();
        }else{
            return;
        }
    }

    public function showDashboard(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $result = Admin::where('email', $email)->where('password', $password)->first();

        if ($result){
            Session::put('id', $result->id);
            Session::put('name', $result->name);
            return redirect()->route('dashboard');
        }else{
            Session::put('message', 'Email or password invalid');
            return redirect()->route('admin-login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
