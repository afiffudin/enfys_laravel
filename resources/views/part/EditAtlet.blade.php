@extends('layouts.layouts_f')    

<style>
.foto_ktp{
    max-width: 200px;
    height: auto;
    border-radius: 10px;
}
</style>

<section class="content">
    @foreach($atlet as $row)
        <form action="{{url ('/Data-Atlet/edit/'.$row->id)}}=update" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="form-group">
                <input type="hidden" value="{{$row->id}}" name="id">
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" name="Nama" value="{{$row->Nama}}" id="Nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="Nomer_Telepon">Nomor Telepon</label>
                <input type="Nomer_Telepon" name="Nomer_Telepon" min="1" maxlength="12" value="{{$row->Nomer_Telepon}}" id="Nomer_Telepon" class="form-control">
            </div>
            <div class="form-group">
                <label for="Jenis_kelamin">Jenis Kelamin</label>
                <select name="Jenis_kelamin" class="form-control" value="{{$row->Jenis_kelamin}}">
                    <option value="">- Pilih Jenis Kelamin -</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto_ktp">Foto KTP</label><br>
                <img id="foto_show" class="foto_ktp" src="{{ asset('picture/'.$row->foto_ktp) }}"/>
                <input type="file" name="foto_ktp" value="{{$row->foto_ktp}}" class="form-control" onchange="readURL(this);">
            </div>
            <div class="form-group">
                <label for="nomer_ktp">Nomor KTP</label>
                <input type="nomer_ktp" name="nomer_ktp" min="1" maxlength="1" class="form-control" id="nomer_ktp" rows="3" class="form-control" value="{{$row->nomer_ktp}}"></input>
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <input type="text" name="Alamat" textarea class="form-control" value="{{$row->Alamat}}"></=>
            </div>
            <div class="form-group">
                <label for="Cabor">Cabor</label>
                <input type="Cabor" name="Cabor" class="form-control" value="{{$row->Cabor}}"><br>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{$row->email}}"><br>
            </div>
            <div class="form-group pull-right">
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="update">
                    <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </form>
    @endforeach
</section>

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