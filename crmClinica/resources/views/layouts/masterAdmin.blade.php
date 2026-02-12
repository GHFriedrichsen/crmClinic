<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProClinic</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/partials.css', 'resources/css/admin.css'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap');

        body{
            font-family: 'Work Sans', sans-serif;
        }
    </style>


</head>

<body class="bg-light"> 
    
    @include('layouts.partials.navbar')

    <div class="main-layout" id="app-layout">
        @include('layouts.partials.sidebarAdmin')

        <main class="content-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>

    @include('layouts.partials.footer')

</body>

</html>