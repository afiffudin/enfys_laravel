@extends('layouts.app')
@section("isimain")
<style>
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }

    .container {
        padding-top: 50px;
        margin: auto;
    }
</style>
<section class="content">
    <form action="/update-profile/edit/{id}=update" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ csrf_field() }}
                            <form class="form-horizontal" method="" action="">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Email</label>
                                    <div class="col-md-6">
                                        <input type="hidden" value="{{$update->id}}" name="id">
                                        <input type="email" class="form-control" name="email" value="{{$update->email}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Password</label>
                                    <div class="col-md-6">
                                        <input id="password-field" type="password" class="form-control" name="password" value="">
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="update">
                        <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
                <!-- toogle hide and show password -->
                <script>
                    $(".toggle-password").click(function() {
                        $(this).toggleClass("fa-eye fa-eye-slash");
                        var input = $($(this).attr("toggle"));
                        if (input.attr("type") == "password") {
                            input.attr("type", "text");
                        } else {
                            input.attr("type", "password");
                        }
                    });
                </script>
                @endsection