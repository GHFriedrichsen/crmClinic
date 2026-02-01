@extends('master')

@section('content')
<h2>Create</h2>


@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif
<!-- pega mensagem da controller se tiver ela mostra pra o usuario -->
<form action="{{ route('users.store') }}" method="post">
    @csrf

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="{{ old('name') }}">
        <label for="name" class="form-label">Name:</label>
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" name="email" placeholder="Your email" value="{{ old('email') }}">
        <label for="email" class="form-label">Email:</label>
    </div>

    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
        <label for="password" class="form-label">Password:</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="role" name="role" placeholder="Your role" value="{{ old('role') }}">
        <label for="role" class="form-label">Role:</label>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="nascimento" name="nascimento" value="{{ old('nascimento') }}">
        <label for="nascimento" class="form-label">Birthday:</label>
    </div>

    <div class="form-floating mb-3">
        <button type="submit" class="btn btn-primary">
            Create
        </button>
    </div>
</form>

@endsection