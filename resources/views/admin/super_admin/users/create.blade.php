@extends('layouts.admin', ['type' => 'SuperAdmin'])
@section('title','Create User')
@section('css')
    <style>
  {{--.icon_xx_small{--}}
        {{--width: 14px;--}}
        {{--}--}}
        {{--.second_icon{--}}
        {{--margin-left: 18px;--}}
        {{--}--}}
        .email_btn{
          margin-left: 6px;
          height: 22px;
          padding-top: 0px;
      }
      .custom-error{
        color: red;
        font-weight: bold;
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
                    Create New User
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                 <h4 class="m-t-0 header-title"><b>Create New User</b></h4>
                 <br/>

        @if(count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 

                   
             <form action="{{route('save-new-user')}}" Method="POST" data-parsley-validate="" novalidate="">
              @csrf()     
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                            <label for="userName">User First Name*</label>
                            <input type="text" name="firstname" parsley-trigger="change" required="" placeholder="First name" class="form-control" id="firstname">
                        
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="userName">User Last Name*</label>
                            <input type="text" name="lastname" parsley-trigger="change" required="" placeholder="Last name" class="form-control" id="lastname">
                            
                            </div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                            <label for="useremail">Enter User Email*</label>
                            <input type="email" name="useremail" parsley-trigger="change" required="required" placeholder="User Email" class="form-control" id="useremail">
                           
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" parsley-trigger="change" required="required" placeholder="Phone No" class="form-control" id="phone_number">
                           
                            </div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                            <label for="userName">User Group*</label>
                            <select class="form-control" required="required"  name="usergroup">         
                                <option value="admin">admin</option>
                            </select> 
                                                    
                            </div> 
                         </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="userpassword">User Password*</label>
                            <input type="text" name="userpassword" parsley-trigger="change" required="required"  placeholder="Enter user name" class="form-control" id="userpassword">
                          
                            </div>
                        </div>
                     </div>

                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Submit
                        </button>
                        
                    </div>    
                </form>
            </div>
        </div>                     
    </div>
 </div>   
 
@endsection
{{-- @section('js')
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

        function unFreezDoctor(id) {
            Swal.fire({
                'title': 'UnFreeze Doctor Account',
                text: 'This operation is irreversible, are you sure you want to UnFreeze this doctor account?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                dangerMode: true
            }).then((result) => {
                if(result.isConfirmed) {
                    $.get('{{ route('admin.doctor.open') }}',{id:id}, function(data){
                        location.reload();
                    });
                }
                else {
                    Swal.fire('Doctor account not Active.', '', 'info');
                }
            });
        }
        function freezDoctor(id) {
            Swal.fire({
                'title': 'Freeze Doctor Account',
                text: 'This operation is irreversible, are you sure you want to freeze this doctor account?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                dangerMode: true
            }).then((result) => {
                if(result.isConfirmed) {
                    $.get('{{ route('admin.doctor.freez') }}',{id:id}, function(data){
                        location.reload();
                    });
                }
                else {
                    Swal.fire('Doctor account not freezed.', '', 'info');
                }
            });
        }
        function changeInsuranceStatus(status,id) {
            $.get('{{ route('admin.insurance.statusChnage') }}',{status:status,id:id}, function(data)
            {
                Swal.fire(data, '', 'success')
            });
        }
    </script>
@endsection
 --}}