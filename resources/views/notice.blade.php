@extends('master')

@section('mainsection')
<div class="{{Request::is('notice-edit*')?'':'collapse'}}" id="collapse">
  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Holiday</h3>
        <a data-toggle="collapse" href="#collapse" type="submit" class="ml-auto text-light"><i class="fas fa-times mr-2"></i></a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{url(Request::is('notice-edit*')?'notice-update':'notice')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{Request::is('notice-edit*')?$notice->id:''}}">
        <div class="form-group">
          <label>Title</label>
          <input name="title" type="text" class="form-control" placeholder="Title" value="{{Request::is('notice-edit*')?$notice->title:''}}">
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea id="summernote" name="description" class="form-control" placeholder="Description">{{Request::is('notice-edit*')?$notice->description:''}}</textarea>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="Active" 
            {{Request::is('notice-edit*')?($notice->status=='Active'?'checked':''):''}}>
            <label class="form-check-label text-success">Active</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="Disabled" 
            {{Request::is('notice-edit*')?($notice->status!='Active'?'checked':''):''}}>
            <label class="form-check-label text-danger">Disabled</label>
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
        <h3 class="card-title display-inline">Notice</h3>
        <a data-toggle="collapse" href="#collapse" type="submit" class="ml-auto text-light"><i class="fas fa-plus mr-2"></i>Add New</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-2">
      <table class="table table-bordered dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Created Date</th>
            <th>Title</th>
            <th>Description</th>
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
            <td>{{$row->created_at->format('d-m-Y')}}</td>
            <td>{{$row->title}}</td>
            <td>{!!$row->description!!}</td>
            @if ($row->status != 'Active')
            <td class="text-danger">{{$row->status}}</td>
            @else
            <td class="text-success">{{$row->status}}</td>               
            @endif
            <td><strong><a class="text-success mr-3" href="{{url('notice-edit',$row->id)}}"><i class="fas fa-edit"></i></a><a class="text-danger" href="{{url('notice-delete',$row->id)}}"><i class="fas fa-times"></i></a></strong></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection