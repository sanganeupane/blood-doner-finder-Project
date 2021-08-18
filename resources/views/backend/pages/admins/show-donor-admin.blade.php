@extends('backend.master.master')
@section('showDonorAdmin')


    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            @include('backend.layouts.message')
                            <h1>Donated blood by the donors record</h1>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Donor Name</th>
                                    <th>Address</th>
                                    <th>Blood_Type</th>
                                    <th>Sex</th>
                                    <th>status</th>
                                    <th>Posted by</th>
                                    <th>created at</th>
{{--                                    <th>donor name</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($donorData as $key=>$doner)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$doner->donor_name}}</td>
                                        <td>{{$doner->address}}</td>
                                        <td>{{$doner->bloodtype}}</td>
                                        <td>{{$doner->sex}}</td>
                                        <td>
                                            <form action="{{route('update-donorAdmin-status')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="criteria" value="{{$doner->id}}">

                                                @if($doner->status==1)
                                                    <button class="btn-xs btn-danger" name="active"><i
                                                            class="fa fa-check">booked</i></button>

                                                @else
                                                    <button class="btn-xs bnt btn-success" name="inactive"><i
                                                            class="fa fa-times">viewing</i></button>

                                                @endif
                                            </form>
                                        </td>
                                        <td>{{$doner->postedBy->user_username}}</td>
                                        <td>{{$doner->postedBy->created_at->diffForHumans()}}</td>
{{--                                        <td>{{$doner->donatedBy->name}}</td>--}}
                                        <td>
                                            <a href="
{{--{{route('edit-donor').'/'.$donor->id}}--}}
                                                ">
                                                <button class="btn-xs btn-danger" name="criteria"><i
                                                        class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="
{{route('delete-donor-user').'/'.$doner->id }}
                                                ">
                                                <button class="btn-xs btn-primary" name="criteria"><i
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
                            {{ $donorData->links() }}

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
