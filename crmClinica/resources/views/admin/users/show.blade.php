@extends('layouts/masterAdmin')

@section('content')

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Show</h2>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary">Voltar</a>
        </div>

        <h4>Nome: {{ $user->name }}</h4>
        <h4>Email: {{ $user->email }}</h4>
        <h4>Role: {{ $user->role }}</h4>
        <h4>Nascimento: {{ $user->nascimento }}</h4>
        <h4>Senha: {{ $user->password }}</h4>
    </div>

@endsection