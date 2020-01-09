@extends('master')

@section('mainsection')

<div class="{{Request::is('department-edit*')?'':'collapse'}}" id="department">
  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Department</h3>
        <a data-toggle="collapse" href="#department" type="submit" class="ml-auto text-light" href=""><i class="fas fa-times mr-2"></i></a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{url(Request::is('department-edit*')?'department-update':'department')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{Request::is('department-edit*')?$department->id:''}}">
        <div class="form-group">
          <label>Department Name</label>
          <input name="department" type="text" class="form-control" placeholder="Department Name" value="{{Request::is('department-edit*')?$department->department:''}}">
        </div>
        <button onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">SUBMIT</button>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</div>
<div class="{{Request::is('designation-edit*')?'':'collapse'}}" id="designation">
  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Designation</h3>
        <a data-toggle="collapse" href="#designation" type="submit" class="ml-auto text-light" href=""><i class="fas fa-times mr-2"></i></a>
      </div>
    </div>
    <div class="card-body">
    <form action="{{url(Request::is('designation-edit*')?'designation-update':'designation')}}" method="POST">
        @csrf
        <input type="hidden" name="id"  value="{{Request::is('designation-edit*')?$designation->id:''}}">
        <div class="form-group">
          <label>Select</label>
          <select name="department_id" class="form-control">
            @foreach ($rows as $row)
              <option {{Request::is('designation-edit*')?($designation->department_id == $row->id?'selected':''):''}} value="{{$row->id}}">{{$row->department}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Designation</label>
        <input name="designation" type="text" class="form-control" placeholder="Designation" value="{{Request::is('designation-edit*')?$designation->designation:''}}">
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
      <h3 class="card-title display-inline">Department</h3>
      <div class="ml-auto">
        <a class="text-light mr-3" data-toggle="collapse" href="#department" type="submit"><i class="fas fa-plus mr-2"></i>Add Department</a>
        <a class="text-light" data-toggle="collapse" href="#designation" type="submit"><i class="fas fa-plus mr-2"></i>Add Designation</a>
      </div>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-2">
    <div class="table-responsive">
      <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th colspan="2">Department Name</th>
          <th colspan="2">Designation</th>
        </tr>
      </thead>
      <tbody>
        @php
            $id = 0;
        @endphp
        @foreach ($rows as $row)
          <tr>
            <td>{{++$id}}</td>
            <td>{{$row->department}}</td>
            <td><strong><a class="text-success mr-3" href="{{url('department-edit',$row->id)}}"><i class="fas fa-edit"></i></a><a class="text-danger" href="{{url('department-delete',$row->id)}}"><i class="fas fa-times"></i></a></strong></td>
            
            @php
                $designations = App\Designation::allDesignations($row->id);
            @endphp
            <td>
              @foreach ($designations as $designation)
                {{$designation->designation}}<br>
              @endforeach
            </td>
            <td>
              @foreach ($designations as $designation)
                <strong><a class="text-success mr-3" href="{{url('designation-edit',$designation->id)}}"><i class="fas fa-edit"></i></a><a class="text-danger" href="{{url('designation-delete',$designation->id)}}"><i class="fas fa-times"></i></a></strong><br>
              @endforeach
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    
  </div>
  <!-- /.card-body -->
</div>
  
@endsection