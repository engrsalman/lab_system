@extends('layouts.admin', ['type' => 'SuperAdmin'])
@section('title','Edit User')
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
            <h4 class="page-title">Super Admin</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('super_admin.home')}}">Dashboard</a>
                </li>
                <li>
                    <a href="#">Users</a>
                </li>
                <li class="active">
                    Edit Super Admin
                </li>
            </ol>
        </div>
    </div>
   
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                 <h4 class="m-t-0 header-title"><b>Edit Super User</b></h4>
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


             <form action="{{route('update-super-admin')}}" Method="POST" data-parsley-validate="" novalidate="">
              @csrf() 
             
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                            <label for="userName">User First Name*</label>
                            <input type="text" name="firstname" parsley-trigger="change" required="" placeholder="First name" class="form-control" id="firstname" value="{{$super_admin->first_name}}">
            
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="userName">User Last Name*</label>
                            <input type="text" name="lastname" parsley-trigger="change" required="" placeholder="Last name" class="form-control" id="lastname" value="{{$super_admin->last_name}}">
                            
                            </div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                            <label for="useremail">Enter User Email*</label>
                            <input type="email" name="email" parsley-trigger="change" required="required" placeholder="User Email" class="form-control" id="useremail" value="{{$super_admin->email }}">
                           
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" parsley-trigger="change" required="required" placeholder="Phone No" class="form-control" id="phone_number" value="{{$super_admin->phone}}">
                           
                            </div>
                        </div>
                     </div>
                     

                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Update
                        </button>
                        
                    </div>    
                </form>
            </div>
        </div>                     
    </div>
 </div>    
@endsection

 