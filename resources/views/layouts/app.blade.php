<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer=""></script>
    <script src="{{ asset('js/hommePage.js') }}"></script> 
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  
    <!-- Ico -->
    <link rel="shortcut icon" href="{{ asset('images/giep-nc.ico') }}">
    <!-- Styles -->  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">    
    <style>
        html {
            overflow: scroll;
            overflow-x: hidden;
        }
        
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/hommePagebas.js') }}"></script> 
</head>

<body class="container-fluid">
    @yield('content')
    
</body>
</html>
