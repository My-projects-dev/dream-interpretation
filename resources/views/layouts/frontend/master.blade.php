<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.frontend.meta')
    @include('layouts.frontend.styles')
</head>

<body>
@include('layouts.frontend.header')
@yield('content')
@include('layouts.frontend.footer')
@include('layouts.frontend.scripts')

</body>
</html>
