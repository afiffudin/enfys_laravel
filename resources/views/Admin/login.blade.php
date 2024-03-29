@extends('Admin/login')
@section('content')
<!-- main section-->
<section class="main-section">
    <!-- Add Your Content Inside-->
    <div class="content">
        <!--Remove This Before Your Start-->
        <h1>Login Disini</h1>
        <hr>
        @if(\Session::has('alert'))
        <div class="alert alert-danger">
            <div>{{Session::get('alert-success')}}</div>
        </div>
        @endif
        <form action="{{url ('/loginPost')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="alamat">Password:</label>
                <input type="password" class="form-control" id="myInput" name="password">
                <input type="checkbox" onclick="myFunction()">Show Password
            </div></input>
            <div class="form-group">
                <button type="submit" class="btn btn-md btn-primary">Login</button>
                <a href="{{url('register')}}" class="btn btn-md btn-warning">Register</a>
            </div>
        </form>
    </div>
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

</section>

@endsection