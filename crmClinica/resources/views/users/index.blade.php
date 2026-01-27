@extends('master')

@section('content')

<h2>Users</h2>

<h2><a href="{{ route('users.create') }}">Adicionar usuario</a></h2>

@if ($users->IsEmpty(true))
    <h3>Sem usuarios cadastrados</h3>
@else
<ul>
    @foreach ($users as $user)
        <li>
            {{ $user->name }} | <a href="#">Edit</a> | <a href="#">Delet</a>
        </li>
    @endforeach
</ul>
@endif

@endsection