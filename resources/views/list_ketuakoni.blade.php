@extends('layouts.app')
<!-- ini buat manggil master page nya -->
@section('css')
@show
@section('content')
<style>
    .a-table {
        margin-top: 10px;
    }

    .Tiket_Pesawat {
        border-radius: 5px;
        width: 80px;
        height: 50px;
    }

    .a-table1 {
        overflow: auto;
    }

    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>

<body>
    @section('judulmain','listketuamain')
    <!-- ini untuk judul page nya , bisa di modifikasi -->
    @section('isimain')
    <!-- ini untuk isi content atlet nya , sampai endsection ya -->
    <h2 align="center" style="margin: 30px;"> LIHAT KETUA KONI</h2>
    <a href="{{url ('/Data-ketuakoni/tambah')}}" class=" btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add New Data </span></a>
    <div>
        <style type="text/css">
            .pagination li {
                float: left;
                list-style-type: none;
                margin: 5px;
            }
        </style>
        <p>Cari :</p>
        <form action="/ketuakoni/cari" method="GET">
            <input type="text" name="cari" placeholder="Cari ID .." value="{{ old('cari') }}">
            <input type="submit" value="cari">
        </form>
        <div class="table-container">
            <table>
                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama </th>
                            <th>Nomer telepon </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($ketuakoni as $key=>$row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->Nama}}</td>
                        <td>{{$row->Nomer_Telepon}}</td>
                        <th>
                            <a href="{{url ('/ketuakoni/edit/'.$row->id)}}">
                                <button type="update" class="btn btn-primary btn-md dt-edit">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </button>
                            </a>
                            <a href="{{url ('/ketuakoni/delete/'.$row->id)}}">
                                <button type="delete" class="btn btn-danger btn-md dt-delete">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </a>
                        </th>
                    </tr>
                    @endforeach
                    </tbody>
                    </form>
                    <div class="data"></div>
        </div>
        <script>
            //            angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
            $(document).ready(function() {
                setTimeout(function() {
                    $(".pesan").fadeIn('slow');
                }, 500);
            });
            //            angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('a.more').click(function() {
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
        <script>
            @include('modal.addcabor') ///ini include ke modal/addcabor 
            @endsection
        </script>
</body>