@extends('master')

@section('mainsection')

  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Leave Application</h3>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-2">
      <table class="table table-bordered dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Day</th>
            <th>Leave Type</th>
            <th>Reason</th>
            <th>Applied on</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rows as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{App\Profile::employeeName($row->employee_id)}}</td>
            <td>{{$row->date}}</td>
            <td>{{$row->day}}</td>
            <td>{{$row->leave_type}}</td>
            <td>{{$row->reason}}</td>
            <td>{{$row->created_at->format('d-m-Y')}}</td>
            @if ($row->status == 'Pending')
            <td class="text-danger">{{$row->status}}</td>
            @else
            <td class="text-success">{{$row->status}}</td>               
            @endif
            <td><strong><a class="text-success mr-3" href="{{url('leave-approve',$row->id)}}"><i class="fas fa-check"></i></a><a class="text-danger" href="{{url('leave-delete',$row->id)}}"><i class="fas fa-times"></i></a></strong></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection