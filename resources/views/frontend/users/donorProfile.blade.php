@extends('frontend.master.master')
@section('profile')



    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Welcome {{Auth::guard('web')->user()->user_username}}</h2>
                @include('backend.layouts.message')

                <h4>
                    This is
                    <td>{{$profileData->donor_name}}</td>'s profile
                </h4>
                <hr>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Donor_Name</th>
                        <th>Address</th>
                        <th>Blood_Type</th>
                        <th>Sex</th>
{{--                        <th>User_name</th>--}}
                        <th>Phone_no.</th>
                        <th>email</th>
{{--                        <th>symptoms</th>--}}
                        <th>created_at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="panel-body">

                        <td>{{$profileData->postedBy->user_username}}</td>

                        <td>{{$profileData->address}}</td>
                        <td>{{$profileData->bloodtype}}</td>
                        <td>{{$profileData->sex}}</td>
{{--                        <td>{{$profileData->donatedBy->name}}</td>--}}
                        <td>{{$profileData->phone}}</td>
                        <td>{{$profileData->postedBy->user_email}}</td>
{{--                        <td>{{$profileData->donatedBy->symptoms}}</td>--}}
                        <td>{{$profileData->postedBy->created_at->diffForHumans()}}</td>
                        <td>
                            <form action="{{route('update-donor-status')}}" method="post">
                                @csrf
                                <input type="hidden" name="criteria" value="{{$profileData->id}}">

                                @if($profileData->status==1)
                                    <button class="btn-xs btn-danger" name="active" >Booked</button>

                                @else
                                    <button class="btn-xs bnt btn-success" name="inactive" disabled><i class="fa fa-times"></i>Open
                                    </button>

                                @endif
                            </form>
                        </td>
                    </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
