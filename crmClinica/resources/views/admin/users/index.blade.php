@extends('layouts/masterAdmin')

@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Users</h2>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary ">Adicionar usuario</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Sair do Sistema</button>
        </form>
    </div>

    @if ($users->IsEmpty(true))
    <div class="alert alert-warning">
        Sem usuarios cadastrados.
    </div>

    @else

    <div class="table-responsive custom-table-card">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col" class="text-secondary">#</th>
                <th scope="col" class="text-secondary">NOME DO USUÁRIO</th>
                <th scope="col" class="text-end text-secondary">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="fw-bold text-muted" style="width: 50px;">{{ $loop->iteration }}</td>
                <td>
                    <span class="user-name">{{ $user->name }}</span>
                </td>
                <td>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-action btn-show" title="Visualizar">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-action btn-edit" title="Editar">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-action btn-delete" type="submit" title="Excluir">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    @endif
</div>


@endsection