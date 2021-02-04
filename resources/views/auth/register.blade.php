@extends('layouts.guest')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card my-3 p-3 shadow-sm border-0">
                    <h3 class="card-title border-bottom pb-2 mb-0 text-center">Hoş geldiniz</h3>
                    <div class="card-body">
                        <p class="card-text">
                            Kayıyt olmak için bilgilerinizi giriniz.
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
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="col mb-3">
                                <label for="inputName" class="form-label">Ad Soyad</label>
                                <input type="text" class="form-control" id="inputName" name="name"
                                       value="{{old('name')}}" required autofocus>
                            </div>

                            <div class="col mb-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                       value="{{old('email')}}" required autofocus>
                            </div>

                            <div class="col mb-3">
                                <label for="inputPassword" class="form-label">Şifre</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" required autocomplete="new-password">
                            </div>

                            <div class="col mb-3">
                                <label for="inputPasswordConfirmation" class="form-label">Şifre Tekrar</label>
                                <input type="password" class="form-control" id="inputPasswordConfirmation" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-info text-light col">Kayıt Ol</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
