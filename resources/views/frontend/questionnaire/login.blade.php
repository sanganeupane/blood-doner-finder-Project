

@extends('frontend.master.master')
@section('newDonor')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="content-header">
                    <br><br>
                    <h2>
                        Answer the question to donate blood
                    </h2>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        @include('backend.layouts.message')
                                        <form action="{{route('login-donor')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">name</label>
                                                <a style="color:red;">{{$errors->first('name')}}</a>
                                                <input type="text" name="name" class="form-control-sm"
                                                       placeholder="First  name" value="{{old('name')}}"
                                                       id="name">
                                            </div>


                                            <div class="form-group">
                                                <label for="email">enter your email *</label>
                                                <a style="color:red;">{{$errors->first('email')}}</a>
                                                <input type="text" name="email" class="form-control-sm"
                                                       placeholder="e-mail" value="{{old('email')}}"
                                                       id="email">
                                            </div>



                                            <div class="form-group">
                                                <h3>Have you used covid-19 vaccine before 28 days....?</h3>
                                                <a style="color:red;">{{$errors->first('vaccine')}}</a>
                                                <div class="form-check">
                                                    <label class="form-check-label" for="vaccine">yes</label>
                                                    <input  type="radio" value="yes"
                                                           name="vaccine"
                                                           id="vaccine">
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label" for="vaccine">no</label>
                                                    <input type="radio" value="no"
                                                           name="vaccine"
                                                           id="vaccine">
                                                </div>
                                            </div>


                                            <br>
                                            <div class="form-group">
                                                <label for="image">send us your hospital reports to verify your
                                                    account</label>
                                                <a style="color:red;">{{$errors->first('image')}}</a>
                                                <input type="file" name="image" class="form-control-sm"
                                                       placeholder="Your image" value="{{old('image')}}" id="image">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="phone">mobile number *</label>
                                                <a style="color:red;">{{$errors->first('phone')}}</a>
                                                <input type="text" name="phone" class="form-control-sm"
                                                       placeholder="Eg: 98********" value="{{old('phone')}}"
                                                       id="phone">
                                            </div>


                                            <div class="form-group">

                                                <label> <a style="color:red;">{{$errors->first('symptoms')}}</a>

                                                    <strong>what are the symptoms you are facing
                                                        now</strong></label><br>
                                                <label><input type="checkbox" name="symptoms[]" value="runny_nose">runny_nose</label>
                                                <label><input type="checkbox" name="symptoms[]" value="headache">
                                                    headache</label>
                                                <label><input type="checkbox" name="symptoms[]" value="HIV">HIV</label>
                                                <label><input type="checkbox" name="symptoms[]"
                                                              value="aching">aching</label>
                                                <label><input type="checkbox" name="symptoms[]"
                                                              value="cough">cough</label>
                                            </div>


                                            <div class="form-group">
                                                <label for="password">confirm password</label>
                                                <a style="color:red;">{{$errors->first('password')}}</a>
                                                <input type="password"
                                                       name="password"
                                                       class="form-control-sm"
                                                       placeholder="confirm_password"
                                                       value=""
                                                       id="password">
                                            </div>


                                            <div class="form-group">
                                                <button class="btn btn-success">Add-user</button>
                                                <br><br>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
            </div>
        </div>
    </div>


@endsection


