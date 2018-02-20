$('#plan_start_date').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd'
  }).next().on(ace.click_event, function(){
          $(this).prev().focus();
        });
  $('#plan_end_date').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd'
  }).next().on(ace.click_event, function(){
          $(this).prev().focus();
        });
  $('#actual_start_date').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd'
  }).next().on(ace.click_event, function(){
          $(this).prev().focus();
        });
  $('#actual_end_date').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd'
  }).next().on(ace.click_event, function(){
    $(this).prev().focus();
  });

  $('#tgl_kadaluarsa').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd'
  }).next().on(ace.click_event, function(){
    $(this).prev().focus();
  });