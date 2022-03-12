<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="routeName" content="{{ Route::currentRouteName() }}">
        <title>@yield('title') - SifActiv</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet"></head>
        @yield('css')
        <link href="{{ asset('css/app.css?v='.time()) }}" rel="stylesheet">
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

            <!--Header -->
            @include('layout.components.header')
            <!--Header End -->

            <div class="app-main">

                    <!--Sdebar -->
                    @include('layout.components.sidebar')
                    <!--Sdebar End-->

                    <!--Contenido -->
                    <div class="app-main__outer">
                        <div class="app-main__inner">

                            <!-- Renderizado de Paginas -->
                            @section('content')
                            @show

                        </div>
                    </div>
                    <!--Contenido End-->
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('/assets/scripts/main.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{ asset('/js/app.js?v='.time()) }}" defer></script>
        @yield('script')
    </body>
</html>