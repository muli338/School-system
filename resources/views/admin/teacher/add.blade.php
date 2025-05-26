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
                            <h3 class="card-title">Add New Teacher</h3>
                        </div>
                        @include('_message')
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>First Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('name') }}"required name="name" placeholder="Enter First name">
                                        <div style="color: red;">{{ $errors->first('name') }}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Last Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('last_name') }}"required name="last_name" placeholder="Enter Last name">
                                        <div style="color:red">{{ $errors->first('last_number') }}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>D.O.B <span style="color: red;">*</span></label>
                                        <input type="date" class="form-control" value="{{ old('date_of_birth') }}"name="date_of_birth" required>
                                        <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>D.O.J <span style="color: red;">*</span></label>
                                        <input type="date" class="form-control" value="{{ old('date_of_joining') }}"name="date_of_joining" required>
                                        <div style="color:red">{{ $errors->first('date_of_joining') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Marital Status <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('marital_status') }}"required name="marital_status" placeholder="Enter Marital Status">
                                        <div style="color: red;">{{ $errors->first('marital_status') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                    <label>Qualification <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('qualification') }}"required name="qualification" placeholder="Enter Qualification">
                                        <div style="color: red;">{{ $errors->first('qualification') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                    <label>Work Experience <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('work_experience') }}"required name="work_experience" placeholder="Enter Work Experience">
                                        <div style="color: red;">{{ $errors->first('work_experience') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Current Address <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('address') }}"name="address" placeholder="Enter Current Address">
                                        <div style="color:red">{{ $errors->first('address') }}</div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Permanent Address <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('permanent_address') }}"required name="permanent_address" placeholder="Enter Permanent Address">
                                        <div style="color: red;">{{ $errors->first('permanent_address') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Gender <span style="color: red;">*</span></label>
                                       <select class="form-control" required name="gender">
                                            <option value="">Select Gender</option>
                                            <option {{ (old('gender') == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                                            <option {{ (old('gender') == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                                            <option {{ (old('gender') == 'Other') ? 'selected' : ''}} value="Other">Other</option>
                                       </select>
                                       <div style="color:red">{{ $errors->first('gender') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Mobile Number <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('mobile_number') }}" name="mobile_number" placeholder="Enter Mobile Number">
                                        <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Profile Pic <span style="color: red;"></span></label>
                                        <input type="file" class="form-control" name="profile_pic">
                                        <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Note <span style="color: red;"></span></label>
                                        <textarea class="form-control" name="note" placeholder="Enter Note">{{ old('note') }}</textarea>
                                        <div style="color:red">{{ $errors->first('note') }}</div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Status <span style="color: red;">*</span></label>
                                       <select class="form-control" required name="status">
                                            <option  value="">Select Status</option>
                                            <option  {{ (old('status') == 0) ? 'selected' : ''}} value="0">Active</option>
                                            <option  {{ (old('status') == 1) ? 'selected' : ''}} value="1">Inactive</option>
                                       </select>
                                       <div style="color:red">{{ $errors->first('status') }}</div>
                                    </div>

                                </div>

                                <br/>
                                <div class="form-group">
                                    <label>Email address <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" value="{{ old('email') }}" required name="email" placeholder="Enter email">
                                    <div style="color:red">{{ $errors->first('email') }}</div>
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
