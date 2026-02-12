@extends('layouts/masterAdmin')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clínicas</h1>
            <a href="{{ route('admin.clinics.create') }}" class="btn btn-primary px-4 shadow-sm">
                <i class="bi bi-plus-lg me-2"></i>Adicionar Clínica
            </a>
        </div>

        <div class="custom-table-card">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="text-secondary">ID</th>
                            <th scope="col" class="text-secondary">NOME</th>
                            <th scope="col" class="text-secondary">CNPJ</th>
                            <th scope="col" class="text-secondary">ENDEREÇO</th>
                            <th scope="col" class="text-end text-secondary">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clinics as $clinic)
                            <tr>
                                <td class="fw-bold text-muted" style="width: 60px;">#{{ $loop->iteration }}</td>
                                <td><span class="user-name">{{ $clinic->nome }}</span></td>
                                <td class="text-muted">{{ $clinic->cnpj }}</td>
                                <td class="text-muted" style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $clinic->endereco }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.clinics.show', $clinic->id) }}" class="btn btn-action btn-show" title="Visualizar">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        
                                        <a href="{{ route('admin.clinics.edit', $clinic->id) }}" class="btn btn-action btn-edit" title="Editar">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <form action="{{ route('admin.clinics.destroy', $clinic->id) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Deseja realmente remover esta clínica?')"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-action btn-delete" title="Excluir">
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
        </div>
    </div>
@endsection