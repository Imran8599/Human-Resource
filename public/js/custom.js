


  (function(){
    "use strict"; 


    //DataTable
    $(document).ready( function () {
      $('.dataTable').DataTable({
         responsive: true
      });
    });

    //Datepicker
    $( function() {
      $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
    } );
  
    //Summernote editor
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  
    $(document).ready(function(){
      
      //When Department select then Designation value set in option.
      $('#department').change(function(){
        var id = $('#department').val();
        var url = $('#url').val();
        $.ajax({
          url: url+'/'+'select-department',
          success:function(rows){
            var html = '';
            rows.forEach(function(row){
              if(row.department_id == id){
                html += '<option value="'+ row.designation +'">' +row.designation+ '</option>';
              }
              $('#designation').html(html);
            });
          }
        });
        
      });
  
  
      //Calculate button events
      $('#generate').hide();
      $('#calculate').click(function(){
        var earning_value = parseInt($('#earning_value').val());
        var deduction_value = parseInt($('#deduction_value').val());
        var basic_salary = parseInt($('#basic_salary').val());

        if(!earning_value){
          earning_value = 0;
        }
        if(!deduction_value){
          deduction_value = 0;
        }
        console.log(earning_value);
        $('#earning').val(earning_value);
        $('#deduction').val(deduction_value);
        $('#net_salary').val(basic_salary+earning_value-deduction_value);
  
        $('#generate').show();
      });
  
      //Admin Copy
      $('#adminCopy').on('click', function(){
        $('#adminInputEmail').val($('#adminEmail').text());
        $('#adminInputPassword').val($('#adminPassword').text());
      });


      //Employee Copy
      $('#employeeCopy').on('click', function(){
        $('#empInputEmail').val($('#empEmail').text());
        $('#empInputPassword').val($('#empPassword').text());
      });


    });


    //Nice Select ...
    $('.niceSelect').niceSelect();


    
  $(document).ready(function () {
		$('.dataTables_wrapper select').addClass('ncSelect');

		$('.ncSelect').niceSelect();
		$('.ncSelect').on('click', function () {
			$(this).toggleClass('open_list');
		});
	});
    

  })();
  
