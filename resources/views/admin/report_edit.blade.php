@extends('layouts.admin', ['type' => 'admin'])
@section('title','Edit User Report')
@section('css')
    <style>
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
            <h4 class="page-title">Admin Dashboard</h4>
            <p class="text-muted page-title-alt">Welcome to admin panel!</p>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Update Report</b></h4>
                    <br/>

                    @if(session()->has('success'))
                        <script>
                            Swal.fire('{{ session()->get('success') }}', '', 'success')
                        </script>
                    @endif

                    <form action="{{route('admin.report.update',['id'=>$userreport->id])}}" method="POST" data-parsley-validate="" novalidate="">
                        @csrf()
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="userName">Patient Number</label>
                                    <input type="text" name="patientno" parsley-trigger="change" required="" class="form-control" id="patientno" value="{{$userreport->pat_number}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="case_no">Case No</label>
                                    <input type="text" name="case_no" parsley-trigger="change" required="" class="form-control" id="case_no" value="{{$userreport->case_no}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="reg_date">Registration Date</label>
                                    <input type="date" name="reg_date" parsley-trigger="change" required="" class="form-control" id="reg_date" value="{{$userreport->Reg_date}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="reg_number">Registration Time</label>
                                    <input type="time" name="reg_number" parsley-trigger="change" required="" class="form-control" id="reg_number" value="{{$userreport->Reg_time}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="med_rec_number">Med Record Number</label>
                                    <input type="text" name="med_rec_number" parsley-trigger="change" required="" class="form-control" id="med_rec_number" value="{{$userreport->Med_Rec_No}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" name="name" parsley-trigger="change" required="" class="form-control" id="name" value="{{$userreport->Name}}">

                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="f_name">Father/Husband Name</label>
                                    <input type="text" name="f_name" parsley-trigger="change" required="" class="form-control" id="f_name" value="{{$userreport->Guardian_name}}">

                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="date" name="age" parsley-trigger="change" required="" class="form-control" id="age" value="{{$userreport->Age}}">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="userName">Sex</label>
                                    <select class="form-control" required="required"  name="gender">
                                        <option >Choose</option>
                                        <option value="Male" {{($userreport->Sex == 'Male')?'selected':''}}>Male</option>
                                        <option value="Female" {{($userreport->Sex == 'Female')?'selected':''}}>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" parsley-trigger="change" required="" class="form-control" id="email" value="{{$userreport->email}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cnic">CNIC</label>
                                    <input type="text" name="cnic" parsley-trigger="change" required="" class="form-control" id="cnic" value="{{$userreport->cnic}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone_no">Phone</label>
                                    <input type="text" name="phone_no" parsley-trigger="change" required="" class="form-control" id="phone_no" value="{{$userreport->phone}}">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" parsley-trigger="change" required="" class="form-control" id="address" value="{{$userreport->address}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="report_date">Report Date</label>
                                    <input type="date" name="report_date" parsley-trigger="change" required="" class="form-control" id="report_date" value="{{$userreport->report_date}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="report_time">Report Time</label>
                                    <input type="time" name="report_time" parsley-trigger="change" required="" class="form-control" id="report_time"  value="{{$userreport->report_time}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="passport_no">Passport Number</label>
                                    <input type="text" name="passport_no" parsley-trigger="change" required="" class="form-control" id="passport_no"  value="{{$userreport->passport_no}}">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="flight_number">Flight Number</label>
                                    <input type="text" name="flight_number" parsley-trigger="change" required="" class="form-control" id="flight_number"  value="{{$userreport->flight_no}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="result">Result</label>
                                    <input type="text" name="result" required="" class="form-control" id="result"  value="{{$userreport->result}}">
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