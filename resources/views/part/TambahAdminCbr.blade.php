@extends('layouts.app')
@section('isimain')
<section class="content">
    <h2 align="center" style="margin: 30px;"> ADMIN CABOR</h2>
    <form action="{{url('/Data-admincabor/create')}}" method="post" enctype="multipart/form-data">
        <form class="form-data" id="form-data" action="{{url('Data-admincabor/create')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="Nama" id="Nama" class="form-control" required="true">
                        <p class="text-danger" id="eror_Nama"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Cabor</label>
                        <select name="nama_cabor" class="form-control">
                            <option value="">- Pilih Cabor -</option>
                            @foreach($cabor as $cbr)
                            <option value="{{$cbr->nama_cabor}}">{{$cbr->nama_cabor}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger" id="err_nama_cabor"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label> email</label>
                        <input type="text" name="email" id="email" class="form-control" required="true">
                        <p class="text-danger" id="err_email"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label> username</label>
                        <input type="text" name="username" id="username" class="form-control" required="true">
                        <p class="text-danger" id="err_username"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                        <button type="submit" name="simpan" id="simpan" class="btn btn-primary">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
        </form>
        <hr>
</section>
@endsection