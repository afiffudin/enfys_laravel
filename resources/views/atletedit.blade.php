    <!-- ini buat manggil master page nya -->
    @section('css')
    @show
    @section('content')
    @foreach($atlet as $row)
    @section('judulmain','atletmain')
    <!-- ini untuk judul page nya , bisa di modifikasi -->
    @section('isimain')
    <!-- ini untuk isi content atlet nya , sampai endsection ya -->
    <style>
        .foto_ktp {
            max-width: 200px;
            height: auto;
            border-radius: 10px;
        }
    </style>
    <div class="container">
        <form action="/Data-Atlet/edit/{{$row->id}}=update" method="POST" enctype="multipart/form-data">

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
                                <form action="{{url('/Data-Atlet/edit/{id}=update')}}" method="post" enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    <form>
                                        <div class="form-group">
                                            <label for="Nama">Nama</label>
                                            <input type="text" name="Nama" value="{{$row->Nama}}" id="Nama" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Nomer_Telepon">Nomer_Telepon</label>
                                            <input type="Nomer_Telepon" name="Nomer_Telepon" min="1" maxlength="12" value="{{$row->Nomer_Telepon}}" id="Nomer_Telepon" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Jenis_kelamin">Jenis_kelamin</label>
                                            <select name="Jenis_kelamin" class="form-control" value="{{$row->Jenis_kelamin}}">
                                                <option value="">- Pilih Jenis_kelamin</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto_ktp">Foto KTP</label><br>
                                            <img id="foto_show" class="foto_ktp" src="{{ asset('/public/picture/'.$row->foto_ktp) }}" />
                                            <input name="foto_ktp" type="file" id="foto_ktp" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomer_ktp">nomer_ktp</label>
                                            <input type="nomer_ktp" name="nomer_ktp" min="1" maxlength="1" class="form-control" id="nomer_ktp" rows="3" class="form-control" value="{{$row->nomer_ktp}}"></input>
                                        </div>
                                    </form>
                                    <div class="form-group">
                                        <label for="Alamat">Alamat </label>
                                        <input type="text" name="Alamat" textarea class="form-control" value="{{$row->Alamat}}"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Cabor</label>
                                        <select name="nama_cabor" class="form-control">
                                            <option value="">- Pilih Cabor -</option>
                                            @foreach ($cabor as $cbr)
                                            <option value="{{$cbr->nama_cabor}}">{{$cbr->nama_cabor}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">email </label>
                                        <input type="email" name="email" class="form-control" value="{{$row->email}}"><br>
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

                                        $("#foto_ktp").change(function() {
                                            readURL(this);
                                        });
                                    </script>
                                    @endforeach