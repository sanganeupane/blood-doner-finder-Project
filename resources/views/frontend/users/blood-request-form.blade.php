@extends('frontend.master.master')
@section('register')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="content-header">
                    <h1><br>
                        Make Blood Request
                    </h1>
                    <hr>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        @include('backend.layouts.message')


                                        <form action="{{route('add-blood-request')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">enter your name</label>
                                                <a style="color:red;">{{$errors->first('name')}}</a>
                                                <input type="text" name="name" class="form-control-sm"
                                                       placeholder="Enter name" value="{{old('name')}}"
                                                       id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="hospital_name">enter hospital name</label>
                                                <a style="color:red;">{{$errors->first('hospital_name')}}</a>
                                                <input type="text" name="hospital_name" class="form-control-sm"
                                                       placeholder="First hospital_name "
                                                       value="{{old('hospital_name')}}"
                                                       id="hospital_name">
                                            </div>

                                            <div class="form-group">
                                                <label for="hospital_location">enter hospital location</label>
                                                <a style="color:red;">{{$errors->first('hospital_location')}}</a>
                                                <input type="text" name="hospital_location" class="form-control-sm"
                                                       placeholder="First hospital location "
                                                       value="{{old('hospital_location')}}"
                                                       id="hospital_location">
                                            </div>

                                            <div class="form-group">
                                                <label for="contact_number">enter contact number</label>
                                                <a style="color:red;">{{$errors->first('contact_number')}}</a>
                                                <input type="text" name="contact_number" class="form-control-sm"
                                                       placeholder="contact number"
                                                       value="{{old('contact_number')}}"
                                                       id="contact_number">
                                            </div>

                                            <div class="form-group-sm">
                                                <label for="pint">Required pint</label>
                                                <a style="color:red;">{{$errors->first('pint')}}</a>
                                                <input type="text" name="pint" class="form-control-sm"
                                                       placeholder="pint"
                                                       value="{{old('pint')}}"
                                                       id="pint">
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

                                            <div class="row form-group">
                                                <label for="bloodtype"></label>
                                                <a style="color:red;">{{$errors->first('bloodtype')}}</a>
                                                <select class="form-control" name="bloodtype" id="bloodtype">
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
                                            <div class="form-group-sm">
                                                <label for="date">Required date</label>
                                                <a style="color:red;">{{$errors->first('date')}}</a>
                                                <input type="date" name="date" class="form-control-sm"
                                                       placeholder="date"
                                                       value="{{old('date')}}"
                                                       id="date">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success" onclick="getLocation()">Add-user
                                                </button>
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
