@extends('layouts.app')
<!-- ini buat manggil master page nya -->
@section('css')
@show
@section('content')

<body>
    @section('judulmain','atletmain')
    <!-- ini untuk judul page nya , bisa di modifikasi -->
    @section('isimain')
    <!-- ini untuk isi content atlet nya , sampai endsection ya -->
    <div class="container">
        <h2 align="center" style="margin: 30px;"> DATA MASTER ATLET </h2>
        <form class="form-data" id="form-data" action="/kedua/add" method="post">
            <form class="form-data" id="form-data" action="/kedua/update" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" name="Nama" id="Nama" class="form-control" required="true">
                            <p class="text-danger" id="err_Nama"></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Nomer Telepon</label>
                            <input type="text" name="Nomer_Telepon" id="Nomer_Telepon" class="form-control" required="true" type="number">
                            <p class="text-danger" id="err_Nomer_Telepon"></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Jenis kelamin</label>
                            <select name="Jenis_kelamin" id="Jenis_kelamin" class="form-control" required="true">
                                <option value=""></option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <p class="text-danger" id="err_Jenis_kelamin"></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>foto ktp</label>
                            <input type="file" name="foto_ktp" id="foto_ktp" class="form-control" required="true">
                            <p class="text-danger" id="err_foto_ktp"></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>nomer ktp</label><br>
                            <input type="text" name="nomer_ktp" id="nomer_ktp" class="form-control" required="true">
                            <p class="text-danger" id="err_nomer_ktp"></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="Alamat" id="alamat" class="form-control" required="true"></textarea>
                            <p class="text-danger" id="err_alamat"></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Cabang Asal</label><br>
                            <input type="text" name="Cabang_Asal" id="Cabang_asal" class="form-control" required="true">
                            <p class="text-danger" id="err_Cabang_asal"></p>
                        </div>
                    </div>