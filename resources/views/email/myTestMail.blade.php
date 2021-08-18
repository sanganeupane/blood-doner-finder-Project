<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>BloodBank.com</title>
</head>
<body>
<h1>{{ $details['title'] }}</h1>
<p>{{ $details['body'] }}</p>
<p>{{ $details['token'] }}</p>


<p>{{ $details['email'] }}</p>
<p>{{ $details['phone'] }}</p>

{{-- <form action="{{route('decision')}}" method="post"> --}}
    <form action="{{ route('decision') }}" method="post" id="">
        {{ csrf_field() }}
        <input type="hidden" name="email2" value="{{$details['email']}}">

<a href="http://127.0.0.1:8000/users/decision?_token={{$details['token']}}&email={{$details['email']}}&phone={{$details['phone']}} ">


    {{-- <input type="text" value="hello"> --}}
    <button class="btn btn-success btn-sm" type="submit">verify</button>
</a>
</form>
<p>Thank you</p>
</body>
</html>
