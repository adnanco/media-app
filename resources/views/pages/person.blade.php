@extends('layouts.master')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card my-3 p-3 shadow-sm border-0">
        <h5 class="card-title border-bottom pb-2 mb-0">Personel Ekle</h5>
        <form action="{{ isset($person->id) ? route('person.update',$person->id) : route('person.store') }}"
              method="post">
            @csrf
            @if(isset($person->id))
                @method('PUT')
            @else
                @method('POST')
            @endif
            <div class="card-body">
                <div class="row mb-3">
                    <label for="inputName" class="col-lg-4 col-form-label text-lg-end">Ad Soyad</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="inputName" name="name"
                               value="{{$person->name ?? old('name')}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputBirthDate" class="col-lg-4 col-form-label text-lg-end">Doğum Tarihi</label>
                    <div class="col-lg-4">
                        <input type="date" class="form-control" id="inputBirthDate" name="birthdate"
                               value="{{$person->birthdate ?? old('birthdate')}}" max="{{ date('Y-m-d') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputGender" class="col-lg-4 col-form-label text-lg-end">Cinsiyet</label>
                    <div class="col-lg-4">
                        <select class="form-select" id="inputGender" name="gender">
                            <option value="">Seçiniz</option>
                            @foreach (['K'=>'Kadın','E'=>'Erkek','B'=>'Belirtmek İstemiyorum'] as $g=>$gender)
                                <option
                                    value="{{$g}}" {{ (($person->gender ?? old('gender')) == $g) ? 'selected="selected"' : '' }}>{{ $gender }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-info text-light">Kaydet</button>
            </div>
        </form>
    </div>

    <div class="card my-3 p-3 shadow-sm border-0">
        <h5 class="card-title border-bottom pb-2 mb-0">Adres Ekle</h5>
        <div class="card-body">
            @if(isset($person->address))
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-6 g-4">
                    @foreach($person->address as $address)
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <span class="badge rounded-pill bg-warning">{{$address->name}}</span>
                                <p class="card-text">
                                    {{$address->address}}
                                    <br />
                                    {{$address->post_code}} {{$address->city_name}} / {{$address->country_name}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning fs-6 text-center" role="alert">
                    Adres eklemeden önce kişi bilgisini eklemelisiniz.
                </div>
            @endif
        </div>
    </div>

    @if(isset($person->id))
        @include('sections.modal.address')
    @endif
@endsection

