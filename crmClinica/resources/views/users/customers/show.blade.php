@extends('layouts/master')

@section('content')

<div class="container mt-4">

    <div class="custom-table-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Ficha do Paciente</h2>
            <div>
                <button type="button" id="edit-btn" class="btn btn-warning me-2">
                    <i class="bi bi-pencil-square"></i> Editar Dados
                </button>
                <a href="{{ route('users.customers.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>

        <form action="{{ route('users.customers.update', $customer->id) }}" method="POST" id="patient-form">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label text-secondary fw-bold">Nome Completo</label>
                    <input type="text" name="nome" class="form-control" value="{{ $customer->nome }}" disabled required>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-secondary fw-bold">CPF</label>
                    <input type="text" name="cpf" class="form-control" value="{{ $customer->cpf }}" disabled required>
                </div>

                <div class="col-md-12">
                    <label class="form-label text-secondary fw-bold">Informações Clínicas (JSON)</label>
                    <textarea name="dados_clinicos" class="form-control" rows="4" disabled>{{ is_array($customer->dados_clinicos) ? json_encode($customer->dados_clinicos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : $customer->dados_clinicos }}</textarea>
                </div>
            </div>

            <div id="save-actions" class="mt-4 d-none">
                <hr>
                <button type="submit" class="btn btn-success px-4">Salvar Alterações</button>
                <button type="button" id="cancel-btn" class="btn btn-outline-secondary">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<!-- JS para ativar os campos que eu preciso -->

<script>
    const editBtn = document.getElementById('edit-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    const saveActions = document.getElementById('save-actions');
    const inputs = document.querySelectorAll('#patient-form input, #patient-form textarea');

    editBtn.addEventListener('click', () => {
        // Habilita os inputs
        inputs.forEach(input => input.disabled = false);
        // Mostra botões de salvar e esconde o de editar
        saveActions.classList.remove('d-none');
        editBtn.classList.add('d-none');
    });

    cancelBtn.addEventListener('click', () => {
        // Recarrega a página para resetar as alterações e bloquear novamente
        window.location.reload();
    });
</script>
@endsection