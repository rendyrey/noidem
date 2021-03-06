@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Pelamar <small>in-process</small></h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
      @if (Session::has('message'))
        <div class="alert alert-{{Session::get('panel')}} alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          {{ Session::get('message') }}
        </div>
      @endif
      @if($errors->any())
        <ul>
          @foreach ($errors->all() as $error )
            <font color="red"><li>{{$error}}</li> </font>
          @endforeach
        </ul>
      @endif


      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Test Scheduling</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Psychotest</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Interview</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Calendar Events <small>Psychotest</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <button id="new_schedule" type="button" class="btn btn-success" data-toggle="modal" data-target="#CalenderModalNew">Add Schedule</button>

                            <div id='calendar'></div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No Applicant</th>
                          <th>Name</th>
                          <th>Edu Level</th>
                          <th>Institution</th>
                          <th>Major Group</th>
                          <th>Major</th>
                          <th>Job Interest</th>
                          <th>NTM</th>
                          <th>Ketelitian dan Kecepatan</th>
                          <th>Hitung Cepat</th>
                          <th>Logika Bahasa</th>
                          <th>Kreativitas Angka</th>
                          <th>Kreativitas Gambar</th>
                          <th>Nilai Akademik</th>
                          <th>Complete CV</th>
                          <th>Pengenalan Diri</th>
                          <th>Disc</th>
                          <th> </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pelamar as $value)
                          <tr>
                            <td><a href="{{url("pelamar/$value->id/detail")}}" target="_blank"><font color="blue">{{$value->no_applicant}}</font></a></td>
                            <td>{{$value->nama}}</td>
                            <td>{{$value->tingkat_pendidikan->tingkat}}</td>
                            <td>{{$value->institusi->nama_institusi}}</td>
                            <td>{{$value->major->major_grup->nama_grup}}</td>
                            <td>{{$value->major->major}}</td>
                            <td>
                              @if ($value->job_interest1)
                                {{$value->job_interest1->position_name}}
                              @endif
                              @if ($value->job_interest2)
                                | {{$value->job_interest2->position_name}}
                              @endif
                              @if ($value->job_interest3)
                                | {{$value->job_interest3->position_name}}
                              @endif
                              @if ($value->job_interest4)
                                | {{$value->job_interest4->position_name}}
                              @endif
                            </td>
                            <td>belum</td>
                            <td>belum</td>
                            <td>belum</td>
                            <td>belum</td>
                            <td>belum</td>
                            <td>belum</td>
                            <td>belum</td>
                            <td>belum</td>
                            <td>belum</td>
                            <td>belum</td>
                            <td>belum</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" id="inproses_proses">Process</button>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- calendar modal -->
      <div id="CalenderModalNew" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">New Psychotest Schedule Entry</h4>
            </div>
            <div class="modal-body">
              <div id="testmodal" style="padding: 5px 20px;">
                <form id="" class="form-horizontal calender" role="form" action="{{url('pelamar_inproses/tambah_schedule')}}" method="POST">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Psychotest Date</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control myDatepicker2" id="tanggal" name="tanggal">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">City</label>
                    <div class="col-sm-9">
                      <select name="id_kota" class="form-control select_search" style="width:100%" data-placeholder="Pilih Kota" required>
                        <option value=""></option>
                        @foreach ($kota as $key=>$value )
                          <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Quota</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="kuota">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Test Method</label>
                    <div class="col-sm-9">
                      <select name="id_test_method" class="form-control select_search" style="width:100%" data-placeholder="Pilih Test Method" required>
                        <option value=""></option>
                        @foreach($test_method as $key=>$value)
                          <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary antosubmit">Save changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="CalenderModalEdit" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
            </div>
            <div class="modal-body">

              <div id="testmodal2" style="padding: 5px 20px;">
                <form id="antoform2" class="form-horizontal calender" role="form" method="POST" action="{{url('pelamar_inproses/update_schedule')}}">
                  <input type="hidden" class="form-control" id="id_psychotest" name="id">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                      <label id="title2" class="control-label"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Psychoteste Date</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control myDatepicker2" id="tanggal" name="tanggal">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">City</label>
                    <div class="col-sm-9">
                      <select name="id_kota" class="form-control select_search" style="width:100%" data-placeholder="Pilih Kota" required>
                        <option value=""></option>
                        @foreach ($kota as $key=>$value )
                          <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Quota</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  id="kuota" name="kuota">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Test Method</label>
                    <div class="col-sm-9">
                      <select name="id_test_method" class="form-control select_search" style="width:100%" data-placeholder="Pilih Test Method" required>
                        <option value=""></option>
                        @foreach($test_method as $key=>$value)
                          <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>



                </div>
              </div>
              <div class="modal-footer">


                <button type="button" class="btn btn-success" id="psychotest_details">Details</button>

                <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary antosubmit2">Save changes</button>
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
            //$('#new_schedule').click();

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
            $('#tanggal').val('2018-06-17');

            //calendar.fullCalendar('unselect');

            //$('.antoclose').click();

            //return false;
          });
        },
        eventClick: function(calEvent, jsEvent, view) {
          $('#fc_edit').click();
          $('#title2').html(calEvent.title);
          $('#id_psychotest').val(calEvent.id);
          $('#tanggal').val(calEvent.tanggal);
          $('#kuota').val(calEvent.kuota);
          $('#kuota_left').val(calEvent.kuota_left);
          $('#psychotest_details').val(calEvent.id);

          categoryClass = $("#event_type").val();

          $(".antosubmit2").on("click", function() {
            calEvent.title = $("#title2").val();

            calendar.fullCalendar('updateEvent', calEvent);
            $('.antoclose2').click();
          });

          calendar.fullCalendar('unselect');
        },
        dayClick: function(start) {
          var time = new Date(start);
          var waktu = new Date('2018','04','07');
          //$('#new_schedule').click();
          //alert('hi');
          //alert(waktu);
        },
        editable: true,
        events:{
          url:"{{url('pelamar_inproses/get_psychotest')}}",
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
