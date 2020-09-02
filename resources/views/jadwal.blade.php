@section('isimain')
<div class="container">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <h2 align="center" style="margin: 30px;">TAMBAH JADWALL</h2>
        <Datatable>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <!- Bootstrap ->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
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
                                <label>Inventaris mobil</label>
                                <input name="Inventaris_mobil" type="text" id="Inventaris_mobil" class="form-control" placeholder="Contoh Plat Nmer BXXXXjb .." required>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" value="Add">
                                <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>