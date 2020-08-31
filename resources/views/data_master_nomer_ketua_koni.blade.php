@extends('layouts.app')
@section('css')
@show
@section('content')

<body>
    @section('judulmain','ketuakonimain')
    <!-- ini untuk judul page nya , bisa di modifikasi -->
    @section('isimain')
    <!-- ini untuk isi content atlet nya , sampai endsection ya -->
    <h2 align="center" style="margin: 30px;"> TAMBAH DATA KETUA KONI</h2>
    <div class="modal-body">
        <form action="/ketuakoni/create" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Nama Lengkap </label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Nomer Telepon</label>
                <input type="Nomer_Telepon" name="Nomer_Telepon" class="form-control" maxlength="12" required>
            </div>
            <div class="modal-footer">
                <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                <input type="submit" class="btn btn-success" value="Add">
            </div>
            <script>
                $(document).ready(function() {
                    $('myTable').click(function() {

                        // Toggle Class
                        $tr = $(this).parent().parent();
                        $tr.toggleClass('expanded');
                        // Tampilkan - sembunyikan baris
                        $i = $(this).children('i');
                        $i.removeClass('fa-chevron-down', 'fa-chevron-up');
                        var arrow = $tr.hasClass('expanded') ? 'fa-chevron-up' : 'fa-chevron-down';
                        $i.addClass(arrow);

                        return false;
                    });
                })
            </script>
        </form>

        @endsection

        <!-- NOTE: tinggal atur lagi aja css nya ya , biar engga ketabrak hehehe -->