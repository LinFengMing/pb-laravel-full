<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.meta')
    <title>Laravel</title>
    @include('layouts.css')
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>
<body>
    @include('layouts.nav')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.js')

    @section('inline_js')
        @parent
    @endsection
</body>
</html>
