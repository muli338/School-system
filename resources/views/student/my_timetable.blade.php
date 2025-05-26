@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Timetable</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Search form -->
        @include('_message')

        @foreach($getRecord as $value)
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $value['name']}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>Week Days</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Room Number</th>
                        </tr>
                    </thead>
                  <tbody>
                    @foreach($value['week'] as $valueW)
                    <tr>
                    <td>{{ $valueW['week_name'] }}</td> 
                    <td>{{ !empty($valueW['start_time']) ? date('h:i:A', strtotime($valueW['start_time'])) : '' }}</td>
                    <td>{{ !empty($valueW['end_time']) ? date('h:i:A', strtotime($valueW['end_time'])) : '' }}</td> 
                    <td>{{ $valueW['room_number'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            @endforeach
        <!-- Additional content can go here -->
        <div class="card">
            <!-- You can add timetable listing here -->
        </div>
    </section>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $('.getClass').change(function(){
        var value = $(this).val();
        $.ajax({
            url: "{{ url('admin/class_timetable/get_subject')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                class_id: value,
            },
            dataType: "json",
            success: function(response){
                $('.getSubject').html(response.html);
            },
        });
    });
</script>
@endsection
 