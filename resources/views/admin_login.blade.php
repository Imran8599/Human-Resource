@include('header')

<div class="mt-5 pt-5">
    <div class="card card-primary col-md-5 m-auto">
        <div class="card-header">
          <h3 class="card-title">Admin Login</h3>
        </div>
        <!-- /.card-header -->
        @if(Session::has('message-success'))
          <div class="alert alert-success mt-1 p-1">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('message-success')}}</strong>
          </div>
        @elseif(Session::has('message-danger'))
          <div class="alert alert-danger mt-1 p-1">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('message-danger')}}</strong>
          </div>
        @endif
    
        @if($errors->any())
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger mt-1 p-1">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>{{$error}}</strong>
            </div>
          @endforeach
        @endif
        <!-- form start -->
        <form class="form-horizontal" action="{{url('admin-login')}}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input id="adminInputEmail" name="email" type="email" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input id="adminInputPassword" name="password" type="password" class="form-control" placeholder="Password">
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <a type="submit" class="btn btn-outline-primary" href="{{url('employee-login')}}">Employee Login Here</a>
            <button type="submit" class="btn btn-primary float-right">Sign in</button>
          </div>
          
          <!-- /.card-footer -->
        </form>
    
        <div class="text-center">
          <table class="table table-secondary table-sm">
            <thead>
              <tr>
                <th>Email</th>
                <th>Password</th>
                <th>Copy</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><p id="adminEmail">admin@gmail.com</p></td>
                <td><p id="adminPassword">12345</p></td>
                <td><button type="button" id="adminCopy"><i class="nav-icon fas fa-copy"></i></button></td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
</div>


@include('footer')