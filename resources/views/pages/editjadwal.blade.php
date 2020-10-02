    <!-- ini buat manggil master page nya -->
    @section('css')
    @show
    @section('content')
    @foreach($lihatjadwal as $row)
    @section('judulmain','editjadwalmain')
    <!-- ini untuk judul page nya , bisa di modifikasi -->
    @section('isimain')
    <!-- ini untuk isi content atlet nya , sampai endsection ya -->
    <style>
        .Tiket_Pesawat {
            max-width: 200px;
            height: auto;
            border-radius: 10px;
        }
    </style>
    <div class="container">
        <form action="/lihat-jadwal/edit/{{$row->id_jadwal}}=update" method="POST" enctype="multipart/form-data">

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
                                <form action="{{url('/lihat-jadwal/edit/{id}=update')}}" method="post" enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    <form>
                                        <div class="form-group">
                                            <label for="PIC">PIC</label>
                                            <input type="text" name="PIC" value="{{$row->PIC}}" id="PIC" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Nama">Nama</label>
                                            <select name="Nama" class="form-control">
                                                <option value="">- Pilih Atlit -</option>
                                                @foreach ($atlet as $cbr)
                                                <option value="{{$cbr->Nama}}">{{$cbr->Nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Tiket_Pesawat">Tiket_Pesawat</label><br>
                                            <img id="foto_show" class="Tiket_Pesawat" src="{{ asset('/public/foto/'.$row->Tiket_Pesawat) }}" />
                                            <input name="Tiket_Pesawat" type="file" id="Tiket_Pesawat" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Tanggal_keberangkatan">Tanggal_keberangkatan</label>
                                            <input type="date" name="Tanggal_keberangkatan" class="form-control" id="Tanggal_keberangkatan" class="form-control" value="{{$row->Tanggal_keberangkatan}}"></input>
                                        </div>
                                    </form>
                                    <div class="form-group">
                                        <label for="Tanggal_kepulangan">Tanggal_kepulangan </label>
                                        <input type="date" name="Tanggal_kepulangan" textarea class="form-control" value="{{$row->Tanggal_kepulangan}}"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="Penginapan">Penginapan </label>
                                        <input type="text" name="Penginapan" class="form-control" value="{{$row->Penginapan}}"><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_kamar">no_kamar </label>
                                        <input type="text" name="no_kamar" class="form-control" value="{{$row->no_kamar}}"><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_booking">no_booking </label>
                                        <input type="text" name="no_booking" class="form-control" value="{{$row->no_booking}}"><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="Tempat_Pertandingan">Tempat_Pertandingan </label>
                                        <input type="text" name="Tempat_Pertandingan" class="form-control" value="{{$row->Tempat_Pertandingan}}"><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="Inventaris_mobil">Inventaris_mobil </label>
                                        <input type="text" name="Inventaris_mobil" class="form-control" value="{{$row->Inventaris_mobil}}"><br>
                                    </div>
                                    <input type="submit" class="btn btn-success" value="update">
                                    <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                                    </input>
                                    <script>
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function(e) {
                                                    $('#foto_show').attr('src', e.target.result);
                                                }

                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }

                                        $("#Tiket_Pesawat").change(function() {
                                            readURL(this);
                                        });
                                    </script>
                                    @endforeach