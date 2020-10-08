<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('layouts.app')
    @yield('style')
</head>

<body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">

        @include('layouts.header')
        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('list')

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                @yield('body')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.footer')
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    @include('layouts.js')
    @yield('js')

</body>

</html>