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
        return Auth::check() ? redirect()->route('get.admin.dashboard') : view($this->prefix . 'login', [
            'title_page' => 'Sign in',
        ]);
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                "status" => false,
                'msg' => 'Email address or password is incorrect.'
            ], 500);
        }
        return response()->json([
            "status" => true,
            'msg' => 'Logged in successfully.'
        ]);
    }

    public function register()
    {
        return view($this->prefix . 'register', [
            'title_page' => 'Register',
        ]);
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
