@extends('layouts.app')
@section('isimain')

<style>
    .a-table {
        margin-top: 10px;
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
    <h2 align="center" style="margin: 30px;">Jadwal Hari Ini</h2>
    <!-- <a href="{{url ('/Data-Atlet/tambah')}}" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i><span> Add New Data </span></a> -->

    <div class="a-table">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>PIC</th>
                    <th>Nama Atlit</th>
                    <th>Tiket Pesawat</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Tanggal Kepulangan</th>
                    <th>Penginapan</th>
                    <th>NO Kamar</th>
                    <th>NO Booking</th>
                    <th>Tempat Pertandingan</th>
                    <th>Inventaris Mobil</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $key=>$value)
                <tr>
                    <th>{{$value->PIC}}</th>
                    <th>{{$value->Nama}}</th>
                    <th>{{$value->Tiket_Pesawat}}</th>
                    <th>{{$value->Tanggal_keberangkatan}}</th>
                    <th>{{$value->Tanggal_kepulangan}}</th>
                    <th>{{$value->Penginapan}}</th>
                    <th>{{$value->no_kamar}}</th>
                    <th>{{$value->no_booking}}</th>
                    <th>{{$value->Tempat_Pertandingan}}</th>
                    <th>{{$value->Inventaris_mobil}}</th>
                    </ul>
                </tr>
                @endforeach
                </ul>
                </td>
                </tr>
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