@extends('frontend/master/master')

@section('about')
    <div class="about_main layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="images">
                        <img src="{{url('frontend/images/blooddonation.jpg')}}" style="max-width: 80%;">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="right_section_main">
                        <br><br>
                        <h2 class="dolar_tetx"><strong style="color: #2ba879;">Donate Blood Save Life</strong></h2>
                        <h3> Blood transfusion saves lives and improves health, but millions of patients requiring
                            transfusion do not have timely access to safe blood. Many people die because safe blood
                            is not available even in some urban health-care facilities.
                            More than 81 million units of blood are collected globally every year. Only 45% of these
                            are donated in developing and transitional countries where more than 80% of the world’s
                            population lives.
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about end -->


    <div id="service" class="choose_section">
        <div class="container">
            <div class="col-sm-12">
                <h1 class="choose_text">Our<span class="color"> Service</span></h1>
                <p class="lorem_text">We provide facility for requesting and donating blood in the nearest hospital through our system. </p>
            </div>
        </div>
    </div>
    <div class="choose_section_2">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="about_inner">
                        <div class="icon"><a href="#"><img src="{{url('frontend/images/icon-1.png')}}"></a></div>
                        <h2 class="hosting_text">Making Blood Request</h2>
                        <p class="making">.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="about_inner">
                        <div class="icon"><a href="#"><img src="{{url('frontend/images/icon-2.png')}}"></a></div>
                        <h2 class="hosting_text">Becoming Blood Donor</h2>
                        <p class="justo_text"></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="about_inner">
                        <div class="icon"><a href="#"><img src="{{url('frontend/images/icon-3.png')}}"></a></div>
                        <h2 class="hosting_text">Finding Nearest Blood Donor</h2>
                        <p class="making">.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
