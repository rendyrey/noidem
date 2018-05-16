@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Main Dashboard</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          </div>
        </div>
      </div>
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <p class="text-muted font-13 m-b-30">
                {{-- The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built. --}}
              </p>
              <div id='calendar'></div>
              <br>
              <table id="datatable" class="table table-striped table-bordered table_dashboard">
                <thead>
                  <tr>
                    <th><center>Month</center></th>
                    <th><center>Target Join Date</center></th>
                    <th><center>Request Date</center></th>
                    <th><center>Target Fullfillment Date</center></th>
                    <th><center>No. RCR</center></th>
                    <th><center>Position</center></th>
                    <th><center>Gender</center></th>
                    <th><center>Exp</center></th>
                    <th>Edu Level</th>
                    <th>Major Group</th>
                    <th>Adv Category</th>
                    <th>Adv Media</th>
                    <th>Plan Start Date</th>
                    <th>Plan End Date</th>
                    <th>Actual Start Date</th>
                    <th>Actual End Date</th>
                    <th>Target Result</th>
                    <th>Actual Result</th>
                    <th>Target Pg</th>
                    <th>Actual Pg</th>
                    <th>Awaiting</th>
                    <th>In-Process</th>
                    <th>Done</th>
                    <th>Failed</th>
                    <th>Passed</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>


      <div id="CalenderModalEdit" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Main Dashboard</h4>
            </div>
            <div class="modal-body" id="modal_body">

              <input type="text" name="tanggal" value="" id="tanggal">
            </div>
            <div class="modal-footer">
              {{-- <button type="button" class="btn btn-success" id="psychotest_details">Details</button> --}}
              <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

    <!-- jQuery -->
    <script src="{{ URL::asset('assets/gentelella/vendors/jquery/dist/jquery.min.js')}}"></script>

    <script>
    /* CALENDAR */


    function  init_calendar() {

      if( typeof ($.fn.fullCalendar) === 'undefined'){ return; }
      console.log('init_calendar');


      var date = new Date(),
      d = '7',
      m = '04',
      y = '2018',
      started,
      categoryClass;

      var calendar = $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay,listMonth'
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
          $('#fc_create').click();

          started = start;
          ended = end;

          $(".antosubmit").on("click", function() {
            var title = $("#title").val();
            if (end) {
              ended = end;
            }

            categoryClass = $("#event_type").val();

            if (title) {
              calendar.fullCalendar('renderEvent', {
                title: title,
                start: started,
                end: end,
                allDay: allDay
              },
              true // make the event "stick"
            );
          }

          $('#title').val('');

          calendar.fullCalendar('unselect');

          $('.antoclose').click();

          return false;
        });
      },
      eventClick: function(calEvent, jsEvent, view) {
        $('#fc_edit').click();
        $('#tanggal').val(calEvent.tanggal);
        var tanggal = calEvent.tanggal;
        $.ajax({
          url:"{{url('calendar_data')}}",
          type:"GET",
          data:{
            'tanggal':tanggal
          },
          success:function(result){
            $("#modal_body").html(result);
          }
        });

        categoryClass = $("#event_type").val();

        $(".antosubmit2").on("click", function() {
          calEvent.title = $("#title2").val();

          calendar.fullCalendar('updateEvent', calEvent);
          $('.antoclose2').click();
        });

        calendar.fullCalendar('unselect');
      },
      dayClick: function(date) {
        //var time = new Date(start);
        //var waktu = new Date('2018','04','07');
        //alert(date.format());
        var tanggal = date.format();
        $('#fc_edit').click();
        $.ajax({
          url:"{{url('calendar_data')}}",
          type:"GET",
          data:{
            'tanggal':tanggal
          },
          success:function(result){
            $("#modal_body").html(result);
          }
        });
      },
      editable: true,
      events:{
        url:"{{url('calendar_psychotest')}}",
        type:"GET"
      }

    });

  };

  $(document).ready(function(){
    init_calendar();
    $("#psychotest_details").click(function(){
      var id = $(this).val();
      window.location = "pelamar_inproses/details/"+id;
    });
  });
  </script>
@endsection
