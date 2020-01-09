@extends('master')

@section('mainsection')
<div class="card">
  <div class="card-header bg-secondary text-light">
    <div class="row">
      <h3 class="card-title display-inline">General Setting</h3>
    </div>
  </div>
  <div class="card-body">
    <form action="#" method="">
      @csrf
      <div class="form-group">
        <label>Mail Driver</label>
        <input name="title" type="text" class="form-control" placeholder="Website Name">
      </div>
      <div class="form-group">
        <label>Mail Host</label>
        <input name="title" type="text" class="form-control" placeholder="Name">
      </div>
      <div class="form-group">
        <label>Mail Port</label>
        <input name="title" type="text" class="form-control" placeholder="Currency">
      </div>
      <div class="form-group">
        <label>Mail Username</label>
        <input name="title" type="text" class="form-control" placeholder="Currency">
      </div>
      <div class="form-group">
        <label>Mail Password</label>
        <input name="title" type="text" class="form-control" placeholder="Currency">
      </div>
      <div class="form-group">
        <label>Mail Encryption</label>
        <input name="title" type="text" class="form-control" placeholder="Currency">
      </div>
      <button onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">SUBMIT</button>
      <div class="clearfix"></div>
    </form>
  </div>
</div>
@endsection