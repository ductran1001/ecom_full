<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $prefix = 'backend.pages.auth.';

    public function __construct()
    {
    }

    public function login()
    {
        return view($this->prefix . 'login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Địa chỉ email hoặc mật khẩu không chính xác.',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'msg' => 'Đăng nhập thành công'
        ], 200);
    }

    public function register()
    {
        return view($this->prefix . 'register');
    }

    public function forget()
    {
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('get.admin.login');
    }
}
