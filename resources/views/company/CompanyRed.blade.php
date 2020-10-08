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
    <a href="{{url('/Data-Company/create')}}" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i><span> Add New Data </span></a>

    <div class="a-table">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama PT</th>
                    <th>Address</th>
                    <th>Npwp</th>
                    <th>Bank_Account_Non_PPN</th>
                    <th>Bank_Account_Non_PPN2</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Company as $key=>$row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->Name}}</td>
                    <td>{{$row->Address}}</td>
                    <td>{{$row->Npwp}}</td>
                    <td>{{$row->Bank_Account_Non_PPN}}</td>
                    <td>{{$row->Bank_Account_Non_PPN2}}</td>
                    <td>
                        <a href="{{url ('/Data-Company/edit/'.$row->id)}}">
                            <button type="edit" class="btn btn-primary btn-xs dt-edit">
                                <span class="fa fa-pencil" aria-hidden="true"></span>
                            </button>
                        </a>
                        <a href="{{url ('/Data-Company/delete/'.$row->id)}}">
                            <button type="delete" class="btn btn-danger btn-xs dt-delete">
                                <span class="fa fa-remove" aria-hidden="true"></span>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">© <?php echo date('d/m/Y'); ?> Copyright:</div>

</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('a.more').click(function() {
            // Toggle Class
            $tr = $(this).parent().parent();
            $tr.toggleClass('expanded');
            // Tampilkan - sembunyikan baris
            $i = $(this).children('i');
            $i.removeClass('fa-chevron-down', 'fa-chevron-up');
            var arrow = $tr.hasClass('expanded') ? 'fa-chevron-up' : 'fa-chevron-down';
            $i.addClass(arrow);
            return false;
        });
    })
</script>
<script>
    @endsection