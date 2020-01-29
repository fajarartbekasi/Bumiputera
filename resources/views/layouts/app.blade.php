<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>(function(e,t,n){var
    r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);
    </script>
</head>
<body class="bg-white">
    <div id="app">
        @include('layouts._menu')
        <main class="main">
            @include('flash::message')
            @include('layouts._errors')
            @yield('content')

        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom-file-input.js') }}"></script>
    <script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <!-- jQuery -->
    {{-- <script src="//code.jquery.com/jquery.js"></script> --}}
    <!-- DataTables -->
    {{-- <script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}
    <!-- Bootstrap JavaScript -->

    @stack('scripts')
    <script>
        $(function () {
                'use strict'
                $('[data-toggle="offcanvas"]').on('click', function () {
                    $('.offcanvas-collapse').toggleClass('open')
                })
            }),
        $('#tablekoe').on('hidden.bs.collapse', function () {
        // do something…
        });
        $(document).on('click', '.browse', function(){
            var file = $(this).parent().parent().parent().find('.file');
            file.trigger('click');
        });
        $(document).on('change', '.file', function(){
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
    </script>
</body>
</html>
