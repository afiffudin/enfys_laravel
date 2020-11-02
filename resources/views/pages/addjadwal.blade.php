@extends('layouts.app')
@section('isimain')
<style>
    .a-table {
        margin-top: 10px;
    }

    .Tiket_Pesawat {
        border-radius: 100px;
        width: 80px;
        height: 50px;
    }

    .a-table1 {
        overflow: auto;
    }

    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>
<section class="content">
    <h2 align="center" style="margin: 30px;"> TAMBAH JADWAL PERTANDINGAN</h2>
    <form action="{{url('/lihat-jadwal/create')}}" method="post" enctype="multipart/form-data">
        <form class="form-data" id="form-data" action="{{url('/lihat-jadwal/create')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>PIC</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control input-lg dynamic" data-dependent="PIC" name="PIC" required>
                        <p class="text-danger" id="eror_PIC"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Nama">Pilih Atlit</label>
                        <select name="Nama" class="form-control input-lg dynamic" data-dependent="Nama">
                            <option value="">- Pilih Atlit -</option>
                            @foreach ($atlet as $cbr)
                            <option value="{{$cbr->Nama}}">{{$cbr->Nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="cabor">Pilih Cabor</label>
                        <select name="cabor" class="form-control input-lg dynamic" data-dependent="cabor">
                            <option value="">- Pilih cabor -</option>
                            @foreach ($cabor as $cbr)
                            <option value="{{$cbr->nama_cabor}}">{{$cbr->nama_cabor}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Tiket_Pesawat">Tiket Pesawat<br /></label>
                        <input type="file" name="Tiket_Pesawat" id="Tiket_Pesawat" class="form-control input-lg dynamic" data-dependent="PIC">
                        <img id="foto_show" class="Tiket_Pesawat" />
                        <p class="text-danger" id="err_Tiket_Pesawat"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Tanggal_keberangkatan"> Tanggal keberangkatan</label>
                        <input type="date" name="Tanggal_keberangkatan" id="Tanggal_keberangkatan" class="form-control input-lg dynamic" data-dependent="PIC">
                        <p class="text-danger" id="err_Tanggal_keberangkatan"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div Class="form-group">
                        <label for="Tanggal_kepulangan"> Tanggal Kepulangan</label>
                        <input type="date" name="Tanggal_kepulangan" id="Tanggal_kepulangan" class="form-control input-lg dynamic" data-dependent="PIC">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Penginapan">Penginapan </label>
                        <input type="text" name="Penginapan" id="Penginapan" class="form-control input-lg dynamic" data-dependent="PIC"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="no_kamar">NO.kamar </label>
                        <input type="text" name="no_kamar" id="no_kamar" class="form-control input-lg dynamic" data-dependent="PIC"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="no_booking">NO.Booking </label>
                        <input type="text" name="no_booking" id="no_booking" class="form-control input-lg dynamic" data-dependent="PIC"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Tempat_Pertandingan">Tempat Pertandingan</label>
                        <input type="text" name="Tempat_Pertandingan" id="Tempat_Pertandingan" class="form-control input-lg dynamic" data-dependent="PIC"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Inventaris_mobil">Inventaris mobil</label>
                        <input type="text" name="Inventaris_mobil" id="Inventaris_mobil" class="form-control input-lg dynamic" data-dependent="PIC"></input>
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

                        $("#Tiket_Pesawat").change(function() {
                            readURL(this);
                        });
                    </script>
        </form>
        <hr>
</section>
@endsection