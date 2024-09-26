<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link" target="_blank">
        <img src="{{asset('assets/backend/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dream interpretation</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Admins</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('about.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>About</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dreams.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dreams</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('dream_categories.index')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Dream Categories</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="nav-item">
                    <a href="{{route('settings.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Setting</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('languages.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Languages</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('slider.index')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Slider</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
