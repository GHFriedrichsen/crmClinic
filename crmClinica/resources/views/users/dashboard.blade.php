@extends('layouts/master')

@section('content')
@vite(['resources/css/users.css'])

<div class="dashboard-body">

    <div class="dashboard-container">

        <div class="row g-4">
            <div class="col-md-4">
                <div class="info-stats">graficos</div>
            </div>
            <div class="col-md-4">
                <div class="info-stats">graficos</div>
            </div>
            <div class="col-md-4">
                <div class="info-stats">graficos</div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="dashboard-main">
                    <h2>dashboard</h2>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection