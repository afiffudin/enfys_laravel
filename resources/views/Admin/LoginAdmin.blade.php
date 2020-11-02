@extends('layouts.app')
@section('isimain')
<style>
    .a-table {
        margin-top: 10px;
    }

    .a-table1 {
        overflow: auto;
    }
</style>
<section class="content">
    <div class="center">
        <div class="col-sm-8">
            <div class="content">
                <h2 align="center" style="margin: 30px;"> TAMBAH LOGIN ADMIN</h2>
                <form action="{{url('/login-admin/create')}}" method="post" enctype="multipart/form-data">
                    <div class="form-data" id="form-data" action="{{url('/login-admin/create')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input name="name" type="hidden" value="Admin"></input>
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
                                    <input name="role_id" type="hidden" value="2"></input>
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
                            </div>
                        </div>
                        <!-- ini js buat checkbox -->
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