@extends('layouts/auth')

@section('content')

<div class="container" id="container">
    <div class="form-container sign-up">
        <form>
            @csrf
            <h1>Criar uma conta</h1>

            <span>Em algumas horas será aprovado.</span>
            <input type="text" placeholder="Nome" name="name" required>
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Senha" name="password" required>
            <input type="date" name="nascimento" required>
            <span>Não esta funcionando... ainda s2 </span>
            <button>Registrar</button>
        </form>
    </div>
    <div class="form-container sign-in">
        <form action="{{ route('login.auth') }}" method="POST">
            @csrf
            <h1>Login</h1>
            <span>Insara seu e-mail e senha</span>
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Senha" name="password" required>
            <!-- <a href="#">Esqueceu sua senha?</a> -->
            <button type="submit">Entrar</button>

            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Bem vindo de volta!</h1>
                <p>Coloque seus dados para poder acessar o site</p>
                <button class="hidden" id="login">Entrar</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Olá, seja bem-vindo!</h1>
                <p>Teha um ótimo dia!!</p>
                <button class="hidden" id="register">Criar uma conta</button>
            </div>
        </div>
    </div>
</div>

@endsection