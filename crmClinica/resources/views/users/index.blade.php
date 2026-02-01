@extends('master')

@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Users</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary ">Adicionar usuario</a>
    </div>


    @if ($users->IsEmpty(true))
    <div class="alert alert-warning">
        Sem usuarios cadastrados
    </div>

    @else

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

            <tr>
            <th scope="row">{{ $loop->iteration }}</th>

            <td>
                {{ $user->name }}
            </td>
            <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-secondary"><i class="bi bi-eye-fill">Mostar</i></a></td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary"><i class="bi bi-pencil"></i>Editar</a>
            </td>
            <td>
                <form action="{{ route('users.destroy', $user->id) }}"
                    method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="submit">
                        <i class="bi bi-trash-fill"></i>Excluir
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif
</div>


@endsection