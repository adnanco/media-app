<div class="position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                Kontrol Paneli
            </a>
        </li>
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                   data-bs-display="static" aria-expanded="false">
                    <span data-feather="users"></span>
                    Kişi
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                    <li><a class="dropdown-item" href="{{route('person.create')}}"><span data-feather="plus"></span>Ekle</a>
                    </li>
                    <li><a class="dropdown-item" href="{{route('person.index')}}"><span data-feather="list"></span>Listele</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn nav-link"><span data-feather="log-out"></span>Çıkış Yap</button>
                </form>
            </li>
        @else
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><span data-feather="log-in"></span>
                    Giriş Yap</a></li>

            @if (Route::has('register'))
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><span
                            data-feather="user-plus"></span>Kayıt Ol</a></li>
            @endif
        @endauth
    </ul>
</div>
