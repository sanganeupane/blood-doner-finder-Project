@extends('frontend.master.master')

@section('user')
    <div class="container">
        <div class="row">
            <div class="col-md-12"><br><br>
                <h1>Welcome "{{Auth::guard('web')->user()->user_name}}" feel free to connect us</h1>
                @include('backend.layouts.message')
                <hr>
                <div class="form-group">
                    <button class="btn btn-success btn-xs"> <a href="{{route('login-donor')}}">Already Registered as Donor</a></button>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm"> <a href="{{route('new-donor')}}">New Donor</a></button>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger btn-xs"> <a href="{{route('add-blood-request')}}">Request Blood</a></button>
                </div>

<br>


{{-- 
                @if(Auth::guard('web')->user())

                    <a href="{{route('user-logout')}}" class="nav-item nav-link">logout</a>
                @else
                    <a href="{{route('login')}}" class="nav-item nav-link">login</a>
                @endif --}}


                <form action="">
                    <div class="row">
                        <div class="form-group">
                            @csrf
                            <input type="text" name="search_donor" class="form-control"
                                   placeholder="search blood or address">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-xs">Search</button>
                        </div>

                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Donor_Name</th>
                        <th>Address</th>
                        <th>Blood_Type</th>
{{--                        <th>Sex</th>--}}
{{--                        <th>User_name</th>--}}
                        <th>Phone_no.</th>
{{--                        <th>donated_by</th>--}}
                        <th>created_at</th>
                        {{--                        <th>symptoms</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="panel-body">
                        @foreach($donerData as $key=>$doner)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>
{{--                                    {{route('edit-admin-user').'/'.$users->id}}--}}
                                <a href="{{route('donorProfile').'/'.$doner->id}}" class="nav-item nav-link"><p style="color: red">{{$doner->donor_name}}</p></a>
                              </td>
                                <td>{{$doner->address}}</td>
                                <td>{{$doner->bloodtype}}</td>
{{--                                <td>{{$doner->sex}}</td>--}}
{{--                                <td>{{$doner->postedBy->user_username}}</td>--}}
                                <td>{{$doner->phone}}</td>
{{--                                <td>{{$doner->donatedBy->name}}</td>--}}
                                <td>{{$doner->postedBy->created_at->diffForHumans()}}</td>

                                {{--                                <td>{{$doner->donatedBy->symptoms}}</td>--}}
{{--                                <td>{{$doner->status}}</td>--}}
                                <td>

                                        @if($doner->status==1)
                                            <button class="bnt btn-xs btn-danger" name="active"><i class="fa fa-times"></i> Booked</button>

                                        @else
                                            <button class="bnt btn-xs bnt btn-success" name="inactive"> Book</button>

                                        @endif
                                </td>


                            </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$donerData->links()}}
                <br>
            </div>
        </div>
    </div>


@endsection

