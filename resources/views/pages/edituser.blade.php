@extends('layouts.app')
@foreach($edituser as $row)
@section('isimain')

<style>
    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>
<section class="content">
    <h2 align="center" style="margin: 30px;"> EDIT USER</h2>
    <form action="/Data-List-User/edit/{{$row->id}}=update" method="POST" enctype="multipart/form-data">
        <form class="/Data-List-User/edit/{{$row->id}}=update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="Nama">name</label>
                        <input type="text" name="name" value="{{$row->name}}" id="name" class="form-control input-lg dynamic" data-dependent="name">
                        </select>
                        <p class="text-danger" id="err_Nomer_Telepon"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="email"> email</label><br>
                        <input type="text" name="email" id="email" value="{{$row->email}}" class="form-control input-lg dynamic" data-dependent="email" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="email">email verified at</label>
                        <input type="date" name="email_verified_at" id="email_verified_at" class="form-control input-lg dynamic" data-dependent="email_verified_at" value="{{$row->email_verified_at}}"></input>
                        <p class="text-danger" id="err_email_verified_at"></p>
                    </div>
                </div>
            </div>
            <!-- <div class="row"> -->
            <!-- <div class="col-sm-9"> -->
            <!-- <div class="form-group"> -->
            <!-- <label for="password">password</label> -->
            <!-- <input type="text" name="password" textarea class="form-control input-lg dynamic" data-dependent="password" value="{{$row->password}}"></input> -->
            <!-- <p class="text-danger" id="err_	password"></p> -->
            <!-- </div> -->
            <!-- </div> -->
            <!-- </div> -->

            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="role_id">role id </label>
                        <input type="text" name="role_id" class="form-control input-lg dynamic" data-dependent="role_id" value="{{$row->role_id}}"><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="created_at">created at </label>
                        <input type="date" name="created_at" class="form-control input-lg dynamic" data-dependent="created_at" value="{{$row->created_at}}"><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="updated_at">updated at </label>
                        <input type="date" name="updated_at" class="form-control input-lg dynamic" data-dependent="updated_at" value="{{$row->updated_at}}"><br>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="update">
                    <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                    </input>
                    @endsection
                    @endforeach