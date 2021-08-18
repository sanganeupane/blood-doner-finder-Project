@extends('frontend.master.master')
@section('register')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="content-header">
                    <br><br>
                    <h2>
                        Register a new Donor
                    </h2>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        @include('backend.layouts.message')
                                        <form action="{{route('register')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="user_name">Name</label>
                                                <a style="color:red;">{{$errors->first('user_name')}}</a>
                                                <input type="text" name="user_name" class="form-control"
                                                       placeholder="First user_name" value="{{old('user_name')}}"
                                                       id="user_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <a style="color:red;">{{$errors->first('user_username')}}</a>
                                                <input type="text" name="user_username" class="form-control"
                                                       placeholder="Enter user_ username"
                                                       value="{{old('user_username')}}" id="user_username">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_email">Email</label>
                                                <a style="color:red;">{{$errors->first('user_email')}}</a>
                                                <input type="text" name="user_email" class="form-control"
                                                       placeholder="user_email" value="{{old('user_email')}}"
                                                       id="user_email">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <a style="color:red;">{{$errors->first('password')}}</a>
                                                <input type="password" name="password" class="form-control"
                                                       placeholder="enter password" value="{{old('password')}}"
                                                       id="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm_Password</label>
                                                <a style="color:red;">{{$errors->first('password_confirmation')}}</a>
                                                <input type="password" name="password_confirmation"
                                                       class="form-control"
                                                       placeholder="Confirm your password" value="{{old('password')}}"
                                                       id="password_confirmation">
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-success">Add-user</button>
                                            </div>
                                        </form>
                                    </div><!-- /.col -->
                                </div><!-- /.col -->
                            </div><!-- ./box-body -->
                        </div><!-- /.box -->
                    </div>
                </section><!-- /.content -->
            </div>
        </div>
    </div>


@endsection
