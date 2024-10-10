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
                            <h3 class="card-title">Add New Student</h3>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>First Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('name') }}"required name="name" placeholder="Enter First name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Last Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('last_name') }}"required name="last_name" placeholder="Enter Last name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Admission Number <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('admission_number') }}"required name="admission_number" placeholder="Enter Admission Number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Roll Number <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('roll_number') }}"name="roll_number" placeholder="Enter Roll Number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Class <span style="color: red;">*</span></label>
                                       <select class="form-control" required name="class_id">
                                            <option value="">Select Class</option>
                                            @foreach($getClass as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                       </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Gender <span style="color: red;">*</span></label>
                                       <select class="form-control" required name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>D.O.B <span style="color: red;">*</span></label>
                                        <input type="date" class="form-control" value="{{ old('date_of_birth') }}"name="date_of_birth" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Caste <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('caste') }}"required name="caste" placeholder="Enter Caste">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Religion <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('religion') }}" name="religion" placeholder="Enter Religion">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Mobile Number <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('mobile_number') }}" name="mobile_number" placeholder="Enter Mobile Number">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Admission Date <span style="color: red;">*</span></label>
                                        <input type="date" class="form-control" value="{{ old('admission_date') }}"name="admission_date" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Profile Pic <span style="color: red;"></span></label>
                                        <input type="file" class="form-control" name="profile_pic">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Blood Group <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('blood_group') }}"name="blood_group" placeholder="Enter Blood Group">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>height <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('height') }}"name="height" placeholder="Enter height">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>weight <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('weight') }}"name="weight" placeholder="Enter weight">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Status <span style="color: red;">*</span></label>
                                       <select class="form-control" required name="status">
                                            <option value="">Select Status</option>
                                            <option value="0">Active</option>
                                            <option value="1">Inactive</option>
                                       </select>
                                    </div>

                                </div>

                                <br/>
                                <div class="form-group">
                                    <label>Email address <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" value="{{ old('email') }}" required name="email" placeholder="Enter email">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Password <span style="color: red;">*</span></label>
                                    <input type="password" class="form-control" required name="password" placeholder="Password">
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
