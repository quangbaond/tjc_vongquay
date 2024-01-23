<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} @isset($title) $title @endisset</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    @yield('css')
</head>
<body>
    @includeIf('includes.header')
    @includeIf('includes.banner')
    @includeIf('includes.social')
    @includeIf('includes.on-top')
    @yield('content')
    @includeIf('includes.footer')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/global.js') }}"></script>
    @yield('js')
</body>
</html>
