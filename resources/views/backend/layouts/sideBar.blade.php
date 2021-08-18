@section('sideBar')
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{url('uploads/admins/'.Auth::guard('admin')->user()->image)}}" class="img-circle"
                         alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{Auth::guard('admin')->user()->username}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
{{--            <form action="#" method="get" class="sidebar-form">--}}
{{--                <div class="input-group">--}}
{{--                    <input type="text" name="q" class="form-control" placeholder="Search..."/>--}}
{{--                    <span class="input-group-btn">--}}
{{--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i--}}
{{--                        class="fa fa-search"></i></button>--}}
{{--              </span>--}}
{{--                </div>--}}
{{--            </form>--}}
            <ul class="sidebar-menu">
                <li class="header">Blood Donors Table</li>
                <li class="active treeview">
                    <a href="{{route('admin')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-dashboard"></i>
                    </a>
                    <a href="{{route('add-admin-user')}}">
                        <i class="fa fa-plus"></i> <span>Add-admin-user</span> <i class="fa fa-success"></i>
                    </a>
                    <a href="{{route('show-admin-users')}}">
                        <i class="fa fa-users"></i> <span>Admin-Users</span> <i class="fa fa-danger"></i>
                    </a>
                    <a href="{{route('show-blood-user')}}">
                        <i class="fa fa-user"></i> <span>Blood User</span> <i class="fa fa-danger"></i>
                    </a>
                    <a href="{{route('add-blood-bank')}}">
                        <i class="fa fa-user"></i> <span>add-blood-bank</span> <i class="fa fa-danger"></i>
                    </a>
                    <a href="{{route('show-questionnaire')}}">
                        <i class="fa fa-users"></i> <span>Questionnaire</span> <i class="fa fa-danger"></i>
                    </a>


                    <a href="{{route('show-donor-admin')}}">
                        <i class="fa fa-folder"></i> <span>Donors</span> <i
                            class="fa fa-danger"></i>
                    </a>

                    <a href="{{route('show-newDonor')}}">
                        <i class="fa fa-folder"></i> <span>Show new Donors</span> <i
                            class="fa fa-danger"></i>
                    </a>
                </li>
            </ul>
        </section>
    </aside>

@endsection
