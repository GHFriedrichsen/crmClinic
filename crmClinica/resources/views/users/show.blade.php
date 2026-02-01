@extends('master')

@section('content')

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Show</h2>
            <a href="{{ route('users.index') }}" class="btn btn-outline-primary"></a>
        </div>

        <h4>
            {{ $user }}
        </h4>
    </div>

@endsection