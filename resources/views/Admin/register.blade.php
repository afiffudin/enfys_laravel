@extends('base')
@section('content')
<!-- Main Section -->
<section class="main-section">
    <!-- Add Your Content Inside -->
    <div class="content">
        <h1> Regis</h1>
        <hr>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $errors)
                <li>{{$errors}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{url('/registerPost')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="alamat">password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="alamat">Password Confirmation :</label>
                <input type="password" class="form-control" id="confirmation" name="confirmation">
            </div>
            <div class="form-group">
                <label for="alamat">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                <button type="reset" class="btn btn-md btn-danger">cancel</button>
            </div>
        </form>
    </div>
    <!-- /.content-->
</section>
<!--/.main section-->
@endsection