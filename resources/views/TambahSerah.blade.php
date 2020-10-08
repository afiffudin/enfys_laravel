@extends('layouts.app')
@section('isimain')
<style>
    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>
<section class="content">
    <h2 align="center" style="margin: 30px;"> Buat serah Terima</h2>
    <form action="{{url('/serah-terima/create')}}" method="post" enctype="multipart/form-data">
        <form class="form-data" id="form-data" action="{{url('/serah-terima/create')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="stnk">NO.STNK </label>
                        <input type="text" name="stnk" id="stnk" class="form-control input-lg dynamic" data-dependent="stnk"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Tanggal Keberangkatan Dan Nomer Inventaris</label>
                        <!--select id="selectbox2">!-->
                        <select id='Tanggal_keberangkatan' name='id' class="form-control input-lg dynamic" data-dependent="Tanggal_keberangkatan">
                            <option value='0'>-- Select Tanggal --</option>
                            <!-- Read Departments -->
                            @foreach($lihatdata as $inventaris_mobil)
                            <option value="{{$inventaris_mobil->id}}">{{$inventaris_mobil->Tanggal_keberangkatan}} - {{$inventaris_mobil->Inventaris_mobil}}</option>
                            @endforeach
                        </select>
                        </input> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Diterima Oleh</label>
                        <input type="text" name="diterima_oleh" id="diterima_oleh" class="form-control input-lg dynamic" data-dependent="diterima_oleh"></input>
                        <p class="text-danger" id="err_diterima_oleh"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Add">
                            <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
                        </div>
        </form>
        </body>
    </form>
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
                        console.log(response['data']['Inventaris_mobil']);

                        /// alert(response['data']['Inventaris_mobil']);
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
    @endsection