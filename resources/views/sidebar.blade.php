  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @php
      $websites = App\GeneralSetting::website();
    @endphp
    @foreach ($websites as $website)
      <a href="{{url('/')}}" class="brand-link">
        <img src="{{asset($website->website_logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{$website->website_name}}</span>
      </a>
    @endforeach

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{url('/')}}" class="nav-link {{Request::is('/')?'active':''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('events')}}" class="nav-link {{Request::is('events')?'active':''}}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Events
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('employee')}}" class="nav-link {{Request::is(['employee','addemployee'])?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employees
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('department')}}" class="nav-link {{Request::is('department')?'active':''}}">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Department
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('award')}}" class="nav-link {{Request::is('award')?'active':''}}">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                Award
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('expense')}}" class="nav-link {{Request::is('expense')?'active':''}}">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Expense
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('holiday')}}" class="nav-link {{Request::is('holiday')?'active':''}}">
              <i class="nav-icon fas fa-plane"></i>
              <p>
                Holidays
              </p>
            </a>
          </li>
          <li class="nav-item {{Request::is(['markattendance','viewattendance','leavetype','leavetype-edit*','leavetype-delete*','leavetype-update'])?'menu-open':''}}">
            <a href="#" class="nav-link {{Request::is(['markattendance','viewattendance','leavetype','leavetype-edit*','leavetype-delete*','leavetype-update'])?'active':''}}">
              <i class="nav-icon fas fa-user"></i>
              <p>Attendance<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('markattendance')}}" class="nav-link">
                  <p>Mark Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('viewattendance')}}" class="nav-link">
                  <p>View Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('leavetype')}}" class="nav-link">
                  <p>Leave Types</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{Request::is(['payroll','payroll-report','payroll-generate*','payroll-search','payroll-view*'])?'menu-open':''}}">
            <a href="#" class="nav-link {{Request::is(['payroll','payroll-report','payroll-generate*','payroll-search','payroll-view*'])?'active':''}}">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>Payroll<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('payroll')}}" class="nav-link">
                  <p>Payroll</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('payroll-report')}}" class="nav-link">
                  <p>Payroll Report</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('leave')}}" class="nav-link {{Request::is('leave')?'active':''}}">
              <i class="nav-icon fas fa-rocket"></i>
              <p>
                Leave Applications
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('notice')}}" class="nav-link {{Request::is('notice','notice-edit*','notice-delete*','notice-update')?'active':''}}">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Notice Board
              </p>
            </a>
          </li>
          <li class="nav-item {{Request::is(['general-setting','profile-setting','notification-setting','email-setting'])?'menu-open':''}}">
            <a href="#" class="nav-link {{Request::is(['general-setting','profile-setting','notification-setting','email-setting'])?'active':''}}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Setting<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('general-setting')}}" class="nav-link">
                  <p>General Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('email-setting')}}" class="nav-link">
                  <p>Email Setting</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper p-2">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              {{Request::is('/')?'Dashboard':''}}
              {{Request::is('events')?'Events':''}}
              {{Request::is('employee')?'Employee':''}}
              {{Request::is('employee-edit*')?'Employee Edit':''}}
              {{Request::is('department')?'Department':''}}
              {{Request::is('award')?'Award':''}}
              {{Request::is('expense')?'Expense':''}}
              {{Request::is('holiday')?'Holiday':''}}
              {{Request::is('markattendance')?'Mark Attendance':''}}
              {{Request::is('viewattendance')?'View Attendance':''}}
              {{Request::is('leavetype')?'Leave Type':''}}
              {{Request::is('payroll')?'Payroll':''}}
              {{Request::is('payroll-search')?'Payroll Search':''}}
              {{Request::is('payroll-generate*')?'Payroll Generate':''}}
              {{Request::is('payroll-view*')?'Payroll View':''}}
              {{Request::is('payroll-report')?'Payroll Report':''}}
              {{Request::is('leave')?'Leave Application':''}}
              {{Request::is('notice')?'Notice':''}}
              {{Request::is(['general-setting','general-setting-edit*'])?'General Setting':''}}
              {{Request::is('email-setting')?'Email Setting':''}}
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">
                {{Request::is('/')?'Dashboard':''}}
                {{Request::is('events')?'Events':''}}
                {{Request::is('employee')?'Employee':''}}
                {{Request::is('employee-edit*')?'Employee / Employee Edit':''}}
                {{Request::is('department')?'Department':''}}
                {{Request::is('award')?'Award':''}}
                {{Request::is('expense')?'Expense':''}}
                {{Request::is('holiday')?'Holiday':''}}
                {{Request::is('markattendance')?'Attendance / Mark Attendance':''}}
                {{Request::is('viewattendance')?'Attendance / View Attendance':''}}
                {{Request::is('leavetype')?'Attendance / Leave Type':''}}
                {{Request::is('payroll')?'Payroll / Payroll':''}}
                {{Request::is('payroll-search')?'Payroll / Payroll Search':''}}
                {{Request::is('payroll-generate*')?'Payroll / Payroll Search / Payroll Generate':''}}
                {{Request::is('payroll-view*')?'Payroll / Payroll Search / Payroll View':''}}
                {{Request::is('payroll-report')?'Payroll / Payroll Report':''}}
                {{Request::is('leave')?'Leave Application':''}}
                {{Request::is('notice')?'Notice':''}}
                {{Request::is(['general-setting','general-setting-edit*'])?'Setting / General Setting':''}}
                {{Request::is('email-setting')?'Setting / Email Setting':''}}
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
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
