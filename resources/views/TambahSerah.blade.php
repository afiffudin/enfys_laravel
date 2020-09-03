@extends('layouts.app')
@section('isimain')
@section('content')

<body>
    <div class="container">
        <div class="form-group">
            <form action="{{url('/serah-terima/create')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="container">
                        <h2 align="center" style="margin: 30px;"> TAMBAH JADWAL</h2>
                        <label>stnk </label>
                        <input type="hidden" name="id" id="id"></input>
                        <input type="text" class="form-control" name="stnk" required></input>
                    </div>
                </div>
                <div class="form-group">
                    <label>Pilh Inventaris</label>
                    <select name="Inventaris_mobil" class="form-control">
                        <option value="">- Pilih Inventaris -</option>
                        @foreach ($lihatpic as $lihat)
                        <option value="{{$lihat->Inventaris_mobil}}">{{$lihat->Inventaris_mobil}}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" form-group">
                    <label>Pilh PIC</label>
                    <select name="PIC" class="form-control">
                        <option value="">- Pilih PIC -</option>
                        @foreach ($lihatpic as $lihat)
                        <option value="{{$lihat->PIC}}">{{$lihat->PIC}}</option>
                        @endforeach
                    </select>
                    <div class="modal-footer">
                        <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
            </form>
</body>

</html>