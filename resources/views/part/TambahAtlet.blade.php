@section('isimain')
<div class="container">
    <style>
        .foto_ktp {
            max-width: 100px;
            height: auto;
            border-radius: 10px;
        }
    </style>

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
            <!- Bootstrap ->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
                <!- Font Awesome ->
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <form action="{{url('/Data-Atlet/create')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label>Nomer_Telepon</label>
                                <input type="number" name="Nomer_Telepon" oninput="maxNomer(this)" maxlength="12" min="4" class="form-control" placeholder="MAX number 12 .." required />
                            </div>
                            <div class="form-group">
                                <label>Jenis_kelamin</label>
                                <select name="jenis_kelamin" id="Jenis_kelamin" class="form-control" required="true">
                                    <option value=""></option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>foto_ktp</label>
                                <img id="foto_show" class="foto_ktp" />
                                <input name="foto_ktp" type="file" id="foto_ktp" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>nomer_ktp</label>
                                <input name="nomer_ktp" type="number" id="nomer_ktp" oninput="maxKTP(this)" maxlength="17" min="17" class="form-control" placeholder="MAX number 17 .." required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" id="Alamat" class="form-control" required="true"></textarea>
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
                                <label>email</label>
                                <textarea name="email" id="email" class="form-control" required="true"></textarea>
                            </div>
                            <div class="modal-footer">
                                <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                                <input type="submit" class="btn btn-success" value="Add">
                            </div>
                        </form>
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
                        <script>
                            function maxNomer(object) {
                                if (object.value.length > object.maxLength)
                                    object.value = object.value.slice(0, object.maxLength)
                            }

                            function maxKTP(object) {
                                if (object.value.length > object.maxLength)
                                    object.value = object.value.slice(0, object.maxLength)
                            }
                        </script>