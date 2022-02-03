<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center" style="background: #D6F6FB;">
            <a href="@if($type == 'admin'){{route('admin.home')}}@else{{route('super_admin.home')}}@endif" class="logo">
                <i class="icon-c-logo"> <img src="{{asset('/images/logo.png')}}" height="27"/> </i>
                <span><img src="{{asset('/images/logo.png')}}" height="46"/></span>
            </a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="md md-menu"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                    </li>
                    <li class="dropdown top-menu-item-xs">
                        <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('/images/user-icon.png')}}" alt="user-img" class="img-circle"></a>
                        <ul class="dropdown-menu">
                            @if($type != 'admin')
                            <li><a href="{{route('edit-super-admin')}}"><i class="ti-user m-r-10 text-custom"></i>Update Profile</a></li>
                            @endif
                            <li><a href="@if($type == 'admin'){{route('password.change')}}@else{{route('superadmin.password.change')}}@endif"><i class="ti-user m-r-10 text-custom"></i>Change password</a></li>

                        <!-- Log out-->
                        <li>
                        <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                               </form>

                         </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



