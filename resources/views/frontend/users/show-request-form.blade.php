@extends('frontend.master.master')

@section('user')
    <div class="container">
        <div class="row">
            <div class="col-md-12"><br><br>
                @include('backend.layouts.message')
                <h1>Recent Requests..</h1>
                <hr>

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
                        <th>name</th>
                        <th>hospital_name</th>
                        <th>hospital_location</th>
                        <th>contact_number</th>
                        <th>pint</th>
                        <th>Gender</th>
                        <th>bloodtype</th>
                        <th>Required date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="panel-body">
                                            @foreach($usersData as $key=>$user)
                                                <tr>
                                                    <td>{{++$key}}</td>

                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->hospital_name}}</td>
                                                    <td>{{$user->hospital_location}}</td>
                                                    <td>{{$user->contact_number}}</td>
                                                    <td>{{$user->pint}}</td>
                                                    <td>{{$user->sex}}</td>
                                                    <td>{{$user->bloodtype}}</td>
                                                    <td>{{$user->date}}</td>


                                                </tr>
                                        @endforeach
                    </tbody>
                </table>
                                {{$usersData->links()}}
                <br>
            </div>
        </div>
    </div>


@endsection

