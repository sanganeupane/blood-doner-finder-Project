@extends('frontend/master/master')
@section('home')

    <section>
        <div class="bannen_inner">
            <div class="container">
                <div class="row marginii">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        @include('backend.layouts.message')

                       <div class="row" style="float: left">
                           <div class="form-group">
                               <br>
                               <button class="btn btn-danger btn-xs"><a href="{{route('add-blood-request')}}">Request
                                       Blood</a></button>
                           </div>
                           <div class="form-group" style="margin-left: 10px;">
                               <br>
                               <button class="btn btn-success btn-xs"><a href="{{route('show-blood-request')}}">Recent Requests</a></button>
                           </div>
                       </div>


                        @if(Auth::guard('web')->user())
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>S.N.</th>
                                    <th>Blood_Bank_Name</th>
                                    <th>Location</th>
                                    <th>Contactnumber</th>
                                    <th>Email</th>
                                    <th>Image</th>

                                </tr>
                                </thead>
                                <tbody>
                                <div>
                                    <div class="panel-body">
                                        @foreach($usersData as $key=>$user)
                                            <tr>
                                                <td>{{++$key}}</td>

                                                <td>{{$user->blood_bank_name}}</td>
                                                <td>{{$user->blood_bank_location}}</td>
                                                <td>{{$user->blood_bank_contact}}</td>
                                                <td>{{$user->blood_bank_email}}</td>
                                                <td>
                                                    <img src="{{url('uploads/bloods/'.$user->image)}}" width="60px"
                                                         height="60px" alt="">
                                                </td>


                                            </tr>
                                @endforeach
                                </tbody>


                            </table>
                            {{$usersData->links()}}


                    </div>

                </div><br><br>
                @else


                    <h1 class="web_text"><strong>Welcome to blood donor finder</strong></h1>
                    <p class="donec_text"> <br> <br>
                        Find blood donors near your location. Find blood within your area. Become a Volunteer. Give Blood.
                        Thank you for becoming a user! What you're about to do can save up to three lives — that's pretty amazing.</p>






                    <h1 class="web_text"><strong>Find Donors in your Area</strong></h1>

                    <p class="donec_text"> Get connected in a matter of minutes at zero cost. Our App ships with a
                        smart system that
                        finds the closest blood donors. Our automated blood donation system works efficiently
                        whenever someone needs a blood transfusion.</p>

                    <br>
                    {{--                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">--}}
                    {{--                        <div class="img-box">--}}
                    {{--                            <figure><img src="{{url('frontend/images/Donate_blood_save_life.jpg')}}" alt="img"--}}
                    {{--                                         style=""></figure>--}}
                    {{--                        </div>--}}
                @endif
            </div>
        </div>
        </div>
        </div>
    </section>
    <div class="choose_section_2">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="power">
                        <div class="icon"><a href="#"><img src="{{url('frontend/images/optimised-icon.png')}}"></a>
                        </div>
                        <h2 class="totaly_text">Register</h2>
                        <p class="making">
                            Register your account so you can immediately start using.After Register you can view all the
                            blood donors available</p>
                    </div>
                    {{--                    <div class="btn_main">--}}
                    {{--                        <button type="button" class="read_bt"><a href="#">Read More</a></button>--}}
                    {{--                    </div>--}}
                </div>
                <div class="col-sm-4">
                    <div class="power">
                        <div class="icon"><a href="#"><img src="{{url('frontend/images/icon-6.png')}}"></a>
                        </div>
                        <h2 class="totaly_text"> Post a Blood request</h2>
                        <p class="making">Post a blood request using this website or our app and connect to volunteer
                            blood donors closest to your location.
                        </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="power">
                        <div class="icon"><a href="#"><img src="{{url('frontend/images/headfone-icon.png')}}"></a>
                        </div>
                        <h2 class="totaly_text"> Get notified</h2>
                        <p class="making"> Get notified in real time when a donor has been found and when the volunteer
                            blood donor is on their way to the patient hospital.
                        </p>
                    </div>
                </div>
                <br>
                <h1 class="web_text"><strong>Made for Everyone</strong></h1>
                <hr>
                <p>
                    All you need to do is send a text message to 8655, "blood need (blood-group) in
                    (your-city)", in
                    any language you want. Our system is smart enough to understand anything you write and helps
                    you
                    find a donor within minutes if not seconds.</p>


                <div class="col-sm-4">
                    <div class="dedicated">
                        <div class="icon"><a href="#"><img src="{{url('frontend/images/icon-3.png')}}"></a></div>
                        <h2 class="hosting_text">Forever Free</h2>
                        <p class="justo_text">Save Life Connect is free to use! Together we help save lives in our
                            neighborhood & keep
                            safe.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dedicated">
                        <div class="icon"><a href="#"><img src="{{url('frontend/images/icon-2.png')}}"></a></div>
                        <h2 class="hosting_text">Save a Life</h2>
                        <p class="justo_text"> Donating or requesting blood share the same noble and final purpose,
                            Saving a Life
                        </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dedicated">
                        <div class="icon"><a href="#"><img src="{{url('frontend/images/icon-4.png')}}"></a></div>
                        <h2 class="hosting_text">Easy to use</h2>
                        <p class="justo_text"> Donating or requesting blood share the same noble and final purpose,
                            Saving a Life
                        </p>
                    </div>
                </div>

                <h1 class="web_text"><strong>You are someone's Hero</strong></h1>

                <p>

                    In as little as few minutes, you can become someone's unnamed, unknown, but all-important
                    Hero. Saving a life is a noble work that starts very simply and easily. Donate Blood or
                    donate Money, every form of contribution you make is important, valued and essential in our
                    shared mission to save lives.
                </p>
            </div>
        </div>
    </div>

@endsection

