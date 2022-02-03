@extends('layouts.admin', ['type' => 'SuperAdmin'])
@section('title','Super Admin Dashboard')
@section('content')
    <style>
        .pull-left img{
            margin-top: 16px;
        }
        .social_icons img{
            margin-top: 23px;
        }
    </style>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Super Admin Dashboard</h4>
            <p class="text-muted page-title-alt">Welcome to super admin panel!</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="widget-bg-color-icon card-box fadeInDown animated">
                <div class="bg-icon bg-icon-info pull-left">
                    <img src="{{asset('images/report.png')}}" height="42">
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{\App\UserReport::count()}}</b></h3>
                    <p class="text-muted">Total Reports</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-pink pull-left">
                    <img src="{{asset('images/report.png')}}" height="42">
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{\App\UserReport::where('user_id',Auth::user()->id)->count()}}</b></h3>
                    <p class="text-muted">Your Reports</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        @if(count($all_users) > 0)
            @php $i = 1; @endphp
            @foreach($all_users as $user)
        <div class="col-md-4 col-lg-4">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-purple pull-left">
                    <img src="{{asset('images/report.png')}}" height="42">
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{\App\UserReport::where('user_id',$user->id)->count()}}</b></h3>
                    <p class="text-muted">User{{$i++}} Reports</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        @endforeach
            @endif

    </div>
@endsection
