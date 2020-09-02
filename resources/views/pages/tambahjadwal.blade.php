    <!-- ini buat manggil master page nya -->
    @foreach($lihatjadwal as $row)
    @section('judulmain','tambahjadwalmain')
    <!-- ini untuk judul page nya , bisa di modifikasi -->
    <!-- ini untuk isi content atlet nya , sampai endsection ya -->
    <div class="container">
        <h2 align="center" style="margin: 30px;"> TAMBAH JADWAL</h2>
        <form action="/lihat-jadwal/create" method="POST">

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
                                <form action="{{url('/lihat-jadwal/create')}}" method="post" enctype="multipart/form-data">
                                    <form>
                                        <div class="form-group">
                                            <label for="atlit">list atlit</label>
                                            <input type="text" name="atlit" id="atlit" class="form-control">
                                        </div>
                                        <div Class="form-group">
                                            <label for="Tiket_Pesawat">Tiket Pesawat</label>
                                            <input type="file" name="Tiket_Pesawat" value="{{$row->Tiket_Pesawat}}" id="Tiket_Pesawat" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_kamar">NO.kamar </label>
                                            <input type="text" name="no_kamar" id="no_kamar" class="form-control"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_booking">NO.Booking </label>
                                            <input type="text" name="no_booking" id="no_booking" class="form-control"></input>
                                        </div>
                                        <input type=" submit" class="btn btn-success" value="update">
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