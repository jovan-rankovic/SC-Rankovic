<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(str_contains(url()->current(), '/admin'))
        <title>SC Ranković | Administracija</title>
    @else
        <title>SC Ranković | EnergijApp</title>
    @endif
    <link rel="icon" href="{{ asset('images/favicon/scr.ico') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset('back/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/plugins/node-waves/waves.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/plugins/animate-css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/css/themes/theme-deep-purple.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/css/custom.css') }}" rel="stylesheet" />
</head>
