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
    <h2 align="center" style="margin: 30px;"> Lihat Plot Kendaraan</h2>
    <!-- <a href="{{url ('/Data-Atlet/tambah')}}" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i><span> Add New Data </span></a> -->

    <div class="a-table">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PIC</th>
                    <th>Nama Cabor</th>
                    <th>Nama Atlit</th>
                    <th>Inventaris Mobil</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_plot as $key=>$value)
                <tr>
                    <th>{{$value->id_cabor}}</th>
                    <th>{{$value->nama_cabor}}</th>
                    <th>{{$value->Nama}}</th>
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