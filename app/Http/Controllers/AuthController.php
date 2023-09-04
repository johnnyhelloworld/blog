<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intented(route('admin.property.index'));
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects'
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes maintenant déconnecté');
    }

    public function register(){
        return view('auth.register');
    }

    public function doRegister(RegisterRequest $request)
    {
        $credentials = $request->validated();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès. Connectez-vous maintenant.');
    }
}
