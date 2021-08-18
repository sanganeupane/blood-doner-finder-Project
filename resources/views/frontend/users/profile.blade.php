@extends('frontend.master.master')
@section('profile')



    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Welcome {{Auth::guard('web')->user()->user_username}}</h3>
                @include('backend.layouts.message')

                <hr>
                @if(\Illuminate\Support\Facades\Auth::guard('questionnaire')->user())
                    <a class="btn btn-sm btn-success" href="{{route('show-donor')}}" role="button">View_donor_profile</a>
                @else
                    <a class="btn btn-sm btn-info" href="{{route('new-donor')}}" role="button">SignUp_to_donate_blood</a>

                @endif

                @if(\Illuminate\Support\Facades\Auth::guard('questionnaire')->user())
                    <a class="btn btn-sm btn-info" href="{{route('logout')}}" role="button">logout_from_donors</a>
                @else
                    <a class="btn btn-sm btn-danger" href="{{route('questionnaire')}}" role="button">Login_to_donate_blood</a>

                @endif

          <hr>
                <h3>
                    your id : {{Auth::guard('web')->user()->id}}<br>
                    your name is: {{Auth::guard('web')->user()->user_name}}<br>
                    your User name: {{Auth::guard('web')->user()->user_username}}<br>
                    your email: {{Auth::guard('web')->user()->user_email}}<br>
                    Created date: {{Auth::guard('web')->user()->created_at}}<br>

                </h3>
                <a href="{{route('edit-blood-user').'/'.$user->id}}">
                    <button class="btn-sm btn-danger" name="criteria" ><i class="fa fa-edit">edit_profile</i>
                    </button><br>
                </a><br>
            </div>

        </div>
    </div>








@endsection
