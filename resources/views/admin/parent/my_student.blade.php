@extends('layouts.app')

@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent Student List ({{ $getParent->name }} {{ $getParent->last_name }})</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
                    <!-- Your form starts here -->
                    <div class="card">
                    <div class="card-header">
                <h3 class="card-title">Search Parent</h3>
              </div>
                        <form action="" method="get">
                            <div class="card-body">
                               <div class="row">
                               <div class="form-group col-md-2">
                                    <label>Student ID</label>
                                    <input type="text" class="form-control" value="{{ Request::get('id')}}" name="id" placeholder="Enter Student ID">
                                </div>
                               <div class="form-group col-md-2">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="{{ Request::get('name')}}" name="name" placeholder="Enter name">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Email address</label>
                                    <input type="text" class="form-control" value="{{ Request::get('email')}}" name="email" placeholder="Enter email">
                                </div>
                           
                                <div class="form-group col-md-2">
                                    <label>Date</label>
                                    <input type="date" class="form-control" value="{{ Request::get('date')}}" name="date">
                                </div>
                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                    <a href="{{ url('admin/parent/my_student/' .$parent_id) }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                </div>
                               </div>
                            </div>
                         
                        </form>
                    </div>
           
            <!-- /.card -->
            @include('_message')

            @if(!empty($getSearchStudent))
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile pic</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent Name</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($getSearchStudent) && $getSearchStudent->count() > 0)
                      @foreach($getSearchStudent as $value)
                          <tr>
                            <td>{{ $value->id }}</td>
                            <td>
                              @if(!empty($value->getProfile()))
                              <img src="{{ $value->getProfile() }}" style="height: 50px; width: 50px; border-radius: 50px;">
                              @endif
                            </td>
                            <td>{{ $value->name }} {{ $value->last_name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->parent_name }}</td>
                            <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                            <td style="min-width: 150px;">
                              <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'. $parent_id)}}" class="btn btn-primary btn-sm">Add Student to Parent</a>
                            </td>
                          </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="11" class="text-center">No students found.</td>
                      </tr>
                    @endif
                    </tbody>
                </table>
                <div style="float: right;">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        @endif
        <div class="card-body p-0">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile pic</th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Parent Name</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($getRecord as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>
                        @if(!empty($value->getProfile()))
                            <img src="{{ $value->getProfile() }}" style="height: 50px; width: 50px; border-radius: 50px;">
                        @else
                            <img src="{{ asset('path/to/default/image.png') }}" style="height: 50px; width: 50px; border-radius: 50px;">
                        @endif
                    </td>
                    <td>{{ $value->name }} {{ $value->last_name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->parent_name }}</td>
                    <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                    <td style="min-width: 150px;">
                        <a href="{{ url('admin/parent/assign_student_parent_delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <div style="float: right;">
        <!-- Pagination links if applicable -->
    </div>
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