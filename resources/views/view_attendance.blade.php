@extends('master')

@section('mainsection')

  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">View Attendance</h3>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-2">
      <table class="table table-bordered dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>EmployeeID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Last Absent</th>
            <th colspan="2">Attendance</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
              $id = 0;
          @endphp
          @foreach ($rows as $row)
          <tr>
            <td>{{++$id}}</td>
            <td>{{$row->employee_id}}</td>
            <td><img src="{{asset($row->photo)}}" alt="Photo" style="height:75px"></td>
            <td>{{$row->name}}</td>
            <td>
              @php
                $date1=date_create(App\ApplyLeave::lastAbsent($row->id));
                $date2=date_create(date('Y-m-d'));
                $diff=date_diff($date1,$date2);
                echo $diff->format("%R%a days ago");
              @endphp
            </td>
            <td>
              Present <br>
              Late <br>
              Leave <br>
              Absent <br>
              <strong>Total Day</strong>
            </td>
            <td>
              {{App\Attendance::totalAttendance($row->employee_id)+App\Attendance::totalLate($row->employee_id)}} <br>
              {{App\Attendance::totalLate($row->employee_id)}} <br>
              {{App\Attendance::totalLeave($row->employee_id)}} <br>
              {{App\Attendance::totalAbsent($row->employee_id)}} <br>
              <strong>{{App\Attendance::totalDay($row->employee_id)}}</strong>
            </td>
            @php
                $r = App\Attendance::active($row->employee_id);
            @endphp
            @if ($r->status == 'P'||$r->status == 'La')
              <td><p class="bg-success p-1">Present</p></td>
            @else
              <td><p class="bg-danger p-1">Absent</p></td>
            @endif
            <td>View</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection