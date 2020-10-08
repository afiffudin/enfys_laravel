@extends('layouts.app')
@section('isimain')

<style>
    .a-table {
        margin-top: 10px;
    }

    .foto_ktp {
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
    <h2 align="center" style="margin: 30px;"> LIHAT ATLET</h2>
    <a href="{{url ('/Data-Atlet/tambah')}}" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i><span> Add New Data </span></a>

    <div class="a-table">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Jenis Kelamin</th>
                    <th>Foto KTP</th>
                    <th>Nomor KTP</th>
                    <th>Alamat</th>
                    <th>Cabor</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atlet as $key=>$row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->Nama}}</td>
                    <td>{{$row->Nomer_Telepon}}</td>
                    <td>{{$row->Jenis_kelamin}}</td>
                    <td><img class="foto_ktp" src="{{ asset('public/picture/'.$row->foto_ktp) }}" /></td>
                    <td>{{$row->nomer_ktp}}</td>
                    <td>{{$row->Alamat}}</td>
                    <td>{{$row->nama_cabor}}</td>
                    <td>{{$row->email}}</td>
                    <td>
                        <a href=" {{url ('/Data-Atlet/edit/'.$row->id)}}">
                            <button type="edit" class="btn btn-primary btn-xs dt-edit">
                                <span class="fa fa-pencil" aria-hidden="true"></span>
                            </button>
                        </a>
                        <a href="{{url ('/Data-Atlet/delete/'.$row->id)}}">
                            <button type="delete" class="btn btn-danger btn-xs dt-delete">
                                <span class="fa fa-remove" aria-hidden="true"></span>
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