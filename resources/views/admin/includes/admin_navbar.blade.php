<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li><a href="{{route('admin.home')}}" class="waves-effect"><img src="{{ asset('images/home.png') }}" class="icon" height="20"><span>Dashboard</span></a></li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><img src="{{ asset('/images/report.png') }}" class="icon" height="20"><span>Reports</span><span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.create.report')}}">Add New Report</a></li>
                        <li><a href="{{route('admin.show.report')}}">All Reports</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
