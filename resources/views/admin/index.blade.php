@extends('layouts.admin', ['type' => 'admin'])
@section('title','All Users Reports')
@section('css')
    <style>
        .email_btn{
          margin-left: 6px;
          height: 22px;
          padding-top: 0px;

      }
      .btn-style{
        height: 25px;
        width: 80px;
      }
</style>
@endsection
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">All Users Reports</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.home')}}">Dashboard</a>
                </li>
                <li>
                    <a href="#">Reports</a>
                </li>
                <li class="active">
                    All Users Reports
                </li>
            </ol>
        </div>
    </div>

    @if(session()->has('success'))
        <script>
            Swal.fire('{{ session()->get('success') }}', '', 'success')
        </script>
    @endif

    @if(session()->has('error'))
        <script>
            Swal.fire('{{ session()->get('error') }}', '', 'warning')
        </script>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table id="users-datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Patient Number</th>
                        <th>Case No</th>
                        <th>Registration Date</th>

                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Report Date</th>
                        <th>Passport Number</th>
                        <th>Result</th>
                        <th>Added By</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($UserReports as $UserReport)

                    @if($UserReport->user_id)

                     @php
                       $Creater = \DB::table('users')
                                ->select('first_name','last_name')
                                ->Where('id',$UserReport->user_id)->first();
                    @endphp
                    @endif
                    <tr>
                       <td>{{$UserReport->pat_number}}</td>
                       <td>{{$UserReport->case_no}}</td>
                       <td>{{$UserReport->Reg_date }}</td>
                       <td>{{$UserReport->Name}}</td>
                       <td>{{$UserReport->phone}}</td>
                       <td>{{$UserReport->report_date}}</td>
                       <td>{{$UserReport->passport_no}}</td>
                       <td>{{$UserReport->result}}</td>
                       <td>
                           @if($UserReport->user_id)
                           {{$Creater->first_name.' '.$Creater->last_name}}
                           @endif
                       </td>
                       <td>
            @php
            $created_at = $UserReport->created_at->addhours(10);
            $report_time = date('Y-m-d H:i:s', strtotime($created_at));
            $currentTime = date('Y-m-d H:i:s', strtotime(\Carbon\Carbon::now()));
            @endphp

            @if($currentTime < $report_time)

                        <a href="{{route('admin.report.edit',['id'=>$UserReport->id])}}" class="on-default edit-row"><i class="fa fa-eye"></i></a> |
                        <a href="{{route('admin.report.delete',['id'=>$UserReport->id])}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a> |
            @endif            
                         <a target="_blank" href="{{route('admin.downlaod.report.pdf',['id'=>$UserReport->id])}}" class="on-default remove-row"><i class="glyphicon glyphicon-print"></i></a>
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
    </script>
@endsection
