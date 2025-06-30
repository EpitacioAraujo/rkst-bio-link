<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RequestRegister;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(RequestRegister $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect()->to_route('dashboard')->with('success', 'Registration successful!');
    }
}
