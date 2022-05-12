<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer=""></script>
    <script src="{{ asset('js/hommePage.js') }}"></script>   
    <!-- Ico -->
    <link rel="shortcut icon" href="{{ asset('images/giep-nc.ico') }}">
    <!-- Styles -->  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Table.css') }}" rel="stylesheet">   
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">    
    <style>
        html {
            overflow: scroll;
            overflow-x: hidden;
        }
        
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>    
</head>

<body class="container-fluid">
    @yield('content')
    
</body>
</html>
