@extends('layouts.admin', ['type' => 'SuperAdmin'])
@section('title','All Users')
@section('css')
    <style>
        .email_btn{
          margin-left: 6px;
          height: 22px;
          padding-top: 0px;
      }
</style>
@endsection
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">All Users</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('super_admin.home')}}">Dashboard</a>
                </li>
                <li>
                    <a href="#">Users</a>
                </li>
                <li class="active">
                    All Users
                </li>
            </ol>
        </div>
    </div>

    @if(session()->has('success'))
        <script>
            Swal.fire('{{ session()->get('success') }}', '', 'success')
        </script>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table id="users-datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>User Type</th>
                        <th>User Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                       <td>{{$user->first_name}}</td>
                       <td>{{$user->last_name}}</td>
                       <td>{{$user->email }}</td>
                       <td>{{$user->phone}}</td>
                       <td>{{$user->password_hint}}</td>
                       <td>
                        <label class="switch">
                        <input class="checkbox_status" type="checkbox" {{($user->active_status==1)?'checked':''}} onclick="changeStatus('{{$user->id}}','{{$user->active_status}}')">
                        <span class="slider round"></span>
                        </label>
                       </td>
                       <td>{{$user->user_type}}</td>
                       <td>
                            <img src="{{asset('images/user-icon.png')}}" alt="user images">
                       </td>
                       <td>
                        <a href="{{route('edit.user',['id'=>$user->id])}}" class="btn btn-md btn-success" data-id="row-2434">
                        <span class="glyphicon glyphicon-pencil"></span> Edit</a>
                       </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#users-datatable').dataTable();
            var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
            var table = $('#datatable-fixed-col').DataTable({
                scrollY: "300px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    leftColumns: 1,
                    rightColumns: 1
                }
            });
        });
        TableManageButtons.init();

function changeStatus(user_id,status){
$.get('{{route('user.status.change')}}',{user_id:user_id,status:status},function(data){
    location.reload();
});
}
    </script>
@endsection
