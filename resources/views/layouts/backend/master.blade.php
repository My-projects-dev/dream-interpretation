<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.backend.meta')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('layouts.backend.header')
    @include('layouts.backend.sidebar')
    @yield('content')
    @include('layouts.backend.footer')
    @stack('scripts')

</div>
<!-- ./wrapper -->
</body>
</html>
