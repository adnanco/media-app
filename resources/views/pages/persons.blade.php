@extends('layouts.master')

@section('content')
    <div class="card my-3 p-3 shadow-sm border-0">
        <h5 class="card-title border-bottom pb-2 mb-0">Personel Listele</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col" class="d-none d-md-table-cell">Doğum Tarihi</th>
                        <th scope="col" class="d-none d-md-table-cell">Cinsiyet</th>
                        <th scope="col" class="d-none d-lg-table-cell">Adres</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @if (count($persons)> 0)
                        @foreach($persons as $person)
                            <tr>
                                <th scope="row" class="text-center">{{$person->id}}</th>
                                <td>{{$person->name}}</td>
                                <td class="text-center d-none d-md-table-cell">{{$person->birthdate}}</td>
                                <td class="text-center d-none d-md-table-cell">{{$person->genderValue}}</td>
                                <td class="d-none d-lg-table-cell">
                                    @foreach($person->address as $address)
                                        <button type="button"
                                                class="badge btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#addressModal"
                                                data-target="{{route('person.address.show',[$person->id,$address->id])}}">{{$address->name}}</button>
                                    @endforeach
                                    @if(count($person->address)<8)
                                        <button type="button" class="badge btn btn-info"
                                                data-bs-toggle="modal" data-bs-target="#addressModal"
                                                data-target="{{route('person.address.index',$person->id)}}">Adres Ekle
                                        </button>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{route('person.show',$person->id)}}" class="btn btn-link"><span
                                            data-feather="edit-3"></span></a>
                                    <a href="{{route('person.show',$person->id)}}" class="btn btn-link"><span
                                            data-feather="trash-2"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                Personel kaydı bulunmuyor, yeni kayıt eklemek için <a href="{{route('person.create')}}">tıklayın</a>
                                .
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>

    @include('sections.modal.address')
@endsection

