<!-- footer content -->
<footer>
  <div class="pull-right">
    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="{{ URL::asset('assets/gentelella/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ URL::asset('assets/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('assets/gentelella/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{ URL::asset('assets/gentelella/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{ URL::asset('assets/gentelella/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{ URL::asset('assets/gentelella/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ URL::asset('assets/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ URL::asset('assets/gentelella/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{ URL::asset('assets/gentelella/vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{ URL::asset('assets/gentelella/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{ URL::asset('assets/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ URL::asset('assets/gentelella/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap-datetimepicker -->
<script src="{{ URL::asset('assets/gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- DateJS -->
<script src="{{ URL::asset('assets/gentelella/vendors/DateJS/build/date.js')}}"></script>
<!-- Datatables -->
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<!-- JQVMap -->
<script src="{{ URL::asset('assets/gentelella/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ URL::asset('assets/gentelella/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{ URL::asset('assets/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ URL::asset('assets/gentelella/build/js/custom.min.js')}}"></script>
<!-- select2 -->
<!-- Select2 -->
<script src="{{ URL::asset('assets/select2/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('assets/select2/select2.js')}}"></script>
<!-- FullCalendar -->
   <script src="{{URL::asset('assets/gentelella/vendors/moment/min/moment.min.js')}}"></script>
   <script src="{{URL::asset('assets/gentelella/vendors/fullcalendar/dist/fullcalendar.min.js')}}"></script>

<script>
$('.table_dashboard').dataTable( {
  "ordering": false
});
</script>
<script>
$(document).ready(function(){
  $('.selectAll').change(function() {
    // alert('hi');
    $('.checkBoxClass').prop('checked', this.checked).change();
  });
});
</script>
<script>
$(function(){
  $('.myDatepicker2').datetimepicker({
    format: 'YYYY-MM-DD'
  });

  $('.select_search').select2();


  $("#select_posisi").change(function(){
    var nama_posisi = $(this).val();
    $.ajax({
      url:"{{url('vacancy_advertising/get_posisi_publish')}}",
      type:"POST",
      data:"nama_posisi="+nama_posisi,
      success:function(result){
        $("#select_posisi_publish").html(result);
      }
    });
  });

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
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });



  $(".detail_iklan").click(function(){
    var id = $(this).val();
    $.ajax({
      url:"{{url('vacancy_advertising/detail_iklan')}}",
      type:'POST',
      data:"id="+id,
      success:function(result){
        $(".isi_modal").html(result);
      }
    });
  });
  $(".btn_tambah_loker").click(function(){
    var id = $(this).val();
    $.ajax({
      url:"{{url('vacancy_advertising/form_tambah_loker')}}",
      type:'POST',
      data:"id="+id,
      success:function(result){
        $(".isi_modal2").html(result);
      }
    });
  });

  $(".btn_edit_pelamar").click(function(){
    var id = $(this).val();
    $.ajax({
      url:"{{url('pelamar/edit_pelamar/')}}",
      type:"POST",
      data:"id="+id,
      success:function(result){
        $(".isi_edit_pelamar").html(result);
      }
    });
  });
});

$(".btn_detail_pelamar").click(function(){
  var id_iklan = $(this).val();
  $.ajax({
    url:"{{url('vacancy_advertising/detail_pelamar/')}}",
    type:"POST",
    data:"id_iklan="+id_iklan,
    success:function(result){
      $(".detail_iklan_pelamar").html(result);
    }
  });
});
</script>






</body>
</html>
