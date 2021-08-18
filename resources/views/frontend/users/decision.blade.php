


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Verify_to_donate_blood</title>
</head>
<body>
<br><br>            <br><br>


    <div class="container"
    style="background-color:rgb(231, 108, 59);"
     >
    <div class="row">
        <div class="col-md-6">
            <br>
            <br>


        <h1  style="background-color:rgb(185, 166, 58);">Verify To donate blood</h1>
            @include('backend.layouts.message')

        <hr>
<br>

        <h2 style='margin-left:156px' >Hello you have Blood Request....</h2><br>
        <h2  style='margin-left:156px'>want to accept Or deny the request  .....?</h2><hr><br>

    @include('backend.layouts.message')

    <div>

     <td>
            <form action="{{route('sendSeekerEmail')}}" method="post">
                {{-- <form action="{{route('decisionStatus')}}" method="post"> --}}


                @csrf
                {{-- <input type="text" name="email2" value="{{$user->email}}"> --}}
                <input type="hidden" name="seeker" value="{{$_GET['email']}}">
                <input type="hidden" name="phone" value="{{$_GET['phone']}}">
                <input type="hidden" name="criteria" value="{{$user->id}}">



                {{-- <input type="text" name="email2" value="{{$posts->email}}"> --}}
                {{-- <input type="text" name="id" value="{{$profileData->email}}"> --}}








    {{--
                seeker email: {{$profileData->email2}}<br>
                donor email: {{$profileData->email1}}<br>
                user email: {{$user->user_email}}<br>
                 {{-- email: {{Email::findOrFail(Auth::guard('web')->user()->id)}}; --}}
               {{-- @if($profileData->status==1) --}}
               <button class="btn btn-xs btn-info" name="active" style='margin-left:156px'>Accept the Request</button>
    {{-- @else --}}
                <button class="btn btn-xs btn-danger" name="inactive"   style='margin-left:156px'><i class="fa fa-times"></i> Reject the  request</button>

                {{-- @endif --}}
                <hr><br>
                <br>


            </form>

        </td>








    </div>
    </div>
    </div>
    </div>

</body>
</html>
