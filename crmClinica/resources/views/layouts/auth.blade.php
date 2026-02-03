<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'ProClinic') }}</title>
    @vite(['resources/css/login.css', 'resources/js/login.js'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap');

        body{
            font-family: 'Work Sans', sans-serif;
        }
    </style>
</head>
<body>
    
    
    @yield('content')
    

</body>
</html>