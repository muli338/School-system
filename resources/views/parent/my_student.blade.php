@extends('layouts.app')

@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Student</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
                    <!-- Your form starts here -->
           
            <!-- /.card -->
            @include('_message')

            <div class="card">
            <div class="card-header">
                <h3 class="card-title">My Student</h3>
              </div>
    <div class="card-body p-0" style="overflow: auto;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Profile Pic</th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Admission Number</th>
                <th>Roll Number</th>
                <th>Class</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Caste</th>
                <th>Religion</th>
                <th>Mobile Number</th>
                <th>Admission Date</th>
                <th>Blood Group</th>
                <th>height</th>
                <th>Weight</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($getRecord as $value)
                <tr>
                    <td>
                        @if(!empty($value->getProfile()))
                        <img src="{{ $value->getProfile() }}" style="height: 50px; weight: 50px; border-radius: 50px;">
                        @endif
                      </td>
                      <td>{{ $value->name }} {{ $value->last_name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->admission_number }}</td>
                      <td>{{ $value->roll_number }}</td>
                      <td>{{ $value->class_name}}</td>
                      <td>{{ $value->gender}}</td>
                      <td>
                        @if(!empty($value->date_of_birth))
                        {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                        @endif
                      </td>
                      <td>{{ $value->caste}}</td>
                      <td>{{ $value->religion}}</td>
                      <td>{{ $value->mobile_number}}</td>
                      <td>
                        @if(!empty($value->admission_date))
                        {{ date('d-m-Y', strtotime($value->admission_date)) }}
                        @endif
                      </td>
                      <td>{{ $value->blood_group}}</td>
                      <td>{{ $value->height}}</td>
                      <td>{{ $value->weight}}</td>
                    <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="{{ url('parent/my_student/subject/' .$value->id)}}">Subjects</a>
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