<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }

    public function registerShow()
    {
        return view('user.registerShow', [
            'pageTitle' => 'Registrar'
        ]);
    }

    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!is_null($user))
            return redirect()->back()->withInput()->withErrors([
                'failed' => 'Usuário já existente'
            ]);

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->save();

        Auth::login($newUser);

        return redirect()->route('home.show');
    }
    
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
