<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GIEP-NC</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer=""></script>
    <!-- Ico -->
    <link rel="shortcut icon" href="{{ asset('images/giep-nc.ico') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">  
    <link href="{{ asset('css/impression.css') }}" rel="stylesheet" media="print">  
    <script src="{{ asset('js/hommePage.js') }}"></script>
    <style>
        html {
            overflow: scroll;
            overflow-x: hidden;
        }
        ::-webkit-scrollbar {
            width: 0px;  /* Remove scrollbar space */
            background: transparent;  /* Optional: just make scrollbar invisible */
        }
        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body class="container-fluid">
    @yield('content')
    
</body>
</html>
