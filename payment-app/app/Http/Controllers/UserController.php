<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginShow()
    {
        return view('user.loginShow', [
            'pageTitle' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->except('_token');

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['failed' => 'Credenciais incorretas!'])->withInput();
        }

        return redirect()->route('home.show');
    }
}
