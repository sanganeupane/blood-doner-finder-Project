
@extends('frontend.master.master')
@section('login_user')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Login User</h3>
                @include('backend.layouts.message')

                <hr>
                <form action="{{route('login')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="user_email"> user_email</label>
                        <a style="color:red;">{{$errors->first('user_email')}}</a>
                        <input type="text" name="user_email" class="form-control" placeholder="enter user email" value="{{old('user_email')}}"  id="user_email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <a style="color:red;">{{$errors->first('password')}}</a>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}"  id="password">
                    </div>
                    <br>
                    <div class ="form-group-sm">
                        <button class="btn btn-danger">Add</button>
                    </div>

                    <a href="" class="nav-item nav-link"><p style="color: red">Forgot_password</p></a>

                </form>


            </div>
        </div>
    </div>

@endsection
