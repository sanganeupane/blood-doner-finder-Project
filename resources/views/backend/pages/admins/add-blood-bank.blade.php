
@extends('backend.master.master')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Blood Bank
            </h1>
            <hr>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('backend.layouts.message')


                                <form action="{{route('show-blood-bank')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="blood_bank_name">Blood Bank Name</label>
                                        <a style="color:red;">{{$errors->first('blood_bank_name')}}</a>
                                        <input type="text" name="blood_bank_name" class="form-control" placeholder="blood_bank_name" value="{{old('blood_bank_name')}}"  id="blood_bank_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="blood_bank_location">Blood Bank Location</label>
                                        <a style="color:red;">{{$errors->first('blood_bank_location')}}</a>
                                        <input type="text" name="blood_bank_location" class="form-control" placeholder="Enter blood bank location" value="{{old('blood_bank_location')}}"  id="blood_bank_location">
                                    </div>
                                    <div class="form-group">
                                        <label for="blood_bank_contact">Blood Bank Contact</label>
                                        <a style="color:red;">{{$errors->first('blood_bank_contact')}}</a>
                                        <input type="text" name="blood_bank_contact" class="form-control" placeholder="blood_bank_contact" value="{{old('blood_bank_contact')}}"  id="blood_bank_contact">
                                    </div>
                                    <div class="form-group">
                                        <label for="blood_bank_email">Blood Bank Email</label>
                                        <a style="color:red;">{{$errors->first('blood_bank_email')}}</a>
                                        <input type="text" name="blood_bank_email" class="form-control" placeholder="enter blood_bank_email" value="{{old('blood_bank_email')}}"  id="blood_bank_email">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <a style="color:red;">{{$errors->first('image')}}</a>
                                        <input type="file" name="image" class="form-control" placeholder="Your image" value="{{old('image')}}"  id="image">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success">Add Blood Bank</button>
                                    </div>

                                </form>


                            </div><!-- /.col -->

                        </div><!-- /.col -->
                    </div><!-- ./box-body -->

                </div><!-- /.box -->
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection
