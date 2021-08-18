
@extends('backend.master.master')
@section('content')

    <div class="content-wrapper">
    <section class="content-header">

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <form action="">
                            <div class="row">
                                <div class="form-group">
                                    @csrf
                                    <input type="text" name="search" class="form-control"
                                           placeholder="Search admin users">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Search</button>
                                </div>

                            </div>
                        </form>

                        @include('backend.layouts.message')

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Blood_Bank_Name</th>
                                <th>Blood_Bank_Address</th>
                                <th>Blood_Bank_Contact</th>
                                <th>Blood_Bank_Email</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usersData as $key=>$users)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$users->blood_bank_name}}</td>
                                <td>{{$users->blood_bank_location}}</td>
                                <td>{{$users->blood_bank_contact}}</td>
                                <td>{{$users->blood_bank_email}}</td>
                                <td>
                                    <img src="{{url('uploads/bloods/'.$users->image)}}" width="80px" height="80px" alt="">
                                </td>

                                <td>
                                    <a href="{{route('delete-admin-user').'/'.$users->id}}">
                                        <button class="btn-xs btn-primary" name="criteria"><i class="fa fa-trash"></i>
                                        </button>

                                    </a>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </section>
</div>
@endsection
