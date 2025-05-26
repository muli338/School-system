@extends('layouts.app')

@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent List (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/parent/add') }}" class="btn btn-primary">Add new Parent</a>
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
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="{{ Request::get('name')}}" name="name" placeholder="Enter name">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Email address</label>
                                    <input type="text" class="form-control" value="{{ Request::get('email')}}" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Mobile Number</label>
                                    <input type="text" class="form-control" value="{{ Request::get('mobile_number')}}" name="mobile_number" placeholder="Enter Mobile Number">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                            <option value="">Select Gender</option>
                                            <option {{ (Request::get('gender') == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                                            <option {{ (Request::get('gender') == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                                            <option {{ (Request::get('gender') == 'Other') ? 'selected' : ''}} value="Other">Other</option>
                                       </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option {{ (Request::get('status') == '0') ? 'selected' : ''}} value="0">Active</option>
                                            <option {{ (Request::get('status') == '1') ? 'selected' : ''}} value="1">Inactive</option>
                                       </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Date</label>
                                    <input type="date" class="form-control" value="{{ Request::get('date')}}" name="date">
                                </div>
                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                    <a href="{{ url('admin/parent/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                </div>
                               </div>
                            </div>
                         
                        </form>
                    </div>
           
            <!-- /.card -->
            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Parent List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile pic</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Phone</th>
                      <th>Occupation</th>
                      <th>Address</th>
                      <th>Status</th>
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
                        <img src="{{ $value->getProfile() }}" style="height: 50px; weight: 50px; border-radius: 50px;">
                        @endif
                      </td>
                      <td>{{ $value->name }} {{ $value->last_name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->gender}}</td>
                      <td>{{ $value->mobile_number}}</td>
                      <td>{{ $value->occupation}}</td>
                      <td>{{ $value->address}}</td>
                      <td>
                        @if( $value->status == 0)
                        Active
                        @else
                        Inactive
                        @endif
                      </td>
                      <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                      <td>
                        <a href="{{ url('admin/parent/edit/'.$value->id )}}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('admin/parent/delete/'.$value->id )}}" class="btn btn-danger">Delete</a>
                        <a href="{{ url('admin/parent/my_student/'.$value->id )}}" class="btn btn-primary">My Student</a>
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