<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public readonly User $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->all();
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return View('users.create');
    }

    public function store(Request $request)// o laravel pede todo o que foi enviado via form para o back 
    {
        $user = new User();    
    
    //var_dump('store user');
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);

        $user->nascimento = $request->nascimento;

        $user->save();

        return redirect()->route('users.index');
    }
}
