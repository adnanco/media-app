<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title ?? config('app.name') }}</title>

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
</body>
</html>
