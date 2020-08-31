@extends('edit')
@section('main')
<form action="/kedua/edit" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="Nama">Nama </label>
        <input class="form-control @error('Nama') is-invalid @enderror" type="text" name="Nama" id="Nama" value="{{ old('Nama') }}" placeholder="Masukkan Nama "> @error('Nama')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="Nomer_Telepon">Nomer_Telepon</label>
        <input class="form-control @error('Nomer_Telepon') is-invalid @enderror" type="number" name="Nomer_Telepon" id="Nomer_Telepon" value="{{ old('Nomer_Telepon') }}" placeholder="masukkan Nomer_Telepon"> @error('Nomer_Telepon')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="Jenis_kelamin">Jenis_kelamin</label>
        <input class="form-control @error('Jenis_kelamin') is-invalid @enderror" type="Jenis_kelamin" name="Jenis_kelamin" id="Jenis_kelamin" value="{{ old('Jenis_kelamin') }}" placeholder="masukkan Jenis_kelamin"> @error('Jenis_kelamin')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="foto_ktp">foto_ktp</label>
        <input class="form-control @error('foto_ktp') is-invalid @enderror" type="file" name="foto_ktp" id="foto_ktp" value="{{ old('foto_ktp') }}" placeholder="masukkan foto_ktp"> @error('foto_ktp')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="nomer_ktp">nomer_ktp</label>
        <input class="form-control @error('nomer_ktp') is-invalid @enderror" type="number" name="nomer_ktp" id="nomer_ktp" value="{{ old('nomer_ktp') }}" placeholder="masukkan nomer_ktp"> @error('nomer_ktp')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="Alamat">Alamat</label>
        <input class="form-control @error('Alamat') is-invalid @enderror" type="text" name="Alamat" id="Alamat" value="{{ old('Alamat') }}"> @error('Alamat')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="Cabang_Asal">Cabang_Asal</label>
        <input class="form-control @error('Cabang_Asal') is-invalid @enderror" type="text" name="Cabang_Asal" id="Cabang_Asal" value="{{ old('Cabang_Asal') }}" placeholder="masukkan Cabang_Asal"> @error('Cabang_Asal')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group float-right">
        <button class="btn btn-lg btn-danger" type="reset">Reset</button>
        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
    </div>
</form>