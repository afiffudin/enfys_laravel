@extends('layouts.app')
@section('css')
@show
@section('content')

<body>

    @section('judulmain','ketuakonimain')
    <!-- ini untuk judul page nya , bisa di modifikasi -->
    @section('isimain')
    <!-- ini untuk isi content atlet nya , sampai endsection ya -->
    <div class="modal-body">
        <form action="/ketuakoni/create" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Nomer_Telepon</label>
                <input type="Nomer_Telepon" name="Nomer_Telepon" class="form-control" maxlength="12" required>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Add">
            </div>
        </form>

        @endsection

        <!-- NOTE: tinggal atur lagi aja css nya ya , biar engga ketabrak hehehe -->