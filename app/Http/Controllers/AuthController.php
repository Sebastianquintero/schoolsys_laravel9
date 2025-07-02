<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.iniciar_sesion');
    }

    /*  -- ---- --  */

public function login(Request $request)
{
    $credentials = [
        'correo' => $request->input('email'),
        'password' => $request->input('password'),
    ];

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('welcome')->with('success', '¡Bienvenido al sistema!');
    }

    return back()->with('error', 'Campos ingresados no válidos.');
}


    /*  -- - -- - - -- -- */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
