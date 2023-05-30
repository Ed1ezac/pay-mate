<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PayMate') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-gray-50 font-body">
        <div id="app">
            @guest
                <navbar
                    logo-uri="{{ asset('logo.png') }}"
                    current-url="{{ Request::segment(1) }}"
                    v-bind:is-auth="{{ json_encode(false) }}">
                </navbar>               
            @else
                <navbar
                    logo-uri="{{ asset('logo.png') }}"
                    email="{{ Auth::user()->email }}"
                    username="{{ Auth::user()->name }}"
                    current-url="{{ Request::segment(1) }}"
                    initials ="{{ Auth::user()->initials }}"
                    v-bind:is-auth="{{ json_encode(true) }}">
                </navbar> 
            @endguest

            <main class="pt-20">
                @yield('content')
            </main>

            
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
