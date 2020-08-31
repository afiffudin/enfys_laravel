<html>

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>

    <link rel="stylesheet" href="{{ asset('/css/loginstyle.css') }}">

</head>

<body>

    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Login Panel</h1>
            </div>

            <div class="login-form">
                <form action="/herxpanel/login" method="POST">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <input type="text" name="username" class="login-field" value="" placeholder="username" id="login-name">
                        @if($errors->has('username'))
                        <label style="color:red" class="login-field-icon fui-user" for="login-name">username Jangan kosong</label>
                        @endif
                    </div>

                    <div class="control-group">
                        <input type="password" name="password" class="login-field" value="" placeholder="password" id="login-pass">
                        @if($errors->has('username'))
                        <label style="color:red" class="login-field-icon fui-user" for="login-name">password Jangan kosong</label>
                        @endif </div>

                    <button type="submit" class="btn btn-primary btn-large btn-block">login</button>
                    @if(Session::has('failed'))
                    <p style="color:red">Username Atau Password Anda Salah</p>
                    @endif
            </div>
            </form>
        </div>
    </div>
</body>


</body>

</html>