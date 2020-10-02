@extends('layouts.app')

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<title>Buat serah Terima</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="container">
            <form action="{{url('/serah-terima/create')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h2 align="center" style="margin: 30px;"> Buat Serah terima </h2>
                <div class="container">
                    <div class="form-group">
                        <label for="stnk">NO.STNK </label>
                        <input type="text" name="stnk" id="stnk" class="form-control input-lg dynamic" data-dependent="stnk"></input>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Keberangkatan</label>
                        <!--select id="selectbox2">!-->
                        <select id='Tanggal_keberangkatan' name='Tanggal_keberangkatan' class="form-control input-lg dynamic" data-dependent="Tanggal_keberangkatan">
                            <option value='0'>-- Select Tanggal --</option>
                            <!-- Read Departments -->
                            @foreach($lihatdata as $inventaris_mobil)
                            <option value="{{$inventaris_mobil->Tanggal_keberangkatan}}">{{$inventaris_mobil->Tanggal_keberangkatan}}</option>
                            @endforeach
                        </select>
                        </input>
                    </div>
                    <div class="form-group">
                        <label>Pilh Inventaris</label>
                        <!---select id="selectbox1">!-->
                        <select id='Inventaris_mobil' name='Inventaris_mobil' class="form-control input-lg dynamic" data-dependent="Inventaris_mobil">
                            <option value='0'>-- Select inv --</option>
                            @foreach($lihatdata as $Inventaris_mobil)
                            <option value='{{$Inventaris_mobil->Inventaris_mobil}}'>{{$Inventaris_mobil->Inventaris_mobil}}</option>
                            @endforeach
                        </select> </div>
                    <div class="form-group">
                        <label>Diterima Oleh</label>
                        <input type="text" name="diterima_oleh" id="diterima_oleh" class="form-control input-lg dynamic" data-dependent="diterima_oleh"></input>
                    </div>
                    <!-- Script -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            // Department Change
                            $('#Tanggal_keberangkatan').change(function() {
                                // Department id
                                var id = $(this).val();
                                // Empty the dropdown
                                $('#Inventaris_mobil').find('option').not(':first').remove();
                                // AJAX request 
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: '/jadwal/' + id,
                                    type: 'get',
                                    dataType: 'json',
                                    success: function(response) {
                                        var len = 0;
                                        console.log(response);
                                        if (response['data'] != null) {
                                            len = response['data'].length;
                                        }
                                        if (len > 0) {
                                            // Read data and create 
                                            for (var i = 0; i < len; i++) {
                                                console.log(response);
                                                var Tanggal_keberangkatan = response['data'][i].Tanggal_keberangkatan;
                                                var Inventaris_mobil = response['data'][i].Inventaris_mobil;
                                                var option = "<option value='" + Tanggal_keberangkatan + "'>" + Inventaris_mobil + "</option>";
                                                $("#Inventaris_mobil").append(option);
                                            }
                                        }

                                    }
                                });
                            });

                        });
                    </script>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Add">
                        <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                    </div>
            </form>
</body>
</form>
<!-- Script -->