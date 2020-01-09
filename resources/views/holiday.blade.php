@extends('master')

@section('mainsection')
<div class="{{Request::is('holiday-edit*')?'':'collapse'}}" id="collapse">
  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Holiday</h3>
        <a data-toggle="collapse" href="#collapse" type="submit" class="ml-auto text-light"><i class="fas fa-times mr-2"></i></a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{url(Request::is('holiday-edit*')?'holiday-update':'holiday')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{Request::is('holiday-edit*')?$holi->id:''}}">
        <div class="form-group">
          <label>Date</label>
          <input name="date" type="text" class="form-control datepicker" placeholder="Date" value="{{Request::is('holiday-edit*')?$holi->date:''}}">
        </div>
        <div class="form-group">
          <label>Occasion</label>
          <input name="occasion" type="text" class="form-control" placeholder="Occasion" value="{{Request::is('holiday-edit*')?$holi->occasion:''}}">
        </div>
        <div class="form-group">
          <label>Day</label>
          <input name="day" type="number" class="form-control" placeholder="Day" value="{{Request::is('holiday-edit*')?$holi->day:''}}">
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
        <h3 class="card-title display-inline">Holiday</h3>
        <a data-toggle="collapse" href="#collapse" type="submit" class="ml-auto text-light"><i class="fas fa-plus mr-2"></i>Add Holiday</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-2">
      <table class="table table-bordered dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Occasion</th>
            <th>Day</th>
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
            <td>{{$row->date}}</td>
            <td>{{$row->occasion}}</td>
            <td>{{$row->day}}</td>
            <td><strong><a class="text-success mr-3" href="{{url('holiday-edit',$row->id)}}"><i class="fas fa-edit"></i></a><a class="text-danger" href="{{url('holiday-delete',$row->id)}}"><i class="fas fa-times"></i></a></strong></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection