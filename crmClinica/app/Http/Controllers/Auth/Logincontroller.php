<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logincontroller extends Controller
{

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); //regenerate n deixa fixar nessa secçao

            $user = Auth::user();

            if ($user->role === "userUnregister") {
                Auth::logout(); // Desloga imediatamente
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'Sua conta está aguardando aprovação do administrador.',
                ])->onlyInput('email');
            }

            if ($user->role === "superAdmin") {
                return redirect()->intended(route("users.index"));
            }

            return redirect()->intended(route('dashboard'));
        }


        //volta com erro
        return back()->withErrors([
            'email' => 'Algo deu errado tente novamente!!',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
