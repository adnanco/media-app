<header class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler border-0 d-md-none" type="button" data-bs-toggle="offcanvas"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
    @endauth
</header>
