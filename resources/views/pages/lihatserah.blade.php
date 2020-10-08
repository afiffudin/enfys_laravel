@extends('layouts.app')
@section('isimain')
<section class="content">
    <h2 align="center" style="margin: 30px;"> RINCIAN SERAH TERIMA</h2>
    <div class="a-table">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>STNK</th>
                    <th>Tanggal keberangkatan</th>
                    <th>Inventaris Mobil</th>
                    <th>DI Terima Oleh</th>
                    <th>Action</th>
            </thead>
            @foreach($lihatserah as $key=>$row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->stnk}}</td>
                <td>{{$row->Tanggal_keberangkatan}}</td>
                <td>{{$row->Inventaris_mobil}}</td>
                <td>{{$row->diterima_oleh}}</td>
                <td>
                    <a href="{{url('/serah-terima/edit/'.$row->id)}}">
                        <button type="edit" class="btn btn-primary btn-xs dt-edit">
                            <span class="fa fa-pencil" aria-hidden="true"></span>
                        </button>
                    </a>
                    <a href="{{url('/serah-terima/delete/'.$row->id)}}">
                        <button type="delete" class="btn btn-danger btn-xs dt-delete">
                            <span class="fa fa-remove" aria-hidden="true"></span>
                        </button>
                    </a></td>
            </tr> @endforeach </tbody>
        </table>
    </div>
    <div class="text-center">© <?php echo date('d/m/Y'); ?> Copyright:
    </div>
</section>
@endsection