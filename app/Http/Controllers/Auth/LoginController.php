<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RequestLogin;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(RequestLogin $request)
    {
        $user = $request->tryToLogin();

        if(!$user) {
            return back()->with(['message' => 'Login e/ou senha incorreto']);
        }

        Auth::login($user);
        return to_route('dashboard');
    }
}
