<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bikeazon</title>
        <link href="https://fonts.googleapis.com/css2?family=Abel&family=Poppins:wght@400;500&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>

        @include ('partials/header')

        
            @yield('content')
        

        @include ('partials/footer')

        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>