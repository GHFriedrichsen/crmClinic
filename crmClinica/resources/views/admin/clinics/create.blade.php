@extends('layouts/masterAdmin')

@section('content')
    <div class="container">
        <h1>Create New Clinic</h1>

        <form action="{{ route('admin.clinics.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Name:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" required>
            </div>
            <div class="form-group">
                <label for="endereco">Address:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('admin.clinics.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
