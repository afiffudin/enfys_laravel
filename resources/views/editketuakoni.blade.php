@extends('layouts.app')
@section('css')
@foreach($ketuakoni as $row)
@section('content')

<body>
    @section('judulmain','ketuakonimain')
    <!-- ini untuk judul page nya , bisa di modifikasi -->
    @section('isimain')
    <!-- ini untuk isi content atlet nya , sampai endsection ya -->
    <h2 align="center" style="margin: 30px;"> EDIT KETUA KONI</h2>
    <form action="/ketuakoni/edit/{{$row->id}}=update" method="POST">
        <div class="modal-body">
            <form action="/ketuakoni/edit/{{$row->id}}=update" method="POST">

                {{ csrf_field() }}
                <div class="form-group">
                    <label>Nama Lengkap </label>
                    <input type="text" class="form-control input-lg dynamic" data-dependent="Nama" required>
                </div>
                <div class="form-group">
                    <label>Nomer Telepon</label>
                    <input type="number" name=" Nomer_Telepon" oninput="maxNomer(this)" maxlength="12" min="12" class=" form-control input-lg dynamic" data-dependent="Nomer_Telepon" placeholder="MAX Number 12 " required>
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
            @endforeach
            <!-- NOTE: tinggal atur lagi aja css nya ya , biar engga ketabrak hehehe -->