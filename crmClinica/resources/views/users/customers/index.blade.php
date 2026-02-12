@extends('layouts.master')

@section('content')

<div class="container mt-4">
    <h2>Clientes e Pacientes</h2>

    @if ($customers->IsEmpty(true))
    <div class="alert alert-warning">
        Sem clientes cadastrados.
    </div>
    @else

    <div class="table-responsive custom-table-card">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col" class="text-secondary">#</th>
                    <th scope="col" class="text-secondary">NOME DO PACIENTE</th>
                    <th scope="col" class="text-end text-secondary">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                    <td class="fw-bold text-muted" style="width: 50px;">{{ $loop->iteration }}</td>
                    <td>
                        <span class="customer-name">{{ $customer->nome }}</span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('users.customers.show', $customer->id)}}" class="btn btn-action btn-show" title="Visualizar">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <form action="#"
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