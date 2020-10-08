@extends('layouts.app')
<!-- ini buat manggil master page nya -->
@section('css')
@show
@section('content')

<Datatable>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <head>
        <div>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <div class="table-container">
    </head>
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
        @section('judulmain','admincabormain')
        <!-- ini untuk judul page nya , bisa di modifikasi -->
        @section('isimain')
        <!-- ini untuk isi content atlet nya , sampai endsection ya -->
        <h2 align="center" style="margin: 30px;"> LIHAT ADMIN CABOR</h2>
        <a href="{{url ('/Data-admincabor/tambah')}}" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add New Data </span></a>
        <style type="text/css">
            .pagination li {
                float: left;
                list-style-type: none;
                margin: 5px;
            }
        </style>
        <p>Cari :</p>
        <form action="/Data-cabor/cari" method="GET">
            <input type="text" name="cari" placeholder="Cari ID .." value="{{ old('cari') }}">
            <input type="submit" value="cari">
        </form>
        <div class="table-container">
            <table>
                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAMA</th>
                            <th>NAMA CABOR</th>
                            <th>EMAIL</th>
                            <th>USERNAME</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    @foreach($admincabor as $key=>$row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->Nama}}
                        <td>{{$row->nama_cabor}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->username}}</td>
                        <th>
                            <a href="{{url ('/Data-admincabor/edit/'.$row->id)}}">
                                <button type=" update" class="btn btn-primary btn-xs dt-edit">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </button>
                            </a>
                            <a href="{{url('/Data-cabor/delete/'.$row->id)}}">
                                <button type="delete" class="btn btn-danger btn-xs dt-delete">
                                    <span class="fa fa-remove" aria-hidden="true"></span>
                                </button>
                                </button>
                            </a>
                        </th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </form>
                <div class="data"></div>
        </div>
        <script>
            $(document).ready(function() {
                var table = $('#myTable').DataTable({
                    scrollY: "100px",
                    scrollX: true,
                    scrollCollapse: true,

                });
            });
        </script>
        @include('modal.addcabor')
        <div class="text-center">© <?php echo date('d/m/Y'); ?> Copyright:
        </div>
        @endsection

        <!-- NOTE: tinggal atur lagi aja css nya ya , biar engga ketabrak hehehe -->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
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