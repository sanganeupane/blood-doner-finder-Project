@section('footer_section')

    <div class="copyright_main">
        <div class="container">
{{--            <div class="contact_taital">--}}
{{--                <div class="row web">--}}
{{--                    <div class="col-sm-10 col-md-12 col-lg-4">--}}
{{--                        <div class="map_main">--}}
{{--                            <img src="{{url('frontend/images/map-icon.png')}}">--}}
{{--                            <span class="londan_text">56000,Gongabu,KTM,Nepal</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6 col-md-6 col-lg-4">--}}
{{--                        <div class="map_main">--}}
{{--                            <img src="{{url('frontend/images/phone-icon.png')}}">--}}
{{--                            <span class="londan_text">0109468412</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6 col-md-6 col-lg-4">--}}
{{--                        <div class="map_main">--}}
{{--                            <img src="{{url('frontend/images/email-icon.png')}}">--}}
{{--                            <span class="londan_text">sanga420@gmail.com</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="contact_product">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <h1 class="useful_text">SHORTCUT LINK</h1>
                        <div class="menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="{{'/users'}}">Donors</a></li>
                                <li><a href="{{'/about'}}">About</a></li>
                                <li><a href="#">Service</a></li>
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
                                        <a href="{{('users/profile')}}">Profile</a>
                                    @else
                                        <a href="{{route('register')}}">Sign-Up</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h1 class="useful_text">PRODUCT</h1>
                        <div class="menu multi_column_menu">
                            <ul>
                                <li class="footer_menu"><a href="#"><img src="{{url('frontend/images/bulit-icon.png')}}"
                                                                         class="footer_menu">Home</a></li>
                                <li class="footer_menu"><a href="#"><img src="{{url('frontend/images/bulit-icon.png')}}"
                                                                         class="footer_menu">Donors</a></li>
                                <li class="footer_menu"><a href="#"><img src="{{url('frontend/images/bulit-icon.png')}}"
                                                                         class="footer_menu">About</a></li>
                                <li class="footer_menu"><a href="#"><img src="{{url('frontend/images/bulit-icon.png')}}"
                                                                         class="footer_menu">Service</a></li>
                                <li class="footer_menu"><a href="#"><img src="{{url('frontend/images/bulit-icon.png')}}"
                                                                         class="footer_menu">Contact Us</a></li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>


@endsection
