<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data= $request->only(['password' , 'email']);
        if (Auth::guard('admin')->attempt($data,true)){
            $admin = Admin::where('email',$data['email'])->first();
            Auth::login($admin);
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.loginForm');

    }

    public function loginForm(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.auth.login');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.loginForm');
    }

    public function updatePersonalData(UpdateProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only('name' , 'email' , 'password');
        Auth::guard('admin')->user()->update($data);
        return redirect()->route('admin.home');
    }
}
