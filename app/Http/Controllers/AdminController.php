<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use JetBrains\PhpStorm\NoReturn;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function login(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Login.login');
    }

    public function loginProcess(\Illuminate\Http\Request $request)
    {
        $accounts = $request->only(['email', 'password']);
        if(Auth::guard('admin')->attempt($accounts)){
            //Lấy dữ liệu của người đang đăng nhập
            $admin = Auth::guard('admin')->user();
            Auth::guard('admin')->login($admin);
            //Lưu dữ liệu của người đang đăng nhập lên session
            session(['admin' => $admin]);
            return Redirect::route('brands.index');
        } else {
            return Redirect::back();
        }
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('admin')->logout();
        session()->forget('admin');
        return Redirect::route('login');
    }
}
