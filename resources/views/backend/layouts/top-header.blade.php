@section('top-header')
<body class="skin-blue">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo"><b>Admin</b></a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{url('backend/bootstrap/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">
                                {{Auth::guard('admin')->user()->username}}

                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-primary btn-small ">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('admin-logout')}}" class="btn btn-danger btn-small ">Logout</a>
                                </div>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

@endsection
