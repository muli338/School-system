@extends('layouts.app')

@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign Class Teacher</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/assign_class_teacher/add') }}" class="btn btn-primary">Add new Assign Class teacher</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
                    <!-- Your form starts here -->
                    <div class="card">
                    <div class="card-header">
                <h3 class="card-title">Search Assign Teacher</h3>
              </div>
                        <form action="" method="get">
                            <div class="card-body">
                               <div class="row">
                               <div class="form-group col-md-3">
                                    <label>Class Name</label>
                                    <input type="text" class="form-control" value="{{ Request::get('class_name')}}" name="class_name" placeholder="Enter Class name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Teacher Name</label>
                                    <input type="text" class="form-control" value="{{ Request::get('teacher_name')}}" name="teacher_name" placeholder="Enter Teacher name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Date</label>
                                    <input type="date" class="form-control" value="{{ Request::get('date')}}" name="date">
                                </div>
                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                    <a href="{{ url('admin/assign_class_teacher/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                </div>
                               </div>
                            </div>
                         
                        </form>
                    </div>
            
           
            <!-- /.card -->
            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Assign Class Teacher List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Class Name</th>
                      <th>Teacher Name</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                      <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->class_name }}</td>
                        <td>{{ $value->teacher_name }}</td>
                        <td>
                          @if( $value->status == 0)
                          Active
                          @else
                          Inactive
                          @endif
                        </td>
                        <td>{{ $value->created_by_name }}</td>
                        <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                        <td>
                          <a href="{{ url('admin/assign_class_teacher/edit/'.$value->id )}}" class="btn btn-primary">Edit</a>
                          <a href="{{ url('admin/assign_class_teacher/edit_single/'.$value->id )}}" class="btn btn-primary">Edit Single</a>
                          <a href="{{ url('admin/assign_class_teacher/delete/'.$value->id )}}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      @endforeach
             
                  </tbody>
                </table>
                <div style="float: right;">
                {!! $getRecord->links() !!}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection