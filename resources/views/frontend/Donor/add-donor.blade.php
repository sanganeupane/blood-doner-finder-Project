@extends('frontend.master.master')
@section('register')



    @if(Auth::guard('web')->user())
        <body onload="getLocation()">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section class="content-header">
                        <h1>
                            You Are A donor
                            please fillup validate form
                        </h1>

                        <div class="form-group">
                            <button class="btn btn-danger btn-sm"><a href="{{route('show-donor')}}" class="btn-danger">View_My_Profile</a>
                            </button>
                        </div>

                        @if(\Illuminate\Support\Facades\Auth::guard('questionnaire')->user())
                            <button class="btn btn-info btn-sm"><a href="{{route('logout')}}"
                                                                   class="btn-info">logout</a></button>

                        @else
                            <a href="{{route('questionnaire')}}" class="nav-item nav-link">login</a>
                        @endif

                    </section>

                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @include('backend.layouts.message')


                                            <form action="{{route('add-donor')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="donor_name">enter donor name</label>
                                                    <a style="color:red;">{{$errors->first('donor_name')}}</a>
                                                    <input type="text" name="donor_name" class="form-control-sm"
                                                           placeholder="First donor name" value="{{old('donor_name')}}"
                                                           id="donor_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">enter your email *</label>
                                                    <a style="color:red;">{{$errors->first('email')}}</a>
                                                    <input type="text" name="email" class="form-control-sm"
                                                           placeholder="e-mail" value="{{old('email')}}"
                                                           id="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">enter your address</label>
                                                    <a style="color:red;">{{$errors->first('address')}}</a>
                                                    <input type="text" name="address" class="form-control-sm"
                                                           placeholder="First address " value="{{old('address')}}"
                                                           id="address">
                                                </div>

                                                <div>
                                                    <script>

                                                        function getLocation() {
                                                            if (navigator.geolocation) {
                                                                navigator.geolocation.getCurrentPosition(showPosition);

                                                            } else {
                                                                x.innerHTML = "Geolocation is not supported by this browser.";
                                                            }
                                                        }

                                                        function showPosition(position) {

                                                            document.getElementById('lat1').value = +position.coords.latitude;
                                                            document.getElementById('lon1').value = +position.coords.longitude;


                                                        }
                                                    </script>

                                                    <div class="form-group">
                                                        <input type="hidden" name="lat1" class="form-control-sm"
                                                               id="lat1">
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="hidden" name="lon1" class="form-control-sm"
                                                               id="lon1">
                                                    </div>
                                                </div>
                                                <div>
                                                    <h5>Gender:</h5><a style="color:red;">{{$errors->first('sex')}}</a>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="male"
                                                               name="sex" id="male">
                                                        <label class="form-check-label" for="male">Male</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="female"
                                                               name="sex" id="female">
                                                        <label class="form-check-label" for="female">Female</label>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="bloodtype"></label>
                                                    <a style="color:red;">{{$errors->first('bloodtype')}}</a>
                                                    <select name="bloodtype" id="bloodtype">
                                                        <option selected disabled value="">
                                                            Choose...
                                                        </option>
                                                        <option>A+</option>
                                                        <option>B+</option>
                                                        <option>O+</option>
                                                        <option>AB+</option>
                                                    </select>
                                                </div>
                                                <br>

                                                <div class="form-group">
                                                    <label for="phone">contact number *</label>
                                                    <a style="color:red;">{{$errors->first('phone')}}</a>
                                                    <input type="text" name="phone" class="form-control-sm"
                                                           placeholder="Eg: 98********" value="{{old('phone')}}"
                                                           id="phone">
                                                </div>


                                                <div class="form-group">
                                                    <button class="btn btn-success" onclick="getLocation()">Add-user
                                                    </button>
                                                </div>

                                            </form>


                                        </div><!-- /.col -->

                                    </div><!-- /.col -->
                                </div><!-- ./box-body -->

                            </div><!-- /.box -->
                        </div>

                    </section>
                </div>
            </div>
        </div>
        </body>
    @else
        <a href="{{route('login')}}" class="nav-item nav-link">access Donor pannel please login to user firstlogin</a>
    @endif



@endsection
