@extends('layouts.app')

@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Subject <span style="color: blue;">({{ $getUser->name }} {{ $getUser->last_name }})</span></h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
                    <!-- Your form starts here -->
                    <div class="card">
           
            <!-- /.card -->
            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Subject</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Subject Name</th>
                      <th>Subject Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->subject_name }}</td>
                      <td>{{ $value->subject_type }}</td>
                       <td>
                         <a href="{{ url('parent/my_student/subject/class_timetable/' . $value->class_id . '/' . $value->subject_id. '/'. $getUser->id) }}" class="btn btn-primary">My ClassTimetable</a>
                        </td>
                      @endforeach
                  </tbody>
                </table>
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