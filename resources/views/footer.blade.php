
</div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<!-- jQuery -->
<script src="{{asset('public/js/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/js/jquery-ui.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/js/summernote.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/js/adminlte.js')}}"></script>
<!-- DataTable -->
<script src="{{asset('public/js/jquery.dataTables.js')}}"></script>

<script src="{{asset('public/js/jquery.nice-select.min.js')}}"></script>
<!--<script src="{{asset('public/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/js/dataTables.responsive.min.js')}}"></script>-->
<script src="{{asset('public/js/custom.js')}}"></script>


<!--Date time picker-->
<script type="text/javascript" src="{{asset('public/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('public/js/bootstrap-datetimepicker.fr.js')}}" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
</script>


<!--Change Image-->
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#showImage')
              .attr('src', e.target.result)
              .width(75)
              .height(75);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
</body>
</html>
