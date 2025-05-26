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
                            <h3 class="card-title">Edit Student</h3>
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
                                        <label>Gender <span style="color: red;">*</span></label>
                                       <select class="form-control" required name="gender">
                                            <option value="">Select Gender</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Other') ? 'selected' : ''}} value="Other">Other</option>
                                       </select>
                                       <div style="color:red">{{ $errors->first('gender') }}</div>
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
                                        <label>Occupation <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('occupation', $getRecord->occupation) }}"name="occupation">
                                        <div style="color:red">{{ $errors->first('occupation') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Address <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('address', $getRecord->address) }}"name="address">
                                        <div style="color:red">{{ $errors->first('address') }}</div>
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
