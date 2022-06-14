<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.1/dist/bootstrap-table.min.css">
</head>
<body class="antialiased">
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(Request::is('/')) bg-secondary @endif">
                    <a class="nav-link @if(Request::is('/')) text-white @endif" href="/">Базова загрузка</a>
                </li>
                <li class="nav-item @if(Request::is('cyclomatic')) bg-secondary @endif">
                    <a class="nav-link @if(Request::is('cyclomatic')) text-white @endif" href="/cyclomatic">Циклическая загрузка</a>
                </li>
                <li class="nav-item @if(Request::is('show')) bg-secondary @endif">
                    <a class="nav-link @if(Request::is('show')) text-white @endif" href="/show">Первый пользователь из всех</a>
                </li>
                <li class="nav-item @if(Request::is('first')) bg-secondary @endif">
                    <a class="nav-link @if(Request::is('first')) text-white @endif" href="/first">Первый пользователь</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</div>
</body>
</html>
