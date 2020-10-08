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
                            <select id='sel_Tanggal' name='Tanggal_keberangkatan' class="form-control input-lg dynamic" data-dependent="Tanggal_keberangkatan">
                                <option value='0'>-- Select Tanggal --</option>
                                <!-- Read Departments -->
                                @foreach($lihatdata as $inventaris_mobil)
                                <option value="{{ $inventaris_mobil->Tanggal_keberangkatan }}">{{ $inventaris_mobil->Tanggal_keberangkatan }}</option>
                                @endforeach
                            </select>
                            </input>
                        </div>
                        <div class="form-group">
                            <label>Pilh Inventaris</label>
                            <!---select id="selectbox1">!-->
                            <select id='sel_inv' name='Inventaris_mobil' class="form-control input-lg dynamic" data-dependent="Inventaris_mobil">
                                <option value='0'>-- Select inv --</option>
                                @foreach($lihatdata as $Inventaris_mobil)
                                <option value='{{$Inventaris_mobil->Inventaris_mobil}}'>{{$Inventaris_mobil->Inventaris_mobil}}</option>
                                @endforeach
                            </select> </div><!-- Script -->
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                // Department Change
                                $('#sel_Tanggal').change(function() {
                                    // Department id
                                    var id_inventaris = $(this).val();
                                    // Empty the dropdown
                                    $('#sel_inv').find('option').not(':first').remove();
                                    // AJAX request 
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        url: '/jadwal/' + id_inventaris,
                                        type: 'get',
                                        dataType: 'json',
                                        success: function(response) {
                                            var len = 0;
                                            if (response['data'] != null) {
                                                len = response['data'].length;
                                            }
                                            if (len > 0) {
                                                // Read data and create 
                                                for (var i = 0; i < len; i++) {
                                                    var Tanggal_keberangkatan = response['data'][i].Tanggal_keberangkatan;
                                                    var Inventaris_mobil = response['data'][i].Inventaris_mobil;
                                                    var option = "<option value='" + Tanggal_keberangkatan + "'>" + Inventaris_mobil + "</option>";
                                                    $("#sel_inv").append(option);
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