<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    @include('includes.links')
</head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
        
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('storage/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
            </div>
            
            @include('template.navbar')

            @include('template.sidebar')

            <div class="content-wrapper">
                @yield('content')
            </div>


            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.2.0
                </div>
            </footer>
            
        </div>
        
        @include('includes.scripts')
        @stack('cliente-component')
    </body>
</html>