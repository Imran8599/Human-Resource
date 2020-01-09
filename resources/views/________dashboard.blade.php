@extends('master')

@section('mainsection')

<div class="div col-12 m-auto card">
  <script>
    document.addEventListener('DOMContentLoaded', function() {

      //Get current date.
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();
      today = yyyy + '-' + mm + '-' + dd;
      //end current date

      //Ajax
      // var url = document.getElementById('url').value;
      // var all_event = '';
      // $.ajax({
      //   url: url +'/'+'all-events',
      //   success:function(rows)
      //   {
      //     rows.forEach(function(row){
      //       all_event += ["{title: '"+row.title+"'", "start: '"+row.start+"'", "end: '"+row.end+"'", "url: '"+row.url+"'},"];
      //     });
      //     $('#event').val('['+all_event+']');
      //   }
      // });
      //end Ajax

      // setTimeout(function(){ 
      //   var all_events = document.getElementById('event').value;
      //   alert(all_events); 
      // }, 1000);

      // var all_event = $('#event').val();
      // console.log(all_event);

      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        defaultDate: today,
        navLinks: true, // can click day/week names to navigate views
        selectable: false,
        selectMirror: true,
        select: function(arg) {
          var title = prompt('Event Title:');
          if (title) {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay
            })
          }
          calendar.unselect()
        },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: []
        });

      calendar.render();
    });

  </script>
  
  <!--<input type="hidden" id="url" value="{{url('/')}}">
  <input type="text" id="event" value="{{App\Events::events()}}"> -->
  <div id='calendar'></div>
</div>

@endsection