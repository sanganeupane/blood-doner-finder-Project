
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>{{$title}}</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Login to Donor</h1>
{{--            @include('backend.layouts.message')--}}

            <hr>
            @if(Auth::guard('web')->user())

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            @include('backend.layouts.message')
                            <hr>
                            <form action="{{route('questionnaire')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="name">donor name</label>
                                    <a style="color:red;">{{$errors->first('name')}}</a>
                                    <input type="text" name="name" class="form-control" placeholder="Donor name" value="{{old('name')}}"  id="user_name">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <a style="color:red;">{{$errors->first('password')}}</a>
                                    <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}"  id="password">
                                </div>
                                <br>
                                <div class ="form-group">
                                    <button class="btn btn-danger">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


        </div>
    </div>
</div>

</body>
</html>
@else
    <p>Please Login first to register for blood donate
        <a href="{{route('login')}}" class="nav-item nav-link">login</a>
    </p>

@endif







