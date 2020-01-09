@extends('master')

@section('mainsection')

  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Mark Attendance</h3>
      </div>
    </div>
    <!-- /.card-header -->
    <form action="{{url('mark-attendance')}}" method="POST">
      @csrf
    <div class="card-body p-2">
      <div class="form-group">
        <label>Date</label>
        <input name="date" type="text" class="form-control datepicker" placeholder="Date" value="{{date('d-m-Y')}}">
      </div>
      <table class="table table-bordered dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>EmplpyeeID</th>
            <th>Name</th>
            <th>Status</th>
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
            <input type="hidden" name="employee_id[]" value="{{$row->employee_id}}">
            <td>{{$row->name}}</td>
            @php
            $leave = App\ApplyLeave::todayAbsent($row->id);
            @endphp 
            <td>
              <div class="form-group m-0 p-0">
                <select name="status[]" class="form-control">
                  <option {{$leave == '1'?'selected':''}} value="P">Present</option>
                  <option {{$leave == '0'?'selected':''}} value="Le">Leave</option>
                  <option value="La">Late</option>
                  <option value="A">Absent</option>
                </select>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <button class="btn btn-info" type="submit">SUBMIT</button>
    </div>
    </form>
    <!-- /.card-body -->
  </div>
@endsection