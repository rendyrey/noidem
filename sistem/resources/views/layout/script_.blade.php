<div class="footer">
  <div class="footer-inner">
    <div class="footer-content">
      <span class="small-120">Form Lamaran
        &copy; 2016
      </span>
    </div>
  </div>
</div>
  <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
  </a>
  </div>
<script src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script>
$(document).ready(function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(700, 0).slideUp(500, function() {
    $(this).remove();
  });
  }, 2500);
});
</script>
<script type="text/javascript">
  if('ontouchstart' in document.documentElement) document.write("<script src='{{ URL::asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/buttons.flash.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/dataTables.select.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.hotkeys.index.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/ace-editable.min.js') }}"></script>
<script type="text/javascript">

function validAngka(a)
{
    if(!/^[0-9.]+$/.test(a.value))
    {
      a.value = a.value.substring(0,a.value.length-1);
    }
}

  jQuery(function($)
  {
    $('#dynamic-table')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null
      ],
      "aaSorting": [],
    });

    $('#institusi')
    .DataTable({
      bAutoWidth: false,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#kota')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null
      ],
      "aaSorting": [],
    });

    $('#major')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null
      ],
      "aaSorting": [],
    });

    $('#event_vacancy')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": false },
        { "bSortable": false },
        { "bSortable": false },
        { "bSortable": false },
        { "bSortable": false },
        { "bSortable": false },
      ],
      "aaSorting": [],
  });

    $('#menu_user')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#tanggal_psychotest')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#kriteria_syarat')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#akreditasi')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#pelamar')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#vacancy')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null,null,null,null,null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#user')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null
      ],
      "aaSorting": [],
    });
});
</script>
<script type="text/javascript">
jQuery(function($)
{
  $('.modal.aside').ace_aside();
  $('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});
  $(document).one('ajaxloadstart.page', function(e) {
    $('.modal.aside').remove();
    $(window).off('.aside')
  });
});
</script>
<script type="text/javascript">
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
</script>
<script>
  /***************/
  $('.show-details-btn').on('click', function(e) {
    e.preventDefault();
    $(this).closest('tr').next().toggleClass('open');
    $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
  });


  /***************/
</script>
<script>
/*Modal Delete*/
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
  });
</script>
{{-- untuk pelamar --}}
<script>
$(document).ready(function(){
  $(".filter").click(function(){
    var filter = $(this).val();
    $(".filter").removeClass('active');
    $(this).addClass('active');
    // alert('hi');
    if(filter == "All"){
      location.reload();
    }else{
      $.ajax({
        url: "{{url('pelamar/filter/')}}",
        type: 'POST',
        data: 'filter='+filter,
        success: function (result) {
          $("#isi_pelamar").html(result);

        }
      });
    }
  });

$("#export_csv").click(function(){
  
})
});
</script>

<script>
$(document).ready(function(){
//untuk otomatis format currency
  $('.auto_currency').keyup(function(event) {

    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40) return;

    // format number
    $(this).val(function(index, value) {
      return value
      .replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
      ;
    });
  });
  //untuk cek start date
  $(".simpan_iklan").click(function(){
    
    var currentDate = new Date();
    var yyyy = currentDate.getFullYear();
    var mm = currentDate.getMonth()+1;
    mm<10?mm="0"+mm:mm=mm;
    var dd = currentDate.getDate();
    var today = yyyy+'-'+mm+'-'+dd;
  
    
  });

  $(".filter_vacancy").click(function(){
    var filter_vacancy = $(this).val();
    $.ajax({
      url: "{{url('vacancy_advertising/filter')}}",
      type: "POST",
      data: "filter_vacancy="+filter_vacancy,
      success: function(result){
        $("#isi_vacancy").html(result);
      }
    });
  });

});
    
</script>
<!-- <script type="text/javascript">
  var $select1 = $( '#select1_1' ),
      $select2 = $( '#select2_1' ),
      $options = $select2.find( 'option' );

      $select1.on( 'change', function() {
      $select2.html( $options.filter( '[name="' + this.value + '"]' ) );
      } ).trigger( 'change' );
</script> -->
</body>
</html>
