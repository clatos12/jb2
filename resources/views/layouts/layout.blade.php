<!doctype html>
<link rel="icon" type="image/x-icon" href="{{ asset('img/logos/COLORJB.ico') }}" />
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- en los include se ponen los layouts --}}
        @include('layouts.header')

<body>
    <div id="app">                    

        @include('layouts.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
