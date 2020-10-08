        <!-- ini buat manggil master page nya -->

        @section('judulmain','addjadwalmain')
        <!-- ini untuk judul page nya , bisa di modifikasi -->

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
        <div class="container">
            <h2 align="center" style="margin: 30px;"> TAMBAH USER</h2>
            <form action="/Data-List-User/tambah" method="POST" enctype="multipart/form-data">

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
                        <title>Add data USER</title>
                        <!- Bootstrap ->
                            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
                            <!- Font Awesome ->
                                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <form action="{{url('/Data-List-User/tambah')}}" method="post" enctype="multipart/form-data">
                                        <form>
                                            <div class="form-group">
                                                <label>NAME</label>
                                                <input type="text" name="name" id="name" class="form-control">
                                            </div>
                                            <div Class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" id="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="email_verified_at">Email_verified_at </label>
                                                <input type="text" name="email_verified_at" id="email_verified_at" class="form-control"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password </label>
                                                <input type="text" name="password" id="password" class="form-control"></input>
                                            </div>
                                            <div class="form-group">
                                                <label>Role ID</label>
                                                <input type="text" name="role_id" id="role_id" class="form-control"></input>
                                            </div>
                                            <div class="form-group">
                                                <label>Created at</label>
                                                <input type="date" name="created_at" id="created_at" class="form-control"></input>
                                            </div>
                                            <input type="submit" class="btn btn-success" value="Add">
                                            <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                                            </input>