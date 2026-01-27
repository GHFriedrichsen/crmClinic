@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'ProClinic') }}</title>
</head>
<style>
    body{
        background-color: #F8FAFC;
    }

</style>
<body>

    <div class="container-fluid">

        <form method="POST" action="login top">
            @csrf

            <label for="email">e-mail</label>
            <input type="email" name="email" class="form-control">

        </form>

    </div>

</body>
</html>