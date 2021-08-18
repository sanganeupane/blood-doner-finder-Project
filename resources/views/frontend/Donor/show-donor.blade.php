<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/style.css')}}">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{url('frontend/css/responsive.css')}}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{url('frontend/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
</head>
<body>
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
</header>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::guard('web')->user())
                <div class="container">
                    <div class="row">
                        <div class="col-md-6"><br><br>

                            <h3>Welcome your blood user name is "{{Auth::guard('web')->user()->user_username}}"</h3>
                            @include('backend.layouts.message')

                            <hr>

                            @if(\Illuminate\Support\Facades\Auth::guard('questionnaire')->user())
                                <button class="btn btn-info btn-sm"><a href="{{route('logout')}}" class="btn-info">logout</a>
                                </button>

                            @else
                                <a href="{{route('questionnaire')}}" class="nav-item nav-link">login</a>
                            @endif
                            <button class="btn btn-danger btn-sm"><a href="{{route('add-donor')}}" class="btn-danger">add_donor</a>
                            </button>
                            <br><br>
                            <h4>
                                your id : {{Auth::guard('questionnaire')->user()->id}}<br>
                                Donor name is: {{Auth::guard('questionnaire')->user()->name}}<br>
                                your phone no: {{Auth::guard('questionnaire')->user()->phone}}<br>
{{--                                your syptoms are: {{Auth::guard('questionnaire')->user()->symptoms}}<br>--}}
                                your email: {{Auth::guard('web')->user()->user_email}}<br>
                                Created date: {{Auth::guard('questionnaire')->user()->created_at}}<br>

                            </h4>
                            <hr>
                            <br>
                            <h2>your blood records</h2>
<br>

                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Donor_Name</th>
                                            <th>Address</th>
                                            <th>Blood_Type</th>
                                            <th>Sex</th>
                                            {{--                        <th>Sex</th>--}}
                                            {{--                        <th>User_name</th>--}}
                                            <th>Phone_no.</th>
{{--                                            <th>questionnaire_symptoms</th>--}}
                                            <th>created_at</th>
                                            {{--                        <th>symptoms</th>--}}
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        {{--                    <div class="panel-body">--}}
                                        {{--                            @if($post->count()>0)--}}
                                        @foreach($posts as $key=>$post)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$post->donor_name}}</td>
                                                <td>{{$post->address}}</td>
                                                <td>{{$post->bloodtype}}</td>
                                                <td>{{$post->sex}}</td>
                                                <td>{{$post->phone}}</td>
{{--                                                <td>{{$post->donatedBy->symptoms}}</td>--}}
                                                <td>{{$post->postedBy->created_at->diffForHumans()}}</td>
                                                <td>
                                                    <a href="
{{--                                           {{route('delete-donor-profile').'/'.$post->id }}--}}
                                                        ">
                                                        <button class="btn-sm btn-danger" name="criteria"><i
                                                                class="fa fa-trash">_Delete</i>
                                                        </button>

                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @else

                <a href="{{route('login')}}" class="nav-item nav-link"><h2>You are not allowed to access Donor
                        pannel please login
                        to user first</h2></a>
            @endif
        </div>
    </div>
</div>

<div class="copyright_main">
    <div class="container">
        <div class="contact_taital">
            <div class="row web">
                <div class="col-sm-10 col-md-12 col-lg-4">
                    <div class="map_main">
                        <img src="{{url('frontend/images/map-icon.png')}}">
                        <span class="londan_text">57000,Gongabu,KTM,Nepal</span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="map_main">
                        <img src="{{url('frontend/images/phone-icon.png')}}">
                        <span class="londan_text">0109468412</span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="map_main">
                        <img src="{{url('frontend/images/email-icon.png')}}">
                        <span class="londan_text">sanga420@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact_product">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <h1 class="useful_text">SHORTCUT LINK</h1>
                    <div class="menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="{{'users'}}">Donors</a></li>
                            <li><a href="{{'about'}}">About</a></li>
                            <li><a href="#">Service</a></li>
                            <li><a href="{{'contact'}}">Contact Us</a></li>
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
                    </div>

                </div>
            </div>
        </div>

        <div class="icon_main">
            <div class="row">
                <div class="col-sm-12">
                    <div class="menu_text">
                        <ul>
                            <li><a href="#"><img src="{{url('frontend/images/fb-icon.png')}}"></a></li>
                            <li><a href="#"><img src="{{url('frontend/images/twitter-icon.png')}}"></a></li>
                            <li><a href="#"><img src="{{url('frontend/images/in-icon.png')}}"></a></li>
                            <li><a href="#"><img src="{{url('frontend/images/google-icon.png')}}"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright_main">
    <div class="container">
        <p class="copy_text">© 2021 All Rights Reserved</p>
    </div>
</div>
<!-- contact end -->
<!-- Javascript files-->
<script src="{{url('frontend/js/jquery.min.js')}}"></script>
<script src="{{url('frontend/js/popper.min.js')}}"></script>
<script src="{{url('frontend/js/bootstrap.bundle.min.js')}}"></script>


<script src="{{url('frontend/js/jquery-3.0.0.min.js')}}"></script>
<script src="{{url('frontend/js/plugin.js')}}"></script>
<!-- sidebar -->
<script src="{{url('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{url('frontend/js/custom.js')}}"></script>
<!-- javascript -->
<script>
    $(document).ready(function () {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });

        $(".zoom").hover(function () {

            $(this).addClass('transition');
        }, function () {

            $(this).removeClass('transition');
        });
    });
</script>

</body>

</html>
