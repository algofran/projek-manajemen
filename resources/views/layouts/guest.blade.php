<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head> 
        <meta charset="utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"/> 
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="assets/img/favicon.png" /> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet" /> 
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" /> 
        <link rel="stylesheet" href="assets/plugins/feather/feather.css" /> 
        <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css" /> 
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" /> 
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" /> 
        <link rel="stylesheet" href="assets/css/style.css" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

    </head> 

    <body> 
        <div class="main-wrapper login-body"> 
            {{ $slot }}
        </div> 
        <script src="assets/js/jquery-3.6.0.min.js"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
        <script src="assets/js/feather.min.js"></script> 
        <script src="assets/js/script.js"></script> 
        @livewireScripts
    </body> 
</html>