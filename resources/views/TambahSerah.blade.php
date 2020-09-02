@section('isimain')
<div class="container">

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
                        <form action="{{url('/serah-terima/create')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>stnk </label>
                                <input type="hidden" name="id" id="id">
                                <input type="text" class="form-control" name="stnk" required>
                            </div>
                            <div class="form-group">
                                <label>Pilh Inventaris</label>
                                <select name="Inventaris_mobil" class="form-control">
                                    <option value="">- Pilih Inventaris -</option>
                                    @foreach ($lihatpic as $cbr)
                                    <option value="{{$cbr->Inventaris_mobil}}">{{$cbr->Inventaris_mobil}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" form-group">
                                <label>Pilh PIC</label>
                                <select name="Inventaris_mobil" class="form-control">
                                    <option value="">- Pilih PIC -</option>
                                    @foreach ($lihatpic as $cbr)
                                    <option value="{{$cbr->PIC}}">{{$cbr->PIC}}</option>
                                    @endforeach
                                </select>
                                <div class="modal-footer">
                                    <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                                    <input type="submit" class="btn btn-success" value="Add">
                                </div>
                        </form>
                        <!---  <script type="text/javascript">
                            $("select[name='id_country']").change(function() {
                                var id_country = $(this).val();
                                var token = $("input[name='_token']").val();
                                $.ajax({
                                    url: "<!?php echo route('select-ajax') ?>",
                                    method: 'POST',
                                    data: {
                                        id_country: id_country,
                                        _token: token
                                    },
                                    success: function(data) {
                                        $("select[name='id_state'").html('');
                                        $("select[name='id_state'").html(data.options);
                                    }
                                });
                            });
                        </script>!-->
    </body>

    </html>