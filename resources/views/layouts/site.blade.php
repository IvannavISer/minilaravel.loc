<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>@if(isset($title))
            {{$title}}
        @else JOOOM
        @endif
    </title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jumbotron.css') }}" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="btn btn-primary btn-lg" href="/">{{$header}}</a>
        </div>
        <ul id="navbar" class="menu">
            <li><a href="https://laravel.com/docs">Documentation</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="https://laravel-news.com">News</a></li>
            <li><a href="https://forge.laravel.com">Forge</a></li>
            <li><a href="https://github.com/laravel/laravel">GitHub</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul><!--/.navbar-collapse -->
    </div>
</nav>
<div class="jumbotron">
    <div class="container">
        <p>{{$message}}</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg" href="/create" role="button">ADD new record</a></p>
        <p><a class="btn btn-primary btn-lg" href="/admin/add/post" role="button">ADD Admin Record</a></p>
    </div>
</div>
    @yield('content')
    @yield('contact')
</body>
</html>
