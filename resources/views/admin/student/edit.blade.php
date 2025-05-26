@extends('layouts.app')

@section('title', 'Add Admin')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Your form starts here -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Student</h3>
                        </div>
                        @include('_message')
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
                                        <label>Admission Number <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('admission_number', $getRecord->admission_number) }}"required name="admission_number" placeholder="Enter Admission Number">
                                        <div style="color:red">{{ $errors->first('admission_number') }}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Roll Number <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('roll_number', $getRecord->roll_number) }}"name="roll_number" placeholder="Enter Roll Number">
                                        <div style="color:red">{{ $errors->first('roll_number') }}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Class <span style="color: red;">*</span></label>
                                       <select class="form-control" required name="class_id">
                                            <option value="">Select Class</option>
                                            @foreach($getClass as $value)
                                            <option {{ (old('class_id', $getRecord->class_id) == $value->id) ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                       </select>
                                       <div style="color:red">{{ $errors->first('class_id') }}</div>
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
                                        <label>D.O.B <span style="color: red;">*</span></label>
                                        <input type="date" class="form-control" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}"name="date_of_birth" required>
                                        <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Caste <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('caste', $getRecord->caste) }}"required name="caste" placeholder="Enter Caste">
                                        <div style="color:red">{{ $errors->first('caste') }}</div>
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
                                        <label>Admission Date <span style="color: red;">*</span></label>
                                        <input type="date" class="form-control" value="{{ old('admission_date', $getRecord->admission_date) }}"name="admission_date" required>
                                        <div style="color:red">{{ $errors->first('admission_date') }}</div>
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
                                        <label>Blood Group <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('blood_group', $getRecord->blood_group) }}"name="blood_group" placeholder="Enter Blood Group">
                                        <div style="color:red">{{ $errors->first('blood_group') }}</div>
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

                                    <div class="form-group col-md-6">
                                        <label>Status <span style="color: red;">*</span></label>
                                       <select class="form-control" required name="status">
                                            <option  value="">Select Status</option>
                                            <option  {{ (old('status', $getRecord->status) == 0) ? 'selected' : ''}} value="0">Active</option>
                                            <option  {{ (old('status', $getRecord->status) == 1) ? 'selected' : ''}} value="1">Inactive</option>
                                       </select>
                                       <div style="color:red">{{ $errors->first('status') }}</div>
                                    </div>

                                </div>

                                <br/>
                                <div class="form-group">
                                    <label>Email address <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" value="{{ old('email', $getRecord->email) }}" required name="email" placeholder="Enter email">
                                    <div style="color:red">{{ $errors->first('email') }}</div>
                                </div>
                                <div class="form-group">
                                    <label>Password <span style="color: red;"></span></label>
                                    <input type="text" class="form-control" name="password" placeholder="Password">
                                    <p>Due you want to cange your password? So please add a new password</p>
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
