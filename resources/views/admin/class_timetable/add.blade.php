@extends('layouts.app')

@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add CLass Timetable</h1>
          </div>


        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
                    <!-- Your form starts here -->
                    <div class="card">
                    <div class="card-header">
                <h3 class="card-title">Search Class Timetable</h3>
              </div>
                        <form action="" method="get">
                            <div class="card-body">
                               <div class="row">
                               <div class="form-group col-md-3">
                                    <label>Class Name</label>
                                    <input type="text" class="form-control" value="{{ Request::get('class_name')}}" name="class_name" placeholder="Enter Class name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Subject Name</label>
                                    <input type="text" class="form-control" value="{{ Request::get('subject_name')}}" name="subject_name" placeholder="Enter Subject name">
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                    <a href="{{ url('admin/class_timetable/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                </div>
                               </div>
                            </div>
                         
                        </form>
                    </div>
           
            <!-- /.card -->
            <div class="card">
            
              <!-- /.card-header -->
             
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