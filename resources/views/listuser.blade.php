@extends('layouts.app')
@section('isimain')

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
<section class="content">
    <h2 align="center" style="margin: 30px;"> LIST USER</h2>
    <!--<a href="#" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i><span> Add New Data </span></a>
    <a href="#" class="btn btn-warning" data-toggle="modal"><i class="fa fa-filter"></i><span> Filter Data By column</span></a>
!-->
    <div class="table-container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listuser as $key=>$row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">© <?php echo date('d/m/Y'); ?> Copyright:</div>

</section>
<script src="jquery.min.js"></script>

</script>
@endsection