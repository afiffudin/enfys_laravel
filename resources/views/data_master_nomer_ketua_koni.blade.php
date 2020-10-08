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
                <input type="text" name="Nama" class="form-control input-lg dynamic" data-dependent="Nama" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class=" form-control input-lg dynamic" data-dependent="email" required>
            </div>
            <div class="form-group">
                <label>Nomer Telepon</label>
                <input type="number" name=" Nomer_Telepon" oninput="maxNomer(this)" maxlength="12" min="12" class=" form-control input-lg dynamic" data-dependent="Nomer_Telepon" placeholder="MAX Number 12 " required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class=" form-control input-lg dynamic" data-dependent="password" required>
            </div>
            <div class="modal-footer">
                <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                <input type="submit" class="btn btn-success" value="Add">
            </div>
            <script>
                function maxNomer(object) {
                    if (object.value.length > object.maxLength)
                        object.value = object.value.slice(0, object.maxLength)
                }

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