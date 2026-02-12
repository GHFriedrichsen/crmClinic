<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                return redirect()->intended(route("admin.users.index"));
            }

            return redirect()->intended(route('clients.dashboard'));
        }


        //volta com erro
        return back()->withErrors([
            'email' => 'Algo deu errado tente novamente!!',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'nascimento' => 'required|date',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nascimento' => $request->nascimento,
            // 'role' será 'userUnregister' por padrão conforme a migration
        ]);

        return redirect()->route('login')->with('success', 'Conta criada com sucesso! Aguarde a aprovação do administrador.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
