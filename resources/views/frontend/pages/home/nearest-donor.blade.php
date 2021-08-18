@extends('frontend/master/master')
@section('nearest_donor')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif



    <div class="container">
        <div class="row">
            <div class="col-md-12"><br><br>
                <div class="card-body" style="background-color: lightblue;">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    @include('backend.layouts.message')
                    <div class="card-title text-center"><br>


                        <h1>Nearest Blood Donor</h1>
                    </div>
                    <hr>
                    <br>
                    <table class="table table-hover">

                        <strong>Search</strong><br>
                        <input class="form-control-sm" type="text" name="myInput1" id="myInput1" placeholder="location">
                        <input class="form-control-sm" type="text" name="myInput2" id="myInput2"
                               placeholder="bloodgroup">
                        <hr>
                        <br>
                        <script>
                            $(document).ready(function () {

                                $("#myInput1").on("keyup", function () {
                                    var value = $(this).val().toLowerCase();
                                    $("#myTable tr").filter(function () {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });

                                $("#myInput2").on("keyup", function () {
                                    var value = $(this).val().toLowerCase();
                                    $("#myTable tr").filter(function () {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            });


                        </script>
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Contactname</td>
                            <td>Location</td>
                            <td>bloodgroup</td>
                            <td>Distance_from your location</td>
                            <td>contactnumber</td>
                            <td>Action</td>
                        </tr>
                        </thead>


                        <tbody id="myTable">
                        <script>


                            <?php
                            function abc($lat1, $long1, $lat2, $long2)
                            {
                                $theta = $long1 - $long2;
                                $miles = (sin(deg2rad($lat1))) * sin(deg2rad($lat2)) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
                                $miles = acos($miles);
                                $miles = rad2deg($miles);
                                $result = $miles * 60 * 1.1515 * 1.60934;
                                return round($result, 2) . '  ' . 'Km';
                            }
                            ?>

                        </script>

                        <?php
                        use App\Models\User\User;
                        $users = User::where('id', '=', auth()->id());

                        ?>
                        @foreach($donerData as $key=>$doner)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>
                                    <a href="{{route('donorProfile').'/'.$doner->id}}" class="nav-item nav-link"><p
                                            style="color: red">{{$doner->donor_name}}</p></a>
                                </td>
                                <td>{{$doner->address}}</td>
                                <td>{{$doner->bloodtype}}</td>
                                <td>
                                    <?php

                                    $x1 = $doner->lat1;
                                    $y1 = $doner->lon1;

                                    print_r(abc($x1, $y1, $fromlat, $fromlon));
                                    ?>
                                </td>
                                <td>{{$doner->phone}}</td>


                                <td>
                                    <form action="{{route('sendEmail')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="email1" value="
{{$doner->email}}

                                            ">
                                            <input type="hidden" name="phone" value="{{$doner->phone}} ">

{{--                                        @foreach($users as $key=>$user)--}}
                                            <input type="hidden" name="email2" value="{{auth()->user()->user_email}}">
{{--                                        @endforeach--}}
                                        {{--                                            @if($profileData->status==1)--}}
                                        @if($doner->status==0)
                                        <button class="btn-xs btn-primary" name="active">send email</button>
                                        @else
                                        <button  disabled class="btn-xs btn-danger" name="active">Booked</button>
                                        @endif

                                        {{--                                            @else--}}


                                        {{--                                            @endif--}}
                                    </form>
                                </td>



                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <br><br>
    </div>

@endsection
