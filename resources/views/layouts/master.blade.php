<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('meta')

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ mix('assets/app.css') }}">

    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">

    @stack('styles')

    <title>
        @hasSection('title')
        @yield('title') &ndash;
        @endif
        {{ config('app.name') }}
    </title>
</head>
<body class="h-screen font-sans bg-gray-light text-black border-t-8 border-purple">
@yield('body')

<script src="{{ mix('assets/app.js') }}"></script>
@stack('scripts')

</body>
</html>
