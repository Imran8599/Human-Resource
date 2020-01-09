@include('header')

  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-dark bg-secondary">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#">HR</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('profile')}}" class="nav-link">My Profile</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          My Account
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#applyLeave" class="dropdown-item">
              Apply Leave
            </a>
            <div class="dropdown-divider"></div>
            <a href="#leaveApplication" class="dropdown-item">
              My Leave
            </a>
            <div class="dropdown-divider"></div>
            <a href="#change_password" class="dropdown-item">
              Change Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{url('employee-logout')}}" class="dropdown-item">
              Logout
            </a>
        </div>
      </li>
    </ul>
  </nav>

  <div class="row col-12 p-3">
    <div class="col-md-6">
      <img style="height:175px; width:150px;" src="{{asset($row->photo)}}" class="img-circle elevation-2 mx-auto d-block" alt="...">
      <div class="text-center">
        <h3>{{$row->name}}</h3>
        <p>{{App\Department::departmentName($row->department)}}</p>
        <div class="bg-secondary my-3 p-2">
          <strong>At work for:</strong>
          @php
              $date1=date_create($row->joining_date);
              $date2=date_create(date('Y-m-d'));
              $diff=date_diff($date1,$date2);
              echo $diff->format("%R%a days ago");
          @endphp
        </div>
        <div class="bg-secondary text-light p-2">
          <div class="row">
            <div class="col-md-3"><strong>{{App\Attendance::totalAttendance($row->employee_id)+App\Attendance::totalLate($row->employee_id)}}</strong> <br> <small>Attendance</small> </div>
            <div class="col-md-3"><strong>{{App\Attendance::totalAbsent($row->employee_id)}}</strong> <br> <small>Absent</small> </div>
            <div class="col-md-3"><strong>{{App\Attendance::totalLeave($row->employee_id)}}/3</strong> <br> <small>Leave</small> </div>
            <div class="col-md-3"><strong>{{App\Award::employeeCout($row->id)}}</strong> <br> <small>Awards</small> </div>
          </div>
        </div>
      </div>
      <div class="card mt-3">
        <div class="card-header bg-secondary text-light">
          <h3 class="card-title">Personal Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
          <table class="table table-borderless table-sm">
            <tbody>
              <tr>
                <td>Employee ID</td>
                <td>{{$row->employee_id}}</td>
              </tr>
              <tr>
                <td>Name</td>
                <td>{{$row->name}}</td>
              </tr>
              <tr>
                <td>Father's Name</td>
                <td>{{$row->father_name}}</td>
              </tr>
              <tr>
                <td>DOB</td>
                <td>{{$row->birth_day}}</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>{{$row->gender}}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>{{$row->email}}</td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>{{$row->phone}}</td>
              </tr>
              <tr>
                <td>Local Address</td>
                <td>{{$row->local_addrss}}</td>
              </tr>
              <tr>
                <td>Permanent Address</td>
                <td>{{$row->parmanent_addrss}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="card">
        <div class="card-header bg-secondary text-light">
          <h3 class="card-title">Company Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
          <table class="table table-borderless table-sm">
            <tbody>
              <tr>
                <td>Employee ID</td>
                <td>{{$row->employee_id}}</td>
              </tr>
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
                <td>Joining Salary</td>
                <td>{{$row->joining_salary}} <small>TK</small></td>
              </tr>
              <tr>
                <td>Current Salary</td>
                <td>{{$row->current_salary}} <small>TK</small></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="card">
        <div class="card-header bg-secondary text-light">
          <h3 class="card-title">Bank Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
          <table class="table table-borderless table-sm">
            <tbody>
              <tr>
                <td>Account Holder Name</td>
                <td>{{$row->account_name}}</td>
              </tr>
              <tr>
                <td>Account Number</td>
                <td>{{$row->account_number}}</td>
              </tr>
              <tr>
                <td>Bank Name</td>
                <td>{{$row->bank_name}}</td>
              </tr>
              <tr>
                <td>Branch</td>
                <td>{{$row->branch}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="card">
        <div class="card-header bg-secondary text-light">
          <h3 class="card-title">Awards</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
          <table class="table table-borderless table-sm">
            <thead>
              <tr>
                <th>No</th>
                <th>Award</th>
                <th>Gift</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $id = 0;
              @endphp
              @foreach ($awards as $award)
              <tr>
                <td>{{++$id}}</td>
                <td>{{$award->award_name}}</td>
                <td>{{$award->gift_item}}</td>
                <td>{{$award->date}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="card mt-3">
        <div class="card-header bg-secondary text-light">
          <h3 class="card-title">Attendance</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
          <table class="table table-borderless table-sm">
            <tbody>
              <tr>
                <td>Last absent <small>
                  @php
                      $date1=date_create(App\ApplyLeave::lastAbsent($row->id));
                      $date2=date_create(date('Y-m-d'));
                      $diff=date_diff($date1,$date2);
                      echo $diff->format("%R%a days ago");
                  @endphp
                  </small></td>
                <td>{{App\ApplyLeave::lastAbsent($row->id)}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

    <div class="col-md-6">
      <!-- DIRECT CHAT -->
      <div class="card direct-chat direct-chat-primary">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Direct Chat</h3>
        </div>
        <div class="card-body">
        <div class="direct-chat-messages">
          @foreach ($chats as $msg)
            @if ($msg->sender_id != Session::get('ID'))
              <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">{{$msg->sender_id=='Admin'?'Admin':(App\Profile::employeeName($msg->sender_id))}}</span>
                    <span class="direct-chat-timestamp float-right">{{$msg->created_at->format('d M h:i A')}}</span>
                </div>
              <img class="direct-chat-img" src="{{asset($msg->sender_id=='Admin'?(App\GeneralSetting::photo()):(App\Profile::photo($msg->sender_id)))}}" alt="#">
                <div class="direct-chat-text">
                  {{$msg->message}}
                </div>
              </div>
            @endif

            @if ($msg->sender_id == Session::get('ID'))
              <div class="direct-chat-msg right">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right">{{App\Profile::employeeName($msg->sender_id)}}</span>
                    <span class="direct-chat-timestamp float-left">{{$msg->created_at->format('d M h:i A')}}</span>
                </div>
                <img class="direct-chat-img" src="{{asset(App\Profile::photo($msg->sender_id))}}" alt="#">
                <div class="direct-chat-text">
                  {{$msg->message}}
                </div>
              </div>
            @endif

          @endforeach
        </div>
        </div>
        <div class="card-footer">
        <form action="{{url('employee-chat')}}" method="post">
          @csrf
            <div class="input-group">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                <span class="input-group-append">
                    <button type="submit" class="btn btn-primary">Send</button>
                </span>
            </div>
        </form>
        </div>
    </div>
      <!-- END DIRECT CHAT -->
      <div class="card">
        <div class="card-header bg-secondary text-light">
          <h3 class="card-title">Notice Board</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed">
            <tbody>
              @foreach ($notices as $notice)
              <tr>
                <td>{{$notice->created_at->format('d-m-Y')}}</td>
                <td><strong class="d-block">{{$notice->title}}</strong>{!!$notice->description!!}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="card">
        <div class="card-header bg-secondary text-light">
          <h3 class="card-title">Upcoming Holidays</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
          <table class="table table-borderless table-sm">
            <thead>
              <tr>
                <th>Date</th>
                <th>Day</th>
                <th>Occasion</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($holidays as $holiday)
              <tr>
                <td>{{$holiday->date}}</td>
                <td>{{$holiday->day}}</td>
                <td>{{$holiday->occasion}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="card" id="leaveApplication">
        <div class="card-header bg-secondary text-light">
          <div class="row">
            <h3 class="card-title display-inline">Leave Application</h3>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>Date</th>
                <th>Day</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($leaves as $leave)
              <tr>
                <td>{{$leave->date}}</td>
                <td>{{$leave->day}}</td>
                @if ($leave->status == 'Pending')
                <td class="text-danger">{{$leave->status}}</td>
                @else
                <td class="text-success">{{$leave->status}}</td>               
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="card" id="applyLeave">
        <div class="card-header bg-secondary text-light">
          <div class="row">
            <h3 class="card-title display-inline">Apply Leave</h3>
          </div>
        </div>
        <div class="card-body">
          @if(Session::has('message-success'))
            <div class="alert alert-success p-2">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>{{Session::get('message-success')}}</strong>
            </div>
          @elseif(Session::has('message-danger'))
            <div class="alert alert-danger p-2">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>{{Session::get('message-danger')}}</strong>
            </div>
          @endif
      
          @if($errors->any())
            @foreach ($errors->all() as $error)
              <div class="alert alert-danger p-2">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$error}}</strong>
              </div>
            @endforeach
          @endif
          <form action="{{url('apply-leave')}}" method="POST">
            @csrf
            <div class="form-group">
              <label>Date</label>
              <input name="date" type="text" class="form-control datepicker" placeholder="Date">
            </div>
            <div class="form-group">
              <label>Day</label>
              <input name="day" type="text" class="form-control" placeholder="Day">
            </div>
            <div class="form-group">
              <label>Leave Type</label>
              <select name="leave_type" class="form-control">
                  @foreach ($leave_types as $leave_type)
                    <option value="{{$leave_type->leave}}">{{$leave_type->leave}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Reason</label>
              <textarea name="reason" class="form-control" rows="3" placeholder="Reason"></textarea>
            </div>
            <button onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">SUBMIT</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
      <div class="card" id="change_password">
        <div class="card-header bg-secondary text-light">
          <div class="row">
            <h3 class="card-title display-inline">Change Password</h3>
          </div>
        </div>
        <div class="card-body">
          <form action="{{url('change-password')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$row->id}}">
            <div class="form-group">
              <label>Password</label>
              <input readonly name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input readonly name="con_password" type="password" class="form-control" placeholder="Confirm Password">
            </div>
            <button onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">UPDATE</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

  </div>






@include('footer')