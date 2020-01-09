@extends('master')

@section('mainsection')
<div class="card">
    <div class="card-header bg-secondary">
      View Payslip Details
    </div>
    <div class="card-body my-5">
      <div class="row col-11">
        <div class="col-md-5 offset-1">
          <table class="table table-sm">
            <tbody>
              <tr>
                <td>Employee ID</td>
                <td>{{$view->employee_no}}</td>
              </tr>
              <tr>
                <td>Name</td>
                <td>{{App\Profile::employeeName($view->employee_no)}}</td>
              </tr>
              <tr>
                <td>Department</td>
                <td>{{App\Profile::employeeDepartment($view->employee_no)}}</td>
              </tr>
              <tr>
                <td>Designation</td>
                <td>{{App\Profile::employeeDesignation($view->employee_no)}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-5 offset-1">
          <table class="table table-sm">
            <tbody>
              <tr>
                <td>Payment Date</td>
                <td>{{$view->updated_at->format('d-m-Y')}}</td>
              </tr>
              <tr>
                <td>Payment Mode</td>
                <td>{{$view->payment_method}}</td>
              </tr>
              <tr>
                <td>Basic Salary</td>
                <td>{{$view->basic_salary}}</td>
              </tr>
              <tr>
                <td>Net Salary</td>
                <td>{{$view->net_salary}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>


@endsection