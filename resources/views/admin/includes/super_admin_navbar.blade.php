<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li><a href="{{route('super_admin.home')}}" class="waves-effect"><img src="{{ asset('images/home.png') }}" class="icon" height="20"><span>Dashboard</span></a>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><img src="{{ asset('/images/user-icon.png') }}" class="icon" height="20"><span>Users</span><span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('create-new-user')}}">Add New User</a></li>
                        <li><a href="{{route('all.users')}}">All Users</a></li>
                    </ul>
                </li>

              
                <li class="has_sub">
                    <a href="#" class="waves-effect"><img src="{{ asset('/images/report.png') }}" class="icon" height="20"><span>Reports</span><span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('create.report')}}">Add New Report</a></li>
                        <li><a href="{{route('all-reports.show')}}">All Reports</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
