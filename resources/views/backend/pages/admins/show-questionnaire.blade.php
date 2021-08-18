@extends('backend.master.master')
@section('questionnaire')

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
                            <hr>
                            <h1>Questionnaire Completed and Give permission to login to Donor</h1>

<hr>
                            {{--                        Welcome : {{Auth::guard('questionnaire')->user()->User_name}}<br>--}}
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Donor name</th>
                                    <th>image</th>
                                    <th>phone</th>
                                    <th>symptoms</th>
                                    <th>Authorize_to_be_donor</th>
                                    <th>Posted_by</th>
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

                                @foreach($questionnaireData as $key=>$questionnaire)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$questionnaire->name}}</td>
                                        <td>
                                            <img src="{{url('uploads/alreadyusers/'.$questionnaire->image)}}" width="90px" height="90px">
                                        </td>
                                        <td>{{$questionnaire->phone}}</td>
                                        <td>{{$questionnaire->symptoms}}</td>

                                        <td>
                                            <form action="{{route('update-questionnaire-status')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="criteria" value="{{$questionnaire->id}}">

                                                @if($questionnaire->status==1)
                                                    <button class="btn btn-sm btn-success" name="active"><i
                                                            class="fa fa-check"> Verified</i></button>

                                                @else
                                                    <button class="btn btn-sm bnt btn-danger" name="inactive"><i
                                                            class="fa fa-times"> Unauthenticated</i></button>

                                                @endif
                                            </form>
                                        </td>
                                        <td>{{$questionnaire->postedBy->user_name}}</td>
                                        <td>{{$questionnaire->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="
{{--{{route('edit-donor').'/'.$donor->id}}--}}
                                                ">
                                                <button class="btn-xs btn-danger" name="criteria"><i
                                                        class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="
{{route('delete-questionnaire-user').'/'.$questionnaire->id }}
                                                ">
                                                <button class="btn-xs btn-primary" name="criteria"><i
                                                        class="fa fa-trash"></i>
                                                </button>

                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $questionnaireData->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>



@endsection


