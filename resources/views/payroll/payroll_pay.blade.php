@extends('master')
@section('mainsection')
<div class="card">
    <div class="card-header bg-secondary">
      Proceed To Pay
    </div>
    <div class="card-body">
      <form action="{{url('payroll-pay')}}" method="POST">
        @csrf
        <input type="hidden" name="payroll_id" value="{{$pay->id}}">
        <div class="form-group">
          <label>Name</label>
          <input name="name" type="text" class="form-control" readonly value="{{App\Profile::employeeName($pay->employee_no)}}">
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label>Month|Year</label>
            <input name="month_year" type="text" class="form-control" readonly value="{{$pay->month_year}}">
          </div>
          <div class="form-group col-md-6">
            <label>Payment Date</label>
            <input name="payment_date" type="text" class="form-control" readonly value="{{date('d-m-Y')}}">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label>Payment Amount</label>
            <input name="payment_amount" type="text" class="form-control" readonly value="{{$pay->net_salary}}">
          </div>
          <div class="form-group col-md-6">
            <label>Payment Method <strong class="text-danger">*</strong></label>
            <select name="payment_method" class="form-control niceSelect">
              <option value="" selected disabled>Select Payment Method</option>
              <option value="Cash">Cash</option>
              <option value="Bank">Bank</option>
              <option value="Card">Card</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label>Note</label>
          <input name="note" type="text" class="form-control" placeholder="Note">
        </div>
        <button onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">Save Information</button>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
  @endsection