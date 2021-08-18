@extends('frontend.master.master')

@section('edit-blood-user')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="content-header">
                    <br><br>
                    <h2>
                        Edit user profile
                    </h2>

                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        @include('backend.layouts.message')



                                        <form action="{{route('edit-blood-user-action')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$userData->id }}">

                                            <div class="form-group">
                                                <label for="user_name">Name</label>
                                                <a style="color:red;">{{$errors->first('user_name')}}</a>
                                                <input type="text" name="user_name" class="form-control"
                                                       placeholder="First name"
                                                       value="{{$userData->user_name}}" id="user_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_username">Username</label>
                                                <a style="color:red;">{{$errors->first('user_username')}}</a>
                                                <input type="text" name="user_username" class="form-control"
                                                       placeholder="Enter username" value="{{$userData->user_username}}"
                                                       id="user_username">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_email">Email</label>
                                                <a style="color:red;">{{$errors->first('user_email')}}</a>
                                                <input type="text" name="user_email" class="form-control"
                                                       placeholder="user_email"
                                                       value="{{$userData->user_email}}" id="user_email">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary"><i class="fa fa-edit"></i>Edit-user
                                                </button>
                                                <br><br>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


@endsection
