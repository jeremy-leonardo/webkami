<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Webkami</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />

    @include('layouts._partials.style')
    @yield('style')

</head>

<body>

    @include('layouts._partials.header')
    <main>
        @yield('content')
    </main>
    @include('layouts._partials.footer')

    @include('layouts._partials.script')
    @stack('scripts')
    @yield('script')

</body>

</html>
