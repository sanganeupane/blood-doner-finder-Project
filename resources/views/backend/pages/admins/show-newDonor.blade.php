@extends('backend.master.master')
@section('showBloodUser')
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box-body">
                    {{--                <h3>Hello {{Auth::guard('web')->user()->user_name}}</h3>--}}
                    <div class="row">
                        <div class="col-md-8">
                            {{--                            <form action="">--}}
                            {{--                                <div class="row">--}}
                            {{--                                    <div class="form-group">--}}
                            {{--                                        @csrf--}}
                            {{--                                        <input type="text" name="search" class="form-control"--}}
                            {{--                                               placeholder="Search admin users">--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="form-group">--}}
                            {{--                                        <button class="btn btn-primary">Search</button>--}}
                            {{--                                    </div>--}}

                            {{--                                </div>--}}
                            {{--                            </form>--}}

                            @include('backend.layouts.message')

                            {{--                        Welcome : {{Auth::guard('questionnaire')->user()->User_name}}<br>--}}
                            <h1>New Donor want to Donate Blood Record</h1>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>new_donor_name</th>
                                    <th>middle_name</th>
                                    <th>last_name</th>
                                    <th>email</th>
                                    <th>phone_no.</th>
                                    <th>food_items</th>
                                    <th>image</th>
                                    <th>status</th>
                                    <th>created_at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                <div class="panel-body">

                                    {{--                                    Posted_by: {{ $user->postedBy->user_email }}--}}
                                    {{--                                    Your phone number is: {{ $donorData->address }}--}}
                                </div>

                                {{--                            @if(\Illuminate\Support\Facades\Auth::guard('web')->user()){--}}

                                @foreach($newDonorData as $key=>$donorData)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$donorData->first_name}}</td>
                                        <td>{{$donorData->middle_name}}</td>
                                        <td>{{$donorData->last_name}}</td>
                                        <td>{{$donorData->email}}</td>
                                        <td>{{$donorData->phone}}</td>
                                        <td>{{$donorData->food}}</td>
                                        <td>
                                            <img src="{{url('uploads/newuser/'.$donorData->image)}}" width="60px" alt="">
                                        </td>
                                        <td>{{$donorData->status}}</td>
                                        <td>{{$donorData->created_at->diffForHumans()}}</td>


{{--                                        <td>--}}
{{--                                            <form action="{{route('update-bloodUser-status')}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <input type="hidden" name="criteria" value="{{$user->id}}">--}}

{{--                                                @if($user->status==1)--}}
{{--                                                    <button class="btn-xs btn-success" name="active"><i--}}
{{--                                                            class="fa fa-check"></i></button>--}}

{{--                                                @else--}}
{{--                                                    <button class="btn-xs bnt btn-danger" name="inactive"><i--}}
{{--                                                            class="fa fa-times"></i></button>--}}

{{--                                                @endif--}}
{{--                                            </form>--}}
{{--                                        </td>--}}




                                        <td>
                                            <a href="
{{--{{route('edit-donor').'/'.$donor->id}}--}}
                                                ">
                                                <button class="btn-xs btn-danger" name="criteria"><i
                                                        class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="
{{route('delete-newDonor-user').'/'.$donorData->id }}
                                                ">
                                                <button class="btn-xs btn-primary" name="criteria"><i
                                                        class="fa fa-trash"></i>
                                                </button>

                                            </a>

                                        </td>
{{--                                    </tr>--}}
                                @endforeach

                                </tbody>
                            </table>
{{--                            {{ $userData->links() }}--}}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection


