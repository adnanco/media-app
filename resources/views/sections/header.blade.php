<header class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler border-0 d-md-none" type="button" data-bs-toggle="offcanvas"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <ul class="navbar-nav px-3" style="margin: 0 0 0 auto;">
    @auth
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn nav-link">Çıkış Yap</button>
            </form>
        </li>
    @else
        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Giriş Yap</a></li>

        @if (Route::has('register'))
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Kayıt Ol</a></li>
        @endif
    @endauth
    </ul>
</header>
