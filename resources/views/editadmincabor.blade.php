    <!-- ini buat manggil master page nya -->

    @section('content')
    @foreach($admincabor as $row)
    @section('judulmain','editadminmain')
    <!-- ini untuk judul page nya , bisa di modifikasi -->
    @section('isimain')
    <!-- ini untuk isi content atlet nya , sampai endsection ya -->

    <div class="container">
        <h2 align="center" style="margin: 30px;"> EDIT ADMIN CABOR</h2>
        <form action="/Data-admincabor/edit/{{$row->id}}=update" method="POST" enctype="multipart/form-data">


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
                    <title>Edit data Admin cabor</title>
                    <!- Bootstrap ->
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
                        <!- Font Awesome ->
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" value="{{$row->id}}" name="id">
                            </div>
                            {{ csrf_field() }}
                            <form>
                                <div class="form-group">
                                    <label for="Nama">Nama Admin</label>
                                    <input type="text" name="Nama" value="{{$row->Nama}}" id="Nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Cabor</label>
                                    <select name="nama_cabor" class="form-control">
                                        <option value="">- Pilih Cabor -</option>
                                        @foreach($cabor as $cbr)
                                        <option value="{{$cbr->nama_cabor}}">{{$cbr->nama_cabor}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger" id="err_nama_cabor"></p>
                                </div>

                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" name="email" value="{{$row->email}}" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="username">username </label>
                                    <input type="username" name="username" class="form-control" value="{{$row->username}}"><br>
                                </div>
                                <input type="submit" class="btn btn-success" value="update">
                                <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                                </input>

                                @endforeach