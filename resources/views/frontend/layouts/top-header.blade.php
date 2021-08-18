@section('top-header')



    <header id="home" class="section">
        <div class="header_main">
            <!-- header inner -->
            <div class="header">
                <div class="container">

                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">


                                        <li><a href="{{'/'}}">Home</a></li>
                                        <li><a href="{{'/users'}}">Donors</a></li>
                                        <li><a href="{{'/about'}}">About</a></li>
                                        <li><a href="{{'/users/services'}}">Service</a></li>
                                        <li><a href="{{'/contact'}}">Contact Us</a></li>
                                        <li>

                                            @if(\Illuminate\Support\Facades\Auth::guard('web')->user())
                                                <a href="{{route('user-logout')}}">logout</a>
                                            @else
                                                <a href="{{route('login')}}">login</a>
                                            @endif
                                        </li>
                                        <li>
                                            @if(\Illuminate\Support\Facades\Auth::guard('web')->user())
                                                <a href="{{('/users/profile')}}">Profile</a>
                                            @else
                                                <a href="{{route('register')}}">Sign-Up</a>
                                            @endif
                                        </li>


                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->

@endsection
