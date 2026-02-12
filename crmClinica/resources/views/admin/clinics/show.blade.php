@extends('layouts/masterAdmin')

@section('content')
    <div class="container">
        <h1>Clinic Details</h1>

        <div>
            <strong>ID:</strong> {{ $clinic->id }}
        </div>
        <div>
            <strong>Name:</strong> {{ $clinic->nome }}
        </div>
        <div>
            <strong>CNPJ:</strong> {{ $clinic->cnpj }}
        </div>
        <div>
            <strong>Address:</strong> {{ $clinic->endereco }}
        </div>

        <a href="{{ route('admin.clinics.index') }}" class="btn btn-primary">Back to Clinics</a>
    </div>
@endsection
