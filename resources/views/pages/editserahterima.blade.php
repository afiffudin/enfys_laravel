@extends('layouts.app')
@foreach($lihatserah as $row)
@section('isimain')
<style>
    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>
<section class="content">
    <h2 align="center" style="margin: 30px;"> EDIT SERAH TERIMA KENDARAAN</h2>
    <form action="/serah-terima/edit/{{$row->id}}=update" method="POST" enctype="multipart/form-data">
        <form class="{{url('/serah-terima/edit/{id}=update')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="stnk">NO STNK</label>
                        <input type="text" name="stnk" value="{{$row->stnk}}" id="stnk" class="form-control input-lg dynamic" data-dependent="stnk">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="Tanggal_keberangkatan">Tanggal Keberangkatan Dan Nomer Inventaris Kedaraan</label>
                        <select id='Tanggal_keberangkatan' name='id' class="form-control input-lg dynamic" data-dependent="Tanggal_keberangkatan">
                            <option value='0'>-- Select Tanggal --</option>
                            <!-- Read Departments -->
                            @foreach($editserah as $inventaris_mobil)
                            <option value="{{$inventaris_mobil->id}}">{{$inventaris_mobil->Tanggal_keberangkatan}} -> {{$inventaris_mobil->Inventaris_mobil}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger" id="err_Tanggal_keberangkatan"></p>
                        </input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="diterima_oleh">Di Terima Oleh </label>
                        <input type="text" name="diterima_oleh" class="form-control input-lg dynamic" data-dependent="diterima_oleh" value="{{$row->diterima_oleh}}"><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                        <button type="submit" name="simpan" id="simpan" class="btn btn-primary">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
            @endsection
            @endforeach