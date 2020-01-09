@extends('master')

@section('mainsection')

<div class="card">
    <div class="card-header bg-secondary text-light">
        Add Employee
        <form action="{{url(Request::is('employee-edit*')?'update':'employee')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <input name="id" type="hidden" value="{{Request::is('employee-edit*')?$row->id:''}}">
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary text-light">
                      <h3 class="card-title display-inline">Personal Details</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-10">
                          <label>Photo</label>
                          <input name="photo" type="file" class="form-control" onchange="readURL(this);">
                        </div>
                        <div class="col-md-2">
                          <img id="showImage" class="brand-image" style="height:75px; width:75px;" src="{{asset(Request::is('employee-edit*')?$row->photo:'')}}" alt="Photo">
                        </div>
                      </div>
                        <div class="form-group">
                          <label>Name <strong class="text-danger">*</strong></label>
                          <input name="name" type="text" class="form-control" placeholder="Name" value="{{Request::is('employee-edit*')?$row->name:''}}">
                        </div>
                        <div class="form-group">
                          <label>Father's Name</label>
                          <input name="father_name" type="text" class="form-control" placeholder="Father's Name" value="{{Request::is('employee-edit*')?$row->father_name:''}}">
                        </div>
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input name="birth_day" type="text" class="form-control datepicker" placeholder="Date of Birth" value="{{Request::is('employee-edit*')?$row->birth_day:''}}">
                        </div>
                        <div class="form-group">
                          <label>Gender</label>
                          <select name="gender" class="form-control">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Phone</label>
                          <input name="phone" type="number" class="form-control" placeholder="Phone" value="{{Request::is('employee-edit*')?$row->phone:''}}">
                        </div>
                        <div class="form-group">
                          <label>Local Address</label>
                          <textarea name="local_addrss" class="form-control" rows="3" placeholder="Local Addrss">{{Request::is('employee-edit*')?$row->local_addrss:''}}</textarea>
                        </div>
                        <div class="form-group">
                          <label>Parmanent Address</label>
                          <textarea name="parmanent_addrss" class="form-control" rows="3" placeholder="Parmanent Addrss">{{Request::is('employee-edit*')?$row->parmanent_addrss:''}}</textarea>
                        </div>
                        <h3>Account Login</h3>
                        <div class="form-group">
                          <label>Email <strong class="text-danger">*</strong></label>
                          <input name="email" type="email" class="form-control" placeholder="Email" value="{{Request::is('employee-edit*')?$row->email:''}}">
                        </div>
                        <div class="form-group">
                          <label>Password <strong class="text-danger">*</strong></label>
                          <input name="password" type="text" class="form-control" placeholder="Password" value="{{Request::is('employee-edit*')?Crypt::decryptString($row->password):''}}">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-secondary text-light">
                      <h3 class="card-title display-inline">Documents</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                          <label>Resume</label>
                          <input name="resume" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Offer Letter</label>
                          <input name="offer_letter" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Joining Letter</label>
                          <input name="joining_letter" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Contract and Agreement</label>
                          <input name="agreement" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>ID Proof</label>
                          <input name="id_proof" type="file" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary text-light">
                      <h3 class="card-title display-inline">Company Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                          <label>Employee ID <strong class="text-danger">*</strong></label>
                          <input name="employee_id" type="text" class="form-control" placeholder="Designation" value="{{Request::is('employee-edit*')?$row->employee_id:''}}">
                        </div>
                        <div class="form-group">
                          <label>Department</label>
                          <input type="hidden" name="url" id="url" value="{{url('/')}}">
                          <select id="department" name="department" class="form-control">
                            <option value="">- - Select - -</option>
                            @foreach ($rows as $r)
                              <option {{Request::is('employee-edit*')?($row->department==$r->id?'selected':''):''}} value="{{$r->id}}">{{$r->department}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Designation</label>
                          <select id="designation" name="designation" class="form-control">
                            <option value="{{Request::is('employee-edit*')?$row->designation:''}}">{{Request::is('employee-edit*')?$row->designation:''}}</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Date of joining</label>
                          <input name="joining_date" type="text" class="form-control datepicker" placeholder="Date of joining" value="{{Request::is('employee-edit*')?$row->joining_date:''}}">
                        </div>
                        <div class="form-group">
                          <label>Joining Salary</label>
                          <input name="joining_salary" type="number" class="form-control" placeholder="Joining Salary" value="{{Request::is('employee-edit*')?$row->joining_salary:''}}">
                        </div>
                        <div class="form-group">
                          <label>Current Salary</label>
                          <input name="current_salary" type="number" class="form-control" placeholder="Current Salary" value="{{Request::is('employee-edit*')?$row->joining_salary:''}}">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-secondary text-light">
                      <h3 class="card-title display-inline">Bank Account Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                          <label>Account Holder Name</label>
                          <input name="account_name" type="text" class="form-control" placeholder="Account Holder Name" value="{{Request::is('employee-edit*')?$row->account_name:''}}">
                        </div>
                        <div class="form-group">
                          <label>Account Number</label>
                          <input name="account_number" type="text" class="form-control" placeholder="Account Number" value="{{Request::is('employee-edit*')?$row->account_number:''}}">
                        </div>
                        <div class="form-group">
                          <label>Bank Name</label>
                          <input name="bank_name" type="text" class="form-control" placeholder="Bank Name" value="{{Request::is('employee-edit*')?$row->bank_name:''}}">
                        </div>
                        <div class="form-group">
                          <label>Branch</label>
                          <input name="branch" type="text" class="form-control" placeholder="Branch" value="{{Request::is('employee-edit*')?$row->branch:''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">SUBMIT</button>
        <div class="clearfix"></div>
        </form>
    </div>
</div>

@endsection