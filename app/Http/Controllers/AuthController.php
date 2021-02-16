<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }
    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password','role'))){
            if(Auth::user()->role == 'admin'){
                return '<script>alert("Login berhasil");window.location.href="/admin/home";</script>';
            }
            else{
                return '<script>alert("Login berhasil!");window.location.href="/user/home";</script>';
            }
        }
        return '<script>alert("Login gagal! mohon coba lagi!");window.location.href="/login";</script>';
    }
    public function register()
    {
        return view('auths.register');
    }
    public function postregister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->save();
        return '<script>alert("Registrasi berhasil!");window.location.href="/home";</script>';
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
