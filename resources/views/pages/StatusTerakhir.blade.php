@extends('layouts.app')
@section('isimain')
<section class="content">
    <h2 align="center" style="margin: 30px;"> Daftar Update Status terakhir </h2>
    <div class="a-table">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>email</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th>Log In Terakhir </th>
                    <th>Login IP</th>
            </thead>
            <tbody>
                @foreach($Status as $key=>$row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->created_at}}</td>
                    <td>{{$row->updated_at}}</td>
                    <td>{{$row->last_login_at}}</td>
                    <td>{{$row->last_login_ip}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="text-center">© <?php echo date('d/m/Y'); ?> Copyright:</div>
</section>
@endsection