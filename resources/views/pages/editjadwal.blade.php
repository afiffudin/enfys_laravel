    <!-- ini buat manggil master page nya -->
    @section('css')
    @show
    @section('content')
    @foreach($lihatjadwal as $key=>$row)
    @section('judulmain','editjadwalmain')
    <!-- ini untuk judul page nya , bisa di modifikasi -->
    @section('isimain')
    <!-- ini untuk isi content atlet nya , sampai endsection ya -->
    <div class="container">
        <form action="/lihat-jadwal/edit/{id}=update" method="POST" enctype="multipart/form-data">

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            </head>

            <body>
                <Datatable>
                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
                    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                    <title>Edit data</title>
                    <!- Bootstrap ->
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
                        <!- Font Awesome ->
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" value="{{$row->id}}" name="id">
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="PIC"> PIC</label>
                                    <input type="text" name="PIC" value="{{$row->PIC}}" id="PIC" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>List Atlit</label>
                                    <select name="Nama" class="form-control">
                                        <option value="">- Pilih Atlit -</option>
                                        @foreach ($atlet as $cbr)
                                        <option value="{{$cbr->Nama}}">{{$cbr->Nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="PIC"> Tiket Pesawat</label>
                                    <input type="file" name="Tiket_Pesawat" value="{{$row->Tiket_Pesawat}}" id="Tiket_Pesawat" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Tanggal_keberangkatan"> Tanggal keberangkatan</label>
                                    <input type="date" name="Tanggal_keberangkatan" value="{{$row->Tanggal_keberangkatan}}" id="Tanggal_keberangkatan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Tanggal_kepulangan"> Tanggal kepulangan</label>
                                    <input type="date" name="Tanggal_kepulangan" value="{{$row->Tanggal_kepulangan}}" id="Tanggal_kepulangan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Penginapan"> Penginapan</label>
                                    <input type="text" name="Penginapan" value="{{$row->Penginapan}}" id="Penginapan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="no_kamar"> no_kamar</label>
                                    <input type="text" name="no_kamar" value="{{$row->no_kamar}}" id="no_kamar" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="no_booking"> no_booking</label>
                                    <input type="text" name="no_booking" value="{{$row->no_booking}}" id="no_booking" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Tempat_Pertandingan"> Tempat_Pertandingan</label>
                                    <input type="text" name="Tempat_Pertandingan" value="{{$row->Tempat_Pertandingan}}" id="Tempat_Pertandingan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Inventaris_mobil"> Inventaris_mobil</label>
                                    <input type="text" name="Inventaris_mobil" value="{{$row->Inventaris_mobil}}" id="Inventaris_mobil" class="form-control">
                                </div>
                                <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                                <input type="submit" class="btn btn-success" value="update">
                                </input>
                                </head>
            </body>
        </form>
        @endforeach