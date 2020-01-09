@extends('master')

@section('mainsection')

<div class="card">
  <div class="card-header bg-secondary text-light">
    <div class="row">
      <h3 class="card-title display-inline">Employee</h3>
    <a class="ml-auto text-light" href="{{url('addemployee')}}"><i class="fas fa-plus mr-2"></i>Add Employee</a>
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
          <th>Phone</th>
          <th>Dept/Designation</th>
          <th>At Work</th>
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
          <td><img  class="brand-image img-circle" style="height:55px; width:55px;" src="{{asset($row->photo)}}" alt="Photo"></td>
          <td>{{$row->name}}</td>
          <td>{{$row->phone}}</td>
          <td>Dept: {{App\Department::departmentName($row->department)}} <br>Desi: {{$row->designation}} </td>
          <td>{{$row->joining_date}}</td>
          <td><strong><a class="text-success mr-3" href="{{url('employee-edit',$row->id)}}"><i class="fas fa-edit"></i></a><a class="text-danger" href="{{url('employee-delete',$row->id)}}"><i class="fas fa-times"></i></a></strong></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
  
@endsection