<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
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

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return View('users.create');
    }

    public function store(Request $request) // o laravel pede todo o que foi enviado via form para o back 
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = password_hash($request->password, PASSWORD_DEFAULT);

        $user->nascimento = $request->nascimento;

        $user->save();

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|email|unique:users,email,' . $user->id,
            //aqui ele ignora o email do id do nosso usuario q fez a att
            'password' => 'nullable|string|min:6',
            'role' => 'required|string',
            'nascimento' => 'required|date',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso');
    }

    public function destroy(User $user)
    {
        /*if ($user->id === auth()->id()) 
        {
            return redirect()->route('users.index')
                ->with('error', 'Você não pode excluir seu próprio usuário');
        }*/

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usário excluido com sucesso');
    }
}
