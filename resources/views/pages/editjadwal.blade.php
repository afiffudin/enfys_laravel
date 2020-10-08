@extends('layouts.app')
@foreach($lihatjadwal as $row)
@section('isimain')
<style>
    .Tiket_Pesawat {
        max-width: 200px;
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
    <h2 align="center" style="margin: 30px;"> EDIT JADWAL</h2>
    <form action="/lihat-jadwal/edit/{{$row->id}}=update" method="POST" enctype="multipart/form-data">
        <form action="/lihat-jadwal/edit/{{$row->id}}=update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="PIC">PIC</label>
                        <input type="text" name="PIC" value="{{$row->PIC}}" id="PIC" class="form-control input-lg dynamic" data-dependent="PIC">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <select name="Nama" class="form-control input-lg dynamic" data-dependent="Nama">
                            <option value="">- Pilih Atlit -</option>
                            @foreach ($atlet as $cbr)
                            <option value="{{$cbr->Nama}}">{{$cbr->Nama}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger" id="err_Nomer_Telepon"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Tiket_Pesawat">Tiket Pesawat</label><br>
                        <img id="foto_show" class="Tiket_Pesawat" src="{{ asset('/public/foto/'.$row->Tiket_Pesawat) }}" />
                        <input name="Tiket_Pesawat" type="file" id="Tiket_Pesawat" class="form-control input-lg dynamic" data-dependent="Tiket_Pesawat" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Tanggal_keberangkatan">Tanggal Keberangkatan</label>
                        <input type="date" name="Tanggal_keberangkatan" id="Tanggal_keberangkatan" class="form-control input-lg dynamic" data-dependent="Tanggal_keberangkatan" value="{{$row->Tanggal_keberangkatan}}"></input>
                        <p class="text-danger" id="err_Tanggal_keberangkatan"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Tanggal_kepulangan">Tanggal Kepulangan </label>
                        <input type="date" name="Tanggal_kepulangan" textarea class="form-control input-lg dynamic" data-dependent="Tanggal_kepulangan" value="{{$row->Tanggal_kepulangan}}"></input>
                        <p class="text-danger" id="err_Tanggal_kepulangan"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div Class="form-group">
                        <label for="Penginapan">Penginapan </label>
                        <input type="text" name="Penginapan" class="form-control input-lg dynamic" data-dependent="Penginapan" value="{{$row->Penginapan}}"><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="no_kamar">NO.Kamar </label>
                        <input type="text" name="no_kamar" class="form-control input-lg dynamic" data-dependent="no_kamar" value="{{$row->no_kamar}}"><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="no_booking">NO.Booking </label>
                        <input type="text" name="no_booking" class="form-control input-lg dynamic" data-dependent="no_booking" value="{{$row->no_booking}}"><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Tempat_Pertandingan">Tempat Pertandingan </label>
                        <input type="text" name="Tempat_Pertandingan" class="form-control input-lg dynamic" data-dependent="Tempat_Pertandingan" value="{{$row->Tempat_Pertandingan}}"><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Inventaris_mobil">Inventaris Mobil </label>
                        <input type="text" name="Inventaris_mobil" class="form-control input-lg dynamic" data-dependent="Inventaris_mobil" value="{{$row->Inventaris_mobil}}"><br>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="update">
                    <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                    </input>
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

                        $("#Tiket_Pesawat").change(function() {
                            readURL(this);
                        });
                    </script>
                    @endsection
                    @endforeach