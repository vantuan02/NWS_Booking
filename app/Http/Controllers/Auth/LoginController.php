<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = ['email' => $request->email, 'password' => $request->password];


        if (Auth::attempt($user, $request->remember)) {
            $user = Auth::user();

            return redirect()->route('client.index')->with('success', 'Đăng nhập thành công.');
        }

        return redirect()->back() ->withErrors(['email' => 'Email hoặc mật khẩu không đúng.'])
        ->withInput($request->except('password'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('client.index')->with('success', 'Bạn đã đăng xuất.');
    }
}
