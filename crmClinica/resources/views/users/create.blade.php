@extends('master')

@section('content')
    <h2>Create</h2>


    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <form action="{{ route('users.store') }}" method="post">
        @csrf   
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Your name">
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Your email">
        <label for="password">Password:</label>
        <input type="text" name="password" placeholder="Your password">
        <label for="role">Role:</label>
        <input type="text" name="role" placeholder="Your role"> 
        <label for="nascimento">Birthday:</label>
        <input type="date" name="nascimento" placeholder="Your birthday">

        <button type="submit">Create</button>
    </form>

@endsection