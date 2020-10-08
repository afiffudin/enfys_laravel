@extends('layouts.app')
@foreach($admincabor as $row)
@section('isimain')
<style>
    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>
<section class="content">
    <h2 align="center" style="margin: 30px;"> EDIT ADMIN CABOR </h2>
    <form action="/Data-admincabor/edit/{{$row->id}}=update" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" value="{{$row->id}}" name="id">
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    <label for="Nama">Nama Admin</label>
                    <input type="text" name="Nama" value="{{$row->Nama}}" id="Nama" class="form-control input-lg dynamic" data-dependent="Nama">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    <label>Cabor</label>
                    <select name="nama_cabor" class="form-control input-lg dynamic" data-dependent="nama_cabor">
                        <option value="">- Pilih Cabor -</option>
                        @foreach($cabor as $cbr)
                        <option value="{{$cbr->nama_cabor}}">{{$cbr->nama_cabor}}</option>
                        @endforeach
                    </select>
                    <p class="text-danger" id="err_nama_cabor"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" value="{{$row->email}}" id="email" class="form-control input-lg dynamic" data-dependent="email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    <label for="username">username </label>
                    <input type="username" name="username" class="form-control input-lg dynamic" data-dependent="username" value="{{$row->username}}"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="update">
                    <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                    </input>
                </div>
                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#foto_show').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $("#foto_ktp").change(function() {
                        readURL(this);
                    });
                </script>
                <script>
                    function maxNomer(object) {
                        if (object.value.length > object.maxLength)
                            object.value = object.value.slice(0, object.maxLength)
                    }

                    function maxKTP(object) {
                        if (object.value.length > object.maxLength)
                            object.value = object.value.slice(0, object.maxLength)
                    }
                </script>
                @endsection
                @endforeach