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
        <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
      </div>
      <button onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">SUBMIT</button>
      <div class="clearfix"></div>
    </form>
  </div>
</div>
@endsection