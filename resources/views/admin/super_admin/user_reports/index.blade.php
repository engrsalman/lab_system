@extends('layouts.admin', ['type' => 'SuperAdmin'])
@section('title','All Users Reports')
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
                <table id="datatable-buttons" class="table table-striped table-bordered">
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
                        <a href="{{route('report.edit',['id'=>$UserReport->id])}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a> |
                        <a href="{{route('report.delete',['id'=>$UserReport->id])}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a> |

                         <a target="_blank" href="{{route('downlaod.report.pdf',['id'=>$UserReport->id])}}" class="on-default remove-row"><i class="glyphicon glyphicon-print"></i></a>        
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
