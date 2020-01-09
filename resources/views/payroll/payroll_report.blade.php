@extends('master')

@section('mainsection')

  <div class="card">
    <div class="card-header bg-secondary text-light">
      <div class="row">
        <h3 class="card-title display-inline">Payroll Report</h3>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-2">
      <table class="table table-bordered dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Staff Name</th>
            <th>Department</th>
            <th>Month|Year</th>
            <th>Basic Salary</th>
            <th>Earning</th>
            <th>Deduction</th>
            <th>Net Salary</th>
            <th>Pay Date</th>
          </tr>
        </thead>
        <tbody>
          @php
              $id = 0;
          @endphp
          @foreach ($rows as $row)
          <tr>
              <td>{{++$id}}</td>
              <td>{{App\Profile::employeeName($row->employee_no)}}</td>
              <td>{{App\Profile::employeeDepartment($row->employee_no)}}</td>
              <td>{{$row->month_year}}</td>
              <td>{{$row->basic_salary}}</td>
              <td>{{$row->earning_value}}</td>
              <td>{{$row->deduction_value}}</td>
              <td>{{$row->net_salary}}</td>
              <td>{{$row->updated_at->format('d-m-Y')}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection