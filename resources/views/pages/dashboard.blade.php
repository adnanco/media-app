@extends('layouts.master')
@section('title', 'Kişi listeleme')
@section('description', 'Kişi listeleme sayfası burada listeleniyorlar')

@section('content')
    <div class="card my-3 p-3 shadow-sm border-0">
        <h5 class="card-title border-bottom pb-2 mb-0">Kontrol Paneli</h5>
        <div class="card-body">
            {{ Auth::user()->name }} ({{Auth::user()->email}}) panele hoş geldiniz.
        </div>
    </div>

    <div class="card my-3 p-3 shadow-sm border-0">
        <h5 class="card-title border-bottom pb-2 mb-0">Access Token</h5>
        <div class="card-body">
            <p>Rest Apilerde kullanmak üzere aşağıda yer alan token bilgisini kullanabilirsiniz.</p>

            <div id="copyTarget" class="alert alert-secondary" style="max-height:150px;overflow:auto;">{{ $accessToken }}</div>
            <button id="copyButton" class="btn btn-secondary ml-auto">Click to copy</button>
        </div>
    </div>

@endsection

