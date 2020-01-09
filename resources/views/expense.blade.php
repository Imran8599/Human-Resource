@extends('master')

@section('mainsection')
<div class="{{Request::is('expense-edit*')?'':'collapse'}}" id="collapse">
  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Expense</h3>
        <a data-toggle="collapse" href="#collapse" type="submit" class="ml-auto text-light"><i class="fas fa-times mr-2"></i></a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{url(Request::is('expense-edit*')?'expense-update':'expense')}}" method="POST">
        @csrf
        <input name="id" type="hidden" value="{{Request::is('expense-edit*')?$expense->id:''}}">
        <div class="form-group">
          <label>Item Name</label>
          <input name="item_name" type="text" class="form-control" placeholder="Item Name"  value="{{Request::is('expense-edit*')?$expense->item_name:''}}">
        </div>
        <div class="form-group">
          <label>Purchase From</label>
          <input name="purchase_from" type="text" class="form-control" placeholder="Purchase From" value="{{Request::is('expense-edit*')?$expense->purchase_from:''}}">
        </div>
        <div class="form-group">
          <label>Purchase Date</label>
          <input name="purchase_date" type="text" class="form-control datepicker" placeholder="Purchase Date" value="{{Request::is('expense-edit*')?$expense->purchase_date:''}}">
        </div>
        <div class="form-group">
          <label>Amount Price</label>
          <input name="amount_price" type="number" class="form-control" placeholder="Amount Price" value="{{Request::is('expense-edit*')?$expense->amount_price:''}}">
        </div>
        <button type="submit" class="btn btn-primary pull-right">SUBMIT</button>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</div>

  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Expense</h3>
        <a data-toggle="collapse" href="#collapse" type="submit" class="ml-auto text-light"><i class="fas fa-plus mr-2"></i>Add Expense</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-2">
      <table class="table table-bordered dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Purchase From</th>
            <th>Purchase Date</th>
            <th>Price</th>
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
            <td>{{$row->item_name}}</td>
            <td>{{$row->purchase_from}}</td>
            <td>{{$row->purchase_date}}</td>
            <td>{{$row->amount_price}} <small>TK</small></td>
            <td><strong><a class="text-success mr-3" href="{{url('expense-edit',$row->id)}}"><i class="fas fa-edit"></i></a><a class="text-danger" href="{{url('expense-delete',$row->id)}}"><i class="fas fa-times"></i></a></strong></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  
@endsection