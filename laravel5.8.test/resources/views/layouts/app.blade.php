<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title') {{ config('app.name', 'Laravel') }} @show</title> <!-- <-здесь указывается значение по-умолчанию -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">    
    <link href="/path/to/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/path/to/css/bootstrap-social.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('_partials.header')

        <main class="py-4">

            <div class="row justify-content-end">
                <div class="col-4">
                    @include('admin._partials.flash-message')
                </div>
            </div>

            @yield('content')
        </main>
        
        @include('_partials.footer')
    </div>
</body>

</html>