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
                            <h1>Blood Finder User Table</h1>


                            {{--                        Welcome : {{Auth::guard('questionnaire')->user()->User_name}}<br>--}}
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>User Name</th>
                                    <th>username</th>
                                    <th>user-email</th>
                                    <th>status</th>
                                    <th>created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                <div class="panel-body">

                                    {{--                                    Posted_by: {{ $user->postedBy->user_email }}--}}
                                    {{--                                    Your phone number is: {{ $donorData->address }}--}}
                                </div>

                                {{--                            @if(\Illuminate\Support\Facades\Auth::guard('web')->user()){--}}

                                @foreach($userData as $key=>$user)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$user->user_name}}</td>
                                        <td>{{$user->user_username}}</td>
                                        <td>{{$user->user_email}}</td>


                                        <td>
                                            <form action="{{route('update-bloodUser-status')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="criteria" value="{{$user->id}}">

                                                @if($user->status==1)
                                                    <button class="btn-xs btn-success" name="active"><i
                                                            class="fa fa-check"></i></button>

                                                @else
                                                    <button class="btn-xs bnt btn-danger" name="inactive"><i
                                                            class="fa fa-times"></i></button>

                                                @endif
                                            </form>
                                        </td>


                                        <td>{{$user->created_at->diffForHumans()}}</td>


                                        <td>
{{--                                            <a href="--}}
{{--{{route('edit-donor').'/'.$donor->id}}--}}
{{--                                                ">--}}
{{--                                                <button class="btn-xs btn-danger" name="criteria"><i--}}
{{--                                                        class="fa fa-edit"></i>--}}
{{--                                                </button>--}}
{{--                                            </a>--}}
                                            <a href="
                                                    {{route('delete-blood-user').'/'.$user->id }}
                                                ">
                                                <button class="btn-xs btn-danger" name="criteria"><i
                                                        class="fa fa-trash"></i>
                                                </button>

                                            </a>

                                        </td>
                                    </tr>
                                @endforeach

                                {{--                            @else{--}}
                                {{--                            <a href="{{route('login')}}" class="nav-item nav-link">login</a>--}}
                                {{--                            }--}}
                                {{--                            @endif--}}
                                </tbody>
                            </table>
                            {{ $userData->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>



@endsection


