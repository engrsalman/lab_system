@extends('layouts.admin', ['type' => 'Admin'])
@section('title','Create User Report')
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
    
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title"> Admin Dashboard</h4>
            <p class="text-muted page-title-alt">Welcome to admin panel!</p>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                 <h4 class="m-t-0 header-title"><b>Create New Report</b></h4>
                 <br/>

        @if(session()->has('success'))
            <script>
                Swal.fire('{{ session()->get('success') }}', '', 'success')
            </script>
        @endif

                   
             <form action="{{route('admin.store.report')}}" Method="POST" data-parsley-validate="" novalidate="">
              @csrf()     
                    <div class="row">
                         <div class="col-md-3">
                            <div class="form-group">
                            <label for="userName">Patient Number</label>
                            <input type="text" name="patientno" parsley-trigger="change" required="" placeholder="patient No" class="form-control" id="patientno">
                        
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="case_no">Case No</label>
                            <input type="text" name="case_no" parsley-trigger="change" required="" placeholder="case no" class="form-control" id="case_no">
                            
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                            <label for="reg_date">Registration Date</label>
                            <input type="date" name="reg_date" parsley-trigger="change" required="" placeholder="Last name" class="form-control" id="reg_date"  value="{{ date('Y-m-d') }}">
                            
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="reg_number">Registration Time</label>
                            <input type="time" name="reg_number" parsley-trigger="change" required="" placeholder="Reg_number" class="form-control" id="reg_number">
                            </div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-md-3">
                            <div class="form-group">
                            <label for="med_rec_number">Med Record Number</label>
                            <input type="text" name="med_rec_number" parsley-trigger="change" required="" placeholder="Record No" class="form-control" id="med_rec_number">
                        
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" name="name" parsley-trigger="change" required="" placeholder="Enter Name" class="form-control" id="name">
                            
                            </div>
                            
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                            <label for="f_name">Father/Husband Name</label>
                            <input type="text" name="f_name" parsley-trigger="change" required="" placeholder="Guardian name" class="form-control" id="f_name">
                            
                            </div>
                        </div>
                        <div class="col-md-3">
                            
                            <div class="form-group">
                            <label for="age">Age</label>
                            <input type="date" name="age" parsley-trigger="change" required="" placeholder="Age" class="form-control" id="age">
                            
                            </div>
                        </div>
                     </div>
                     
                     <div class="row">
                         <div class="col-md-3">
                            <div class="form-group">
                            <label for="userName">Sex</label>
                            <select class="form-control" required="required"  name="gender">         
                                <option >Choose</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" parsley-trigger="change" required="" placeholder="Email" class="form-control" id="email">
                            
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                            <label for="cnic">CNIC</label>
                            <input type="text" name="cnic" parsley-trigger="change" required="" placeholder="CNIC" class="form-control" id="cnic">
                            
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="phone_no">Phone</label>
                            <input type="text" name="phone_no" parsley-trigger="change" required="" placeholder="Phone Number" class="form-control" id="phone_no">
                            
                            </div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-md-3">
                            <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" parsley-trigger="change" required="" placeholder="address" class="form-control" id="address">
                        
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="report_date">Report Date</label>
                            <input type="date" name="report_date" parsley-trigger="change" required="" placeholder="report date" class="form-control" id="report_date">
                            
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                            <label for="report_time">Report Time</label>
                            <input type="time" name="report_time" parsley-trigger="change" required="" placeholder="report time" class="form-control" id="report_time">
                            
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="passport_no">Passport Number</label>
                            <input type="text" name="passport_no" parsley-trigger="change" required="" placeholder="passport no" class="form-control" id="passport_no">
                        
                            </div>
                        </div>
                        
                     </div>
                     <div class="row">
                         
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="flight_number">Flight Number</label>
                            <input type="text" name="flight_number" parsley-trigger="change" required="" placeholder="flightnumber" class="form-control" id="flight_number">
                            
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                            <label for="result">Result</label>
                            <input type="text" name="result" parsley-trigger="change" required="" placeholder="Last name" class="form-control" id="result"> 
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
