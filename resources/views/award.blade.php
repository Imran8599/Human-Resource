@extends('master')

@section('mainsection')

<div class="{{Request::is('award-edit*')?'':'collapse'}}" id="collapse">
  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Award</h3>
        <a data-toggle="collapse" href="#collapse" type="submit" class="ml-auto text-light"><i class="fas fa-times mr-2"></i></a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{url(Request::is('award-edit*')?'award-update':'award')}}" method="POST">
        @csrf
        <input name="id" type="hidden" value="{{Request::is('award-edit*')?$award_row->id:''}}">
        <div class="form-group">
          <label>Award Name</label>
        <input name="award_name" type="text" class="form-control" placeholder="Award Name"
         value="{{Request::is('award-edit*')?$award_row->award_name:''}}">
        </div>
        <div class="form-group">
          <label>Gift Item</label>
          <input name="gift_item" type="text" class="form-control" placeholder="Gift Item"
          value="{{Request::is('award-edit*')?$award_row->gift_item:''}}">
        </div>
        <div class="form-group">
          <label>Employee Name</label>
          <select name="employee_id" class="form-control">
            @foreach ($employees as $employee)
              <option value="{{$employee->id}}" {{Request::is('award-edit*')?($award_row->employee_id == $employee->id?'selected':''):''}}>{{$employee->name}} ({{$employee->employee_id}})</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Date</label>
          <input name="date" type="text" class="form-control datepicker" placeholder="Date"
          value="{{Request::is('award-edit*')?$award_row->date:''}}">
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
        <h3 class="card-title display-inline">Award</h3>
        <a data-toggle="collapse" href="#collapse" type="submit" class="ml-auto text-light"><i class="fas fa-plus mr-2"></i>Add New</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-2">
      <table class="table table-bordered dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>EmployeeID</th>
            <th>Employee Name</th>
            <th>Award</th>
            <th>Gift</th>
            <th>Date</th>
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
            <td>{{App\Profile::employeeID($row->employee_id)}}</td>
            <td>{{App\Profile::employeeName($row->employee_id)}}</td>
            <td>{{$row->award_name}}</td>
            <td>{{$row->gift_item}}</td>
            <td>{{$row->date}}</td>
            <td><strong><a class="text-success mr-3" href="{{url('award-edit',$row->id)}}"><i class="fas fa-edit"></i></a><a class="text-danger" href="{{url('award-delete',$row->id)}}"><i class="fas fa-times"></i></a></strong></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  
@endsection