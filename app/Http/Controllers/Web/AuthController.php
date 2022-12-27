<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm(){
        return view('web.login');
    }

    public function registerForm(){
        return view('web.register');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('home');
    }

    public function login(Request $request){

        $data= $request->only(['password' , 'email']);
        if (Auth::guard('web')->attempt($data,true)){
            $admin = User::where('email',$data['email'])->first();
            Auth::login($admin);
            return redirect()->route('home');
        }
        return redirect()->route('loginForm');
    }

    public function register(Request $request){
        $data = $this->validate($request, [
            'password' => 'required|confirmed|min:6',
            'email' => 'required|unique:users',
            'name' => 'required'
        ]);

        $user = User::create($data);
        Auth::guard('web')->login($user);
        return redirect()->route('home');

    }

}
