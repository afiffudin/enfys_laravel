@extends('layouts.app')
@section('isimain')
<style>
    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>
<div class="Container">
    <section class="content">
        <h2 align="center" style="margin: 30px;"> Data Company</h2>
        <form action="{{url('/Data-Company/create')}}" method="post" enctype="multipart/form-data">
            <form class="form-data" id="form-data" action="{{url('/Data-Company/create')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label>CODE</label>
                            <input type="text" id="hidden" class="form-control input-lg dynamic" data-dependent="Name" name="Name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control input-lg dynamic" data-dependent="Name" name="Name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="Address" class="form-control input-lg dynamic" data-dependent="Address" required />
                            <p class="text-danger" id="err_Address"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NPWP</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-card-details text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" id="npwp" name="npwp" class="form-control  border-left-0" placeholder="NPWP">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label>Bank Account Non PPN </label>
                            <input name="Bank_Account_Non_PPN" type="text" class="form-control input-lg dynamic" data-dependent="Bank_Account_Non_PPN" required>
                            <p class="text-danger" id="err_Bank_Account_Non_PPN"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label>Bank Account Non PPN 2 </label>
                            <input name="Bank_Account_Non_PPN2" type="text" class="form-control input-lg dynamic" data-dependent="nomer_ktp" required>
                            <p class="text-danger" id="err_Bank_Account_Non_PPN"></p>
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
                            $("#npwp").inputmask('99.999.999.9-999.999');
                            $('#registerForm').submit(function(e) {
                                e.preventDefault();
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'post',
                                    url: $(this).attr("action"),
                                    data: $(this).find('input, select').serialize(),
                                    dataType: 'json',
                                    beforeSend: function() {
                                        $('#daftarBtn').html('<span class="ml-auto"><i class="mdi mdi-36px mdi-spin mdi-loading"></i></span>');
                                        $('#daftarBtn').prop('disabled', true);
                                    },
                                    success: function(data) {
                                        if (data.status == "ok") {
                                            toastr["success"](data.messages);
                                            $('#registerForm')[0].reset();
                                        }
                                    },
                                    error: function(data) {
                                        var data = data.responseJSON;

                                        if (data.status == "fail") {
                                            toastr["error"](data.messages);
                                        }
                                    },
                                    complete: function() {
                                        $('#daftarBtn').html('DAFTAR');
                                        $('#daftarBtn').prop('disabled', false);
                                    }
                                });
                            });
                        </script>

                        @endsection