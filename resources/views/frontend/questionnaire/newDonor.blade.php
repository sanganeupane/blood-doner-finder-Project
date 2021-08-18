{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <title>{{$title}}</title>--}}
{{--    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>--}}
{{--    <link href="{{url('backend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"--}}
{{--          type="text/css"/>--}}
{{--    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{url('backend/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{url('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{url('backend/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{url('backend/bootstrap/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{url('backend/bootstrap/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css"/>--}}

{{--</head>--}}


@extends('frontend.master.master')

@section('newDonor')

<div class="container">
    <div class="row">
        <div class="col-md-12"><br>

            <div class="form-group">
                <button class="btn btn-danger btn-xs"> <a href="{{route('login-donor')}}">click_here_if_already_fill_this_form...??? </a></button>
            </div><br>
            <section class="content-header">
                <h2>
                    Welcome New Donor Answer the question to register for donate blood
                </h2>
<hr>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-5">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('backend.layouts.message')
                                    <form action="{{route('new-donor')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="first_name">First name * </label>
                                            <a style="color:green;">{{$errors->first('first_name')}}</a>
                                            <input type="text" name="first_name" class="form-control-sm"
                                                   placeholder="First name" value="{{old('first_name')}}"
                                                   id="first_name">
                                        </div>

                                        <div class="form-group">
                                            <label for="middle_name">middle name</label>
                                            <a style="color:red;">{{$errors->first('middle_name')}}</a>
                                            <input type="text" name="middle_name" class="form-control-sm"
                                                   placeholder="middle name" value="{{old('middle_name')}}"
                                                   id="middle_name">
                                        </div>


                                        <div class="form-group">
                                            <label for="last_name">last name *</label>
                                            <a style="color:red;">{{$errors->first('last_name')}}</a>
                                            <input type="text" name="last_name" class="form-control-sm"
                                                   placeholder="last name" value="{{old('last_name')}}"
                                                   id="last_name">
                                        </div>

{{--                                        <div class="form-group">--}}
{{--                                            <label for="email">enter your email *</label>--}}
{{--                                            <a style="color:red;">{{$errors->first('email')}}</a>--}}
{{--                                            <input type="text" name="email" class="form-control-sm"--}}
{{--                                                   placeholder="e-mail" value="{{old('email')}}"--}}
{{--                                                   id="email">--}}
{{--                                        </div>--}}


                                        <div class="form-group">
                                            <label for="phone">mobile number *</label>
                                            <a style="color:red;">{{$errors->first('phone')}}</a>
                                            <input type="text" name="phone" class="form-control-sm"
                                                   placeholder="Eg: 98********" value="{{old('phone')}}"
                                                   id="phone">
                                        </div>


                                        <div class="form-group">
                                            <h3>Your age *</h3>
                                            <a style="color:red;">{{$errors->first('age')}}</a>
                                            <div class="form-check">
                                                <label  for="age">below18</label>
                                                <input  type="radio" value="below18" name="age"
                                                       id="age">
                                            </div>
                                            <div class="form-check">
                                                <label  for="age">above18</label>
                                                <input type="radio" value="above18" name="age"
                                                       id="age">
                                            </div>
                                        </div>
                                        <br>


                                        <div class="form-group">
                                            <h3>do you have your weight above 50Kg...? *</h3>
                                            <a style="color:red;">{{$errors->first('weight')}}</a>
                                            <div class="form-check">
                                                <label  for="weight">yes</label>
                                                <input  type="radio" value="yes" name="weight"
                                                       id="weight">
                                            </div>
                                            <div class="form-check">
                                                <label for="weight">no</label>
                                                <input type="radio" value="no" name="weight"
                                                       id="weight">
                                            </div>
                                        </div>
                                        <br>


                                        <div class="form-group">
                                            <label for="occupation">Please provide your occupation</label>
                                            <a style="color:red;">{{$errors->first('occupation')}}</a>
                                            <input type="text" name="occupation" class="form-control-sm"
                                                   placeholder="what is your occupation" value="{{old('occupation')}}"
                                                   id="occupation">
                                        </div>


                                        <div class="form-group">
                                            <h4>have you ever checked your body report on hospital...?</h4>
                                            <a style="color:red;">{{$errors->first('report')}}</a>
                                            <div class="form-check">
                                                <label for="report">yes</label>
                                                <input type="radio" value="yes" name="report"
                                                       id="report">
                                            </div>
                                            <div class="form-check">
                                                <label  for="report"> no</label>
                                                <input type="radio" value="no" name="report"
                                                       id="report">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="image">please provide us a photo of your hospital
                                                report </label>
                                            <a style="color:red;">{{$errors->first('image')}}</a>
                                            <input type="file" name="image" class="form-control-sm"
                                                   placeholder="Your image" value="{{old('image')}}" id="image">
                                        </div>


                                        <div class="form-group">
                                            <a style="color:red;">{{$errors->first('food')}}</a>

                                            <label><strong>Please enter your daily daiting food</strong></label><br>
                                            <label><input type="checkbox" name="food[]" value="meat">meat</label>
                                            <label><input type="checkbox" name="food[]" value="egg">egg</label>
                                            <label><input type="checkbox" name="food[]" value="apple">apple</label>
                                            <label><input type="checkbox" name="food[]" value="honey">honey</label>
                                            <label><input type="checkbox" name="food[]" value="milk">milk</label>
                                            <label><input type="checkbox" name="food[]" value="water">water</label>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-success">Add-user</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

@endsection
{{--<script src="{{url('backend/plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>--}}
{{--<script src="{{url('backend/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/fastclick/fastclick.min.js')}}"></script>--}}
{{--<script src="{{url('backend/bootstrap/dist/js/app.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/chartjs/Chart.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/bootstrap/dist/js/pages/dashboard2.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/bootstrap/dist/js/demo.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/bootstrap/custom/custom.js')}}"></script>--}}
{{--</body>--}}
{{--</html>--}}

