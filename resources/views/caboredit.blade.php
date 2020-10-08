@extends('layouts.app')
@foreach($cabor as $row)
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
    <title>Edit data</title>
    <h2 align="center" style="margin: 30px;"> EDIT DATA CABOR</h2>
    <form action="/Data-cabor/edit/{{$row->id_cabor}}=update" method="POST" enctype="multipart/form-data">
        <form class="{{url('/Data-cabor/edit/{id_cabor}=update')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="hidden" value="{{$row->id_cabor}}" name="id">
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Nama">Nama Cabor</label>
                        <input type="text" name="nama_cabor" value="{{$row->nama_cabor}}" id="nama_cabor" class="form-control input-lg dynamic" data-dependent="nama_cabor">
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
                    @endsection
                    @endforeach