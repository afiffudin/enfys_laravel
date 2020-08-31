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
        .table-container {
            overflow: auto;
        }
    </style>

    <body>
        @section('judulmain','admincabormain')
        <!-- ini untuk judul page nya , bisa di modifikasi -->
        @section('isimain')
        <!-- ini untuk isi content atlet nya , sampai endsection ya -->
        <a href="{{url ('/Data-admincabor/tambah')}}" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add New Data </span></a>
        <a href="#deleteEmployeeModal" class="btn btn-warning" data-toggle="modal"><i class="fa fa-filter">&#xE15C;</i> <span>Filter Data By column</span></a>
        <div>
            <h2 align="center" style="margin: 30px;"> LIHAT ADMIN CABOR</h2>
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
                                <th>Nama</th>
                                <th>nama_cabor</th>
                                <th>email</th>
                                <th>username</th>
                                <th>Action</th>
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
                                    <button type=" update" class="btn btn-primary btn-md dt-edit">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="{{url('/Data-cabor/delete/'.$row->id)}}">
                                    <button type="delete" class="btn btn-danger btn-md dt-delete">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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