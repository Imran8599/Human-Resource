@extends('master')

@section('mainsection')
<div class="card">
  <div class="card-header bg-secondary text-light">
    <div class="row">
      <h3 class="card-title display-inline">Payroll Generator</h3>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-4">
        <table class="table table-sm">
          <tbody>
            <tr>
              <td>No</td>
              <td>{{$row->id}}</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>{{$row->name}}</td>
            </tr>
            <tr>
              <td>Mobile</td>
              <td>{{$row->phone}}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>{{$row->email}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <table class="table table-sm">
          <tbody>
            <tr>
              <td>Department</td>
              <td>{{App\Department::departmentName($row->department)}}</td>
            </tr>
            <tr>
              <td>Designation</td>
              <td>{{$row->designation}}</td>
            </tr>
            <tr>
              <td>Date of Joining</td>
              <td>{{$row->joining_date}}</td>
            </tr>
            <tr>
              <td>Month | Year</td>
              <td>{{Session::get('month').' | '.Session::get('year')}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <table class="table table-sm">
          <tbody class="text-center">
            <tr>
              <td>Present</td>  
              <td>Late</td>  
              <td>Leave</td>
              <td>Absent</td> 
              <td><strong>Total Day</strong></td>
            </tr>
            <tr>
              <td>{{App\Attendance::totalAttendance($row->employee_id)+App\Attendance::totalLate($row->employee_id)}}</td>
              <td>{{App\Attendance::totalLate($row->employee_id)}}</td>
              <td>{{App\Attendance::totalLeave($row->employee_id)}}</td>
              <td>{{App\Attendance::totalAbsent($row->employee_id)}}</td>
              <td><strong>{{App\Attendance::totalDay($row->employee_id)}}</strong></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-secondary">
            Earning
          </div>
          <div class="card-body">
            <form action="{{url('payroll-generate')}}" method="POST">
              @csrf
              <input type="hidden" name="employee_no" value="{{$row->id}}">
            <div class="row">
              <div class="div col-md-8">
                <div class="form-group">
                  <label>Type</label>
                  <input name="earning_note" type="text" class="form-control" placeholder="Earning">
                </div>
              </div>
              <div class="div col-md-4">
                <div class="form-group">
                  <label>Value</label>
                  <input id="earning_value" name="earning_value" type="number" class="form-control" placeholder="Value">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-secondary">
            Deductions
          </div>
          <div class="card-body">
            <div class="row">
              <div class="div col-md-8">
                <div class="form-group">
                  <label>Type</label>
                  <input name="deduction_note" type="text" class="form-control" placeholder="Deductions">
                </div>
              </div>
              <div class="div col-md-4">
                <div class="form-group">
                  <label>Value</label>
                  <input id="deduction_value" name="deduction_value" type="number" class="form-control" placeholder="Value">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-secondary">
            Payroll Summary
          </div>
          <div class="card-body">
              <button type="button" id="calculate" class="btn btn-sm btn-primary pull-right mb-3">Calculate</button>
              <div class="form-group">
                <label>Basic Salary</label>
                <input id="basic_salary" name="basic_salary" type="text" readonly class="form-control" value="{{$row->current_salary}}">
              </div>
              <div class="form-group">
                <label>Earning</label>
                <input id="earning" type="text" readonly class="form-control" placeholder="Earning">
              </div>
              <div class="form-group">
                <label>Deduction</label>
                <input id="deduction" type="text" readonly class="form-control" placeholder="Deduction">
              </div>
              <div class="form-group">
                <label>Net Salary</label>
                <input id="net_salary" name="net_salary" type="text" readonly class="form-control" placeholder="Net Salary">
              </div>
              <button id="generate" onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">GENERATE</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection