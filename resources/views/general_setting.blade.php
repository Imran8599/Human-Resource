@extends('master')

@section('mainsection')

<div class="card">
  <div class="card-header bg-secondary text-light">
    <div class="row">
      <h3 class="card-title display-inline">General Setting</h3>
      @php
          $n = 0;
      @endphp
      @foreach ($rows as $row)
        @php
          $n = 1;
        @endphp
      @endforeach
      @if ($n==0)
        <a data-toggle="collapse" href="#general_setting" type="submit" class="ml-auto text-light"><i class="fas fa-plus mr-2"></i></a>
      @endif
    </div>
  </div>
  <div class="card-body">
    <div class="row col-12">
      <div class="col-md-8">
        @foreach ($rows as $row)
          <img style="height:175px; width:175px;" src="{{asset($row->website_logo)}}" class="img-circle elevation-2 mx-auto d-block" alt="Logo">
          <div class="text-center mt-3">
            <h4>Website Name: {{$row->website_name}}</h4>
            <h6>Website Title: {{$row->website_title}}</h6>
            <h5>Email: {{$row->email}}</h5>
            <h2 class="py-5 text-center"><strong>
              <a class="text-primary" href="{{url('general-setting-edit',$row->id)}}"><i class="fas fa-edit"></i></a>
            </strong></h2>
          </div>
        @endforeach
      </div>
      <div class="col-md-4 {{Request::is('general-setting-edit*')?'':'collapse'}}" id="general_setting">
        <form action="{{url(Request::is('general-setting-edit*')?'general-setting-update':'general-setting')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{Request::is('general-setting-edit*')?$web->id:''}}">
          <div class="form-group">
            <label>Website Logo</label>
            <input name="website_logo" type="file" class="form-control" value="{{Request::is('general-setting-edit*')?$web->website_logo:''}}">
          </div>
          <div class="form-group">
            <label>Website Name</label>
          <input name="website_name" type="text" class="form-control" placeholder="Website Name" value="{{Request::is('general-setting-edit*')?$web->website_name:''}}">
          </div>
          <div class="form-group">
            <label>Website Title</label>
          <input name="website_title" type="text" class="form-control" placeholder="Website Title" value="{{Request::is('general-setting-edit*')?$web->website_title:''}}">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input readonly name="email" type="email" class="form-control" placeholder="Email" value="{{Request::is('general-setting-edit*')?$web->email:''}}">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input readonly name="password" type="password" class="form-control" placeholder="Password" value="{{Request::is('general-setting-edit*')?$web->password:''}}">
          </div>
          <button onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">SUBMIT</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection