            @extends('home')
            @section('list')
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
            <section class="content-header">
                <h1>Dashboard <small>Control panel</small></h1>
                <ol class="breadcrumb">
                    <li><a href="{{url ('/dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>@endsection @section('body') <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <h3 class="text-center">SELAMAT DATANG </h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- < !-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <!-- < !-- small box -->
                    <div class="small-box bg-red" id="seluruh_jadwal">
                        <div class="inner">
                            <p>Jadwal</p>
                        </div>
                        <div class="icon"><i class="ion ion-android-folder-open"></i></div>
                        <i class="small-box-footer" id="jadwal">Lihat Seluruh Jadwal <i class="fa fa-arrow-circle-right"></i></i>
                    </div>
                </div>

                <!-- < !-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- < !-- small box -->
                    <div class="small-box bg-green" id="jadwal_hari">
                        <div class="inner">
                            <p>In Progress</p>
                        </div>
                        <div class="icon"><i class="ion ion-calendar"></i></div>
                        <i class="small-box-footer">Jadwal Hari ini <i class="fa fa-arrow-circle-right"></i></i>
                    </div>
                </div>
                <!-- < !-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- < !-- small box -->
                    <div class="small-box bg-green" id="cabor_kategori">
                        <div class="inner">
                            <p>Cabor</p>
                        </div>
                        <div class="icon"><i class="ion ion-stats-bars"></i></div>
                        <i class="small-box-footer">Cabor Per Kategori <i class="fa fa-arrow-circle-right"></i></i>
                    </div>
                </div>
                <!-- < !-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- < !-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <p>Selesai</p>
                        </div>
                        <div class="icon"><i class="pull-right-container"></i><i class="ion ion-android-checkmark-circle"></i></div><a class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{url ('/lihat-jadwal')}}"><i class="fa fa-circle-o"></i>Lihat Jadwal CABOR/PIC</a></li>
                            </li>
                        </ul>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                </head>
                <div class="a-table">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Cabor</th>
                                <th>Nama Atlit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_cabor as $key=>$value)
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
                    <div class="a-table">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
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
                    <div class="a-table">
                        <table id="seluruhjadwal" class="table table-striped table-bordered" style="width:100%">
                            <thead>
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
                                @foreach($seluruhjadwal as $key=>$value)
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
                    <script>
                        $(document).ready(function() {
                            $("#example").hide();
                        });
                        $("#cabor_kategori").on("click", function() {
                            // $("#example").toggle();
                            $("#example").toggle();
                            $("#example2").hide();
                            $("#seluruhjadwal").hide();
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $("#example2").hide();
                        });
                        $("#jadwal_hari").on("click", function() {
                            $("#example2").toggle();
                            $("#example").hide();
                            $("#seluruhjadwal").hide();
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $("#seluruhjadwal").hide();
                        });
                        $("#seluruh_jadwal").on("click", function() {
                            $("#seluruhjadwal").toggle();
                            $("#example").hide();
                            $("#example2").hide();
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
                    <!-- < !-- ./col -->
                </div>
                <!-- < !-- /.row -->
                @endsection