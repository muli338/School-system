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
                            <h3 class="card-title">Edit New Assign Teacher</h3>
                        </div>
                        <form action="" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Class Name</label>
                                    <select class="form-control" required name="class_id">
                                        <option value="">Select Class</option>
                                        @foreach($getClass as $class)
                                        <option {{ ($getRecord->class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Teacher Name</label>
                                    <select class="form-control" required name="teacher_id">
                                        <option value="">Select Teacher</option>
                                        @foreach($getTeacher as $teacher)
                                        <option {{ ($getRecord->teacher_id == $teacher->id) ? 'selected' : '' }} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Active</option>
                                        <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                    </select>
                                    
                                </div>
                               
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
