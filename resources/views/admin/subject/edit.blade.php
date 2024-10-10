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
                            <h3 class="card-title">Edit New Subject</h3>
                        </div>
                        <form action="" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Subject Name</label>
                                    <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}" required name="name" placeholder="Enter Class name">
                                </div>
                                <div class="form-group">
                                    <label>Subject Type</label>
                                    <select class="form-control" name="type">
                                        <option {{ ($getRecord->type == 0) ? 'selected' : ''}} value="Theory">Theory</option>
                                        <option {{ ($getRecord->type == 0) ? 'selected' : ''}} value="Practical">Practical</option>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option {{ ($getRecord->status == 0) ? 'selected' : ''}} value="0">Active</option>
                                        <option {{ ($getRecord->status == 1) ? 'selected' : ''}} value="1">Inactive</option>
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
