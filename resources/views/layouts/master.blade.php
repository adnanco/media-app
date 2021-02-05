<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')"/>

    @foreach(config('person.apple-touch-icon') as $sizes => $href)
    <link rel="apple-touch-icon" href="{{$href}}" sizes="{{$sizes}}">
    @endforeach
    @foreach(config('person.icon') as $sizes => $href)
    <link rel="icon" href="{{$href}}" type="image/png" sizes="{{$sizes}}">
    @endforeach
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/ico" sizes="16x16">

    <meta property="og:site_name" content="{{config('app.name')}}"/>
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('description')"/>
    <meta property="og:locale" content="{{ app()->getLocale()}}"/>

    <link rel="stylesheet" href="{{asset('css')}}/app.css">
</head>
<body>
@include('sections.header')
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar offcanvas-collapse">
            @include('sections.sidebar')
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
        </main>
    </div>
</div>
@include('sections.footer')
<script src="{{asset('js')}}/app.js"></script>

@yield('scripts')
</body>
</html>
