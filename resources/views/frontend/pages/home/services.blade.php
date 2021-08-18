@extends('frontend/master/master')
@section('services')




    <body onload="getLocation()">


    <script>
        var x, y;

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);

            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {

            document.getElementById('lat2').value = +position.coords.latitude;
            document.getElementById('lon2').value = +position.coords.longitude;
            var x = document.getElementById('lat2').value;
            var y = document.getElementById('lon2').value;
            console.log(x, y);

        }


    </script>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group"><br><br>

                    <form action="{{route('nearest')}}" method="get">
                        @csrf

                        <input type="hidden" name="lat2" id="lat2"/>

                        <input type="hidden" name="lon2" id="lon2"/>
                        <div class="col-sm-12" style="text-align: center;">
                            <button type="submit" class="btn btn-danger"> Click to search Nearest Donor from you
                            </button>
                        </div>

                    </form>
<br><br>
                    <div class="card-body" style="background-color: lightblue;">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br/>
                        @endif
                        <div class="card-title text-center"><h3>Status</h3></div>
                        <hr>

                            <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Donor_Name</th>
                                <th>Address</th>
                                <th>Blood_Type</th>
                                <th>Phone_no.</th>
                            </tr>
                            </thead>


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


                            <tbody id="myTable">
                            <script>


                                <?php
                                function abc($lat1, $long1, $lat2, $long2)
                                {
                                    $theta = $long1 - $long2;
                                    $miles = (sin(deg2rad($lat1))) * sin(deg2rad($lat2)) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
                                    $miles = acos($miles);
                                    $miles = rad2deg($miles);
                                    $result['miles'] = $miles * 60 * 1.1515;
                                    return $result;
                                }
                                ?>


                            </script>


                            @foreach($donerData as $key=>$doner)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        {{--                                    {{route('edit-admin-user').'/'.$users->id}}--}}
                                        <a href="{{route('donorProfile').'/'.$doner->id}}" class="nav-item nav-link"><p
                                                style="color: red">{{$doner->donor_name}}</p></a>
                                    </td>
                                    <td>{{$doner->address}}</td>
                                    <td>{{$doner->bloodtype}}</td>
                                    <td>{{$doner->phone}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div><br><br>
                </div>
            </div>
        </div>
    </div>
    </body>

@endsection












