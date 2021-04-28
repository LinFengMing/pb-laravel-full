<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.meta')
    <title>Laravel</title>
    @include('layouts.css')
</head>
<body>
    @include('layouts.nav')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.js')
    @section('inline_js')
    @show
</body>
</html>
