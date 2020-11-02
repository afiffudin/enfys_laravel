@extends('layouts.app')
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
    <h2 align="center" style="margin: 30px;"> TAMBAH ATLET</h2>
    <form action="{{url('/Data-Atlet/create')}}" method="post" enctype="multipart/form-data">
        <form class="form-data" id="form-data" action="{{url('/Data-Atlet/create')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control input-lg dynamic" data-dependent="nama" name="nama" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Nomer Telepon</label>
                        <input type="number" name="Nomer_Telepon" oninput="maxNomer(this)" maxlength="12" min="4" class="form-control input-lg dynamic" data-dependent="Nomer_Telepon" placeholder="MAX number 12 .." required />
                        <p class="text-danger" id="err_Nomer_Telepon"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Jenis kelamin</label>
                        <select name="jenis_kelamin" id="Jenis_kelamin" class="form-control input-lg dynamic" data-dependent="Jenis_kelamin" required="true">
                            <option value=""></option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>foto ktp</label>
                        <img id="foto_show" class="foto_ktp" />
                        <input name="foto_ktp" type="file" id="foto_ktp" class="form-control input-lg dynamic" data-dependent="foto_ktp">
                        <p class="text-danger" id="err_foto_ktp"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>nomer ktp</label>
                        <input name="nomer_ktp" type="number" id="nomer_ktp" oninput="maxKTP(this)" maxlength="17" min="17" class="form-control input-lg dynamic" data-dependent="nomer_ktp" placeholder="MAX number 17 .." required>
                        <p class="text-danger" id="err_nomer_ktp"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div Class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="Alamat" class="form-control input-lg dynamic" data-dependent="Alamat" required=" true"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Cabor</label>
                        <select name="id_cabor" class="form-control input-lg dynamic" data-dependent="id_cabor">
                            <option value="">- Pilih Cabor -</option>
                            @foreach ($cabor as $cbr)
                            <option value="{{$cbr->id_cabor}}">{{$cbr->nama_cabor}}</option>
                            @endforeach
                        </select></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <input name="name" type="hidden" value="Atlit"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <input name="role_id" type="hidden" value="4"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>email</label>
                        <textarea name="email" id="email" class="form-control input-lg dynamic" data-dependent="email" required="true"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="password" id="myInput" class="form-control input-lg dynamic" data-dependent="password" required="true"></input>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <input type="checkbox" onclick="myFunction()">
                        </div>
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
                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                    @endsection