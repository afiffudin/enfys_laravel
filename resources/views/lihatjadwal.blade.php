@extends('layouts.app')
@section('isimain')
<?php
//        menampilkan pesan jika ada pesan
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="pesan">' . $_SESSION['pesan'] . '</div>';
}
//        mengatur session pesan menjadi kosong
$_SESSION['pesan'] = '';
?>
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
<section class="content">
    <h2 align="center" style="margin: 30px;"> LIHAT JADWAL</h2>
    <!--<a href="#" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i><span> Add New Data </span></a>
    <a href="#" class="btn btn-warning" data-toggle="modal"><i class="fa fa-filter"></i><span> Filter Data By column</span></a>
!-->
    <div class="table-container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PIC</th>
                    <th>list atlit</th>
                    <th>Tiket Pesawat</th>
                    <th>Tanggal keberangkatan</th>
                    <th>Tanggal kepulangan</th>
                    <th>Penginapan</th>
                    <th>no kamar</th>
                    <th>no booking</th>
                    <th>Tempat Pertandingan</th>
                    <th>Inventaris mobil</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lihatjadwal as $key=>$row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->PIC}}</td>
                    <td>{{$row->atlit}}</td>
                    <td><img class="Tiket_Pesawat" src="{{ asset('public/foto/'.$row->Tiket_Pesawat) }}" /></td>
                    <td>{{$row->Tanggal_keberangkatan}}</td>
                    <td>{{$row->Tanggal_kepulangan}}</td>
                    <td>{{$row->Penginapan}}</td>
                    <td>{{$row->no_kamar}}</td>
                    <td>{{$row->no_booking}}</td>
                    <td>{{$row->Tempat_Pertandingan}}</td>
                    <td>{{$row->Inventaris_mobil}}</td>
                    <td>
                        <a href="{{url ('/lihat-jadwal/edit/'.$row->id)}}">
                            <button type="edit" class="btn btn-primary btn-md dt-edit">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                        </a>
                        <a href="{{url('/lihat-jadwal/add/')}}">
                            <button type="tambah" class="btn btn-primary btn-md dt-edit">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </a>
                        <a href="{{url ('/lihat-jadwal/delete/'.$row->id)}}">
                            <button type="delete" class="btn btn-danger btn-md dt-delete">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">© <?php echo date('d/m/Y'); ?> Copyright:</div>

</section>
<script src="jquery.min.js"></script>
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
    @endsection