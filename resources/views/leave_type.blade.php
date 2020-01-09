@extends('master')

@section('mainsection')

<div class="{{Request::is('leavetype-edit*')?'':'collapse'}}" id="leaveType">
  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Leave Type</h3>
        <a data-toggle="collapse" href="#leaveType" type="submit" class="ml-auto text-light" href=""><i class="fas fa-times mr-2"></i></a>
      </div>
    </div>
    <div class="card-body">
    <form action="{{url(Request::is('leavetype-edit*')?'leavetype-update':'leavetype')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{Request::is('leavetype-edit*')?$leave->id:''}}">
        <div class="form-group">
          <label>Leave</label>
        <input name="leave" type="text" class="form-control" placeholder="Leave" value="{{Request::is('leavetype-edit*')?$leave->leave:''}}">
        </div>
        <div class="form-group">
          <label>Day</label>
          <input name="day" type="number" class="form-control" placeholder="Day" value="{{Request::is('leavetype-edit*')?$leave->day:''}}">
        </div>
        <button onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">SUBMIT</button>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</div>

  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Leave Type</h3>
        <a data-toggle="collapse" href="#leaveType" type="submit" class="ml-auto text-light"><i class="fas fa-plus mr-2"></i>Add New</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-2">
      <table class="table table-bordered dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Leave</th>
            <th>Number of Leaves</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rows as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->leave}}</td>
            <td>{{$row->day}}</td>
            <td><strong><a class="text-success mr-3" href="{{url('leavetype-edit',$row->id)}}"><i class="fas fa-edit"></i></a><a class="text-danger" href="{{url('leavetype-delete',$row->id)}}"><i class="fas fa-times"></i></a></strong></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection