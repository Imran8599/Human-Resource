@extends('master')

@section('mainsection')
<div class="div col-12 card">

    <div class="row pt-2">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{App\Profile::totalEmployee()}}</h3>
              <p>Total Employee</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('employee')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{App\Attendance::present()}}</h3>
              <p>Present Employee</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('viewattendance')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{App\Department::countDepartment()}}</h3>
              <p>Totol Department</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('department')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{App\ApplyLeave::applyLeave()}}</h3>
              <p>Leave Application (Pending)</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('leave')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header bg-secondary">
                    <h3 class="card-title">Direct Chat</h3>
                </div>
                <div class="card-body">
                <div class="direct-chat-messages">
                  @foreach ($chats as $msg)

                    @if ($msg->sender_id != 'Admin')
                      <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">{{App\Profile::employeeName($msg->sender_id)}}</span>
                            <span class="direct-chat-timestamp float-right">{{$msg->created_at->format('d M h:i A')}}</span>
                        </div>
                      <img class="direct-chat-img" src="{{App\Profile::photo($msg->sender_id)}}" alt="#">
                        <div class="direct-chat-text">
                          {{$msg->message}}
                        </div>
                      </div>
                    @endif

                    @if ($msg->sender_id == 'Admin')
                      <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">{{$msg->sender_id}}</span>
                            <span class="direct-chat-timestamp float-left">{{$msg->created_at->format('d M h:i A')}}</span>
                        </div>
                        <img class="direct-chat-img" src="{{App\GeneralSetting::photo()}}" alt="#">
                        <div class="direct-chat-text">
                          {{$msg->message}}
                        </div>
                      </div>
                    @endif

                  @endforeach
                </div>
                </div>
                <div class="card-footer">
                <form action="{{url('admin-chat')}}" method="post">
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
        </div>
        <div class="col-md-6">
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header bg-secondary">
                    <h3 class="card-title">All Events</h3>
                </div>
                <div class="card-body">
                <div class="direct-chat-messages">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Start</th>
                        <th>End</th>
                      </tr>
                    </thead>
                    <tbody id="eventsTable">
                      @php
                          $id = 0;
                      @endphp
                      @foreach ($events as $event)
                      <tr>
                        <td>{{++$id}}</td>
                        <td><a href="{{url('events-edit',$event->id)}}">{{str_limit($event->title, 15)}}</a></td>
                        <td>{{$event->start}}</td>
                        <td>{{$event->end}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <a href="{{url('events')}}" class="btn btn-outline-secondary btn-block">Details</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection