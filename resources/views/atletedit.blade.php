@extends('layouts.app')
@foreach($atlet as $row)
@section('isimain')
<style>
    .foto_ktp {
        max-width: 100px;
        height: auto;
        border-radius: 10px;
    }

    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>
<section class="content">
    <h2 align="center" style="margin: 30px;"> EDIT ATLET</h2>
    <form action="/Data-Atlet/edit/{{$row->id}}=update" method="POST" enctype="multipart/form-data">
        <form class="{{url('/Data-Atlet/edit/{id}=update')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" name="Nama" value="{{$row->Nama}}" id="Nama" class="form-control input-lg dynamic" data-dependent="Nama">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Nomer_Telepon">Nomer_Telepon</label>
                        <input type="Nomer_Telepon" name="Nomer_Telepon" min="1" maxlength="12" value="{{$row->Nomer_Telepon}}" id="Nomer_Telepon" class="form-control input-lg dynamic" data-dependent="Nomer_Telepon">
                        <p class="text-danger" id="err_Nomer_Telepon"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Jenis_kelamin">Jenis_kelamin</label>
                        <select name="Jenis_kelamin" class="form-control input-lg dynamic" data-dependent="Jenis_kelamin" value="{{$row->Jenis_kelamin}}">
                            <option value="">- Pilih Jenis_kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="foto_ktp">Foto KTP</label><br>
                        <img id="foto_show" class="foto_ktp" src="{{ asset('/public/picture/'.$row->foto_ktp) }}" />
                        <input name="foto_ktp" type="file" id="foto_ktp" class="form-control input-lg dynamic" data-dependent="foto_ktp" required>
                        <p class="text-danger" id="err_foto_ktp"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="nomer_ktp">nomer_ktp</label>
                        <input type="nomer_ktp" name="nomer_ktp" min="1" maxlength="1" id="nomer_ktp" rows="3" value="{{$row->nomer_ktp}}" class="form-control input-lg dynamic" data-dependent="nomer_ktp" placeholder="MAX number 17 .." required></input>
                        <p class="text-danger" id="err_nomer_ktp"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div Class="form-group">
                        <label for="Alamat">Alamat </label>
                        <input type="text" name="Alamat" textarea class="form-control input-lg dynamic" data-dependent="Alamat" value="{{$row->Alamat}}"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Cabor</label>
                        <select name="nama_cabor" class="form-control input-lg dynamic" data-dependent="nama_cabor">
                            <option value="">- Pilih Cabor -</option>
                            @foreach ($cabor as $cbr)
                            <option value="{{$cbr->nama_cabor}}">{{$cbr->nama_cabor}}</option>
                            @endforeach
                        </select></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email" value="{{$row->email}}" class="form-control input-lg dynamic" data-dependent="email"><br> </div>
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