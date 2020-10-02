@section('isimain')


<div class="container">
    <form action="/jadwal-pertandingan/create" method="POST" enctype="multipart/form-data">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>

        <body>
            <h2 align="center" style="margin: 30px;">TAMBAH JADWALL</h2>
            <!- Bootstrap ->
                <!- Font Awesome ->
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <form action="{{url('/jadwal-pertandingan/create')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>PIC</label>
                                <input type="text" class="form-control" name="PIC" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal keberangkatan</label>
                                <input type="date" class="form-control" name="Tanggal_keberangkatan" required />
                            </div>
                            <div class="form-group">
                                <label>Tanggal kepulangan</label>
                                <input type="date" class="form-control" name="Tanggal_kepulangan" required />
                            </div>
                            <div class="form-group">
                                <label>Penginapan</label>
                                <input name="Penginapan" class="form-control" type="text" id="Penginapan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tempat Pertandingan</label>
                                <textarea name="Tempat_Pertandingan" class="form-control" id="Tempat_Pertandingan" class="form-control" required="true"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jadwal</label>
                                <input type="date" name="Jadwal" id="Jadwal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Inventaris mobil</label>
                                <input name="Inventaris_mobil" type="text" id="Inventaris_mobil" class="form-control" placeholder="Contoh Plat Nmer BXXXXjb .." required>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" value="Add">
                                <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>