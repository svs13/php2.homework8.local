<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Styles-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="p-2">

    <nav class="nav bg-dark">
        <a class="nav-link" href="/"> Главная </a>
        <a class="nav-link" href="/albums"> Альбомы </a>
        @guest
            <a class="nav-link" href="{{ route('login') }}">Вход</a>
        @else
            <a class="nav-link" href="/adminPanel"> Админ-панель </a>
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Выход
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </nav>

    <header>
        <h3 style="text-align: center">@yield('title')</h3>
    </header>

    <section style="min-height: 70vh;">
        @yield('content')
    </section>

    <footer class="modal-footer">
        Copyright (c) 2018 svs13
    </footer>

</body>
</html>
