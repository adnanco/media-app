@extends('layouts.guest')
@section('title', 'Medya App')
@section('description', 'Medya iş görüşmesi için hazırladığım ödev')

@section('content')
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h1 class="text-center my-3">Hoş geldiniz</h1>

            <div class="card my-3 p-3 shadow-sm border-0">
                <div class="card-body">
                    Mynet Medya Backend ve Fullstack developer pozisyonu için hazırladığım yönetim paneli sayfasını ziyaret edebilmek için üyelik kaydı ve giriş işlemleri ile başlayabilirsiniz.
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('login') }}" class="btn">Giriş Yap</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn">Kayıt Ol</a>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
