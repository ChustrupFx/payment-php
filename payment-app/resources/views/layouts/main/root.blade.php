<!doctype html>
<html lang="pt_br">
<head>
    @include('layouts.main.head')
</head>
<body>

    @include('layouts.main.header')

    @yield('content')


    @include('layouts.main.scripts')
    @yield('scripts')
</body>
</html>