@extends('master')

@section('mainsection')
<div class="{{Request::is('events-edit*')?'':'collapse'}}" id="collapse">
  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Events</h3>
        <a data-toggle="collapse" href="#collapse" type="submit" class="ml-auto text-light"><i class="fas fa-times mr-2"></i></a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{url(Request::is('events-edit*')?'events-update':'events')}}" method="POST">
        @csrf
        <input name="id" type="hidden" value="{{Request::is('events-edit*')?$events->id:''}}">
        <div class="form-group">
          <label>Title <strong class="text-danger">*</strong></label>
          <input name="title" type="text" class="form-control" placeholder="Title"  value="{{Request::is('events-edit*')?$events->title:''}}">
        </div>
        <div class="row col-12">
          <div class="form-group col-md-6">
            <label>Start Date <strong class="text-danger">*</strong></label>
            <div class="input-group date form_datetime" data-date-format="dd MM HH:ii p">
              <input name="start" class="form-control" size="16" type="text" placeholder="Start Date" value="{{Request::is('events-edit*')?$events->start:''}}" readonly>
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label>End Date <strong class="text-danger">*</strong></label>
            <div class="input-group date form_datetime" data-date-format="dd MM HH:ii p">
              <input name="end" class="form-control" size="16" type="text" placeholder="End Date" value="{{Request::is('events-edit*')?$events->end:''}}" readonly>
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
            </div>
          </div>
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
      <h3 class="card-title display-inline">events</h3>
      <a data-toggle="collapse" href="#collapse" type="submit" class="ml-auto text-light"><i class="fas fa-plus mr-2"></i>Add events</a>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-2">
    <table class="table table-bordered dataTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Start Date</th>
          <th>End Date</th>
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
          <td>{{str_limit($row->title ,30)}}</td>
          <td>{{$row->start}}</td>
          <td>{{$row->end}}</td>
          <td><strong><a class="text-success mr-3" href="{{url('events-edit',$row->id)}}"><i class="fas fa-edit"></i></a><a class="text-danger" href="{{url('events-delete',$row->id)}}"><i class="fas fa-times"></i></a></strong></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
  
@endsection