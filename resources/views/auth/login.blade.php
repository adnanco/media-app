@extends('layouts.guest')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card my-3 p-3 shadow-sm border-0">
                    <h3 class="card-title border-bottom pb-2 mb-0 text-center">Hoş geldiniz</h3>
                    <div class="card-body">
                        <p class="card-text">
                            Giriş yapmak için bilgilerinizi giriniz.
                            @if (Route::has('register'))
                                Kayıt olmadıysanız, kayıt olmak için lütfen <a href="{{ route('register') }}">tıklayın</a>
                            @endif
                        </p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="col mb-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                       value="{{old('email')}}" required autofocus>
                            </div>

                            <div class="col mb-3">
                                <label for="inputPassword" class="form-label">Şifre</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" required autocomplete="current-password">
                            </div>
                            <button type="submit" class="btn btn-info text-light col">Giriş Yap</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
