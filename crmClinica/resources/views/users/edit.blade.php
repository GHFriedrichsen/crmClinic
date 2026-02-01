@extends('master')

@section('content')


<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit</h2>
        <a href="{{ route('users.index') }}" class="btn btn-outline-primary"> Voltar</a>
    </div>
</div>


<form action="{{ route('users.update', $user->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="{{ $user->name }}">
        <label for="floatingInput">Name:</label>
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" name="email" placeholder="Your email" value="{{ $user->email }}">
        <label for="floatingInput">Email:</label>
    </div>

    <div class="input-group mb-3">

        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="floatingInput">Password</label>
        </div>

        <button class="btn btn-outline-secondary" type="button" id="btnSenha">
            <i class="bi bi-eye-fill" id="iconSenha"></i>
        </button>

    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="role" name="role" placeholder="Role" value="{{ $user->role }}">
        <label for="floatingInput">Role:</label>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="nascimento" name="nascimento" value="{{ $user->nascimento?->format('Y-m-d') }}">
        <label for="floatingInput">Birthday:</label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">
            Save
        </button>
    </div>
</form>


<script>
    const btnSenha = document.getElementById('btnSenha');
    const inputSenha = document.getElementById('password');
    const iconSenha = document.getElementById('iconSenha');

    btnSenha.addEventListener('click', function() {
        if (inputSenha.type === 'password') {
            inputSenha.type = 'text';
            iconSenha.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
        } else {
            inputSenha.type = 'password';
            iconSenha.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
        }
    });
</script>

@endsection