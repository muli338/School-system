@extends('layouts.app')

@section('title', 'Add Admin')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                @include('_message')
                    <!-- Your form starts here -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">My Account</h3>
                        </div>
                        
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>First Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}"required name="name" placeholder="Enter First name">
                                        <div style="color: red;">{{ $errors->first('name') }}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Last Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('last_name', $getRecord->last_name) }}"required name="last_name" placeholder="Enter Last name">
                                        <div style="color:red">{{ $errors->first('last_number') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>D.O.B <span style="color: red;">*</span></label>
                                        <input type="date" class="form-control" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}"name="date_of_birth" required>
                                        <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Religion <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('religion', $getRecord->religion) }}" name="religion" placeholder="Enter Religion">
                                        <div style="color:red">{{ $errors->first('religion') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Mobile Number <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('mobile_number', $getRecord->mobile_number) }}" name="mobile_number" placeholder="Enter Mobile Number">
                                        <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Profile Pic <span style="color: red;"></span></label>
                                        <input type="file" class="form-control" name="profile_pic">
                                        <div style="color:red">{{ $errors->first('profile_pic') }}</div>

                                        <!-- Display the user's profile picture if available -->
                                        @if(!empty($getRecord->getProfile()))
                                            <img src="{{ $getRecord->getProfile() }}" style="width: auto; height: 50px;">
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>height <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('height', $getRecord->height) }}"name="height" placeholder="Enter height">
                                        <div style="color:red">{{ $errors->first('height') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>weight <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('weight', $getRecord->weight) }}"name="weight" placeholder="Enter weight">
                                        <div style="color:red">{{ $errors->first('weight') }}</div>
                                    </div>

                                </div>

                                <br/>
                                <div class="form-group">
                                    <label>Email address <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" value="{{ old('email', $getRecord->email) }}" required name="email" placeholder="Enter email">
                                    <div style="color:red">{{ $errors->first('email') }}</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
