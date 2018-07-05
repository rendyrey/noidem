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
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recruitment</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pre-Screening</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Psychotest</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Interview</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <table id="" class="table table-striped table-bordered table_dashboard">
                      <thead>
                        <tr>
                          <th>No Applicant</th>
                          <th>Name</th>
                          <th>Gender</th>
                          <th>Edu Level</th>
                          <th>Institution Name</th>
                          <th>Major Group</th>
                          <th>Major</th>
                          <th>Work Experience</th>
                          <th>Line of Business</th>
                          <th><input type="checkbox" class="selectAll"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; ?>
                        @foreach($pelamar_recruitment as $value)
                          <tr>
                            <td>{{$value->no_applicant}}</td>
                            <td>{{$value->nama}}</td>
                            <td>{{$value->jenis_kelamin}}</td>
                            <td>{{$value->tingkat_pendidikan->tingkat}}</td>
                            <td>{{$value->institusi->nama_institusi}}</td>
                            <td>{{$value->major->major_grup->nama_grup}}</td>
                            <td>{{$value->major->major}}</td>
                            <td>{{$value->id_bidang_usaha=='0'?'No':'Yes'}}</td>
                            <td>{{$value->get_bidang_usaha->bidang_usaha}}</td>
                            <td><input class="checkBoxClass" type="checkbox" name="checkbox[]" value="{{$i}}"></td>
                          </tr>
                          <?php $i++;?>
                        @endforeach
                      </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" id="failed_reprocess">Process</button>
                    <button type="button" class="btn btn-danger" id="failed_delete">Delete</button>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <table id="" class="table table-striped table-bordered table_dashboard">
                      <thead>
                        <tr>
                          <th>No Applicant</th>
                          <th>Name</th>
                          <th>Edu Level</th>
                          <th>Institution Name</th>
                          <th>Major Group</th>
                          <th>Major</th>
                          <th>Accreditation</th>
                          <th>GPA</th>
                          <th>Age</th>
                          <th>Study Period</th>
                          <th>Work Experience</th>
                          <th>Job Interest</th>
                          <th><input type="checkbox" class="selectAll"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; ?>
                        @foreach($pelamar_prescreening as $value)
                          <tr>
                            <td>{{$value->no_applicant}}</td>
                            <td>{{$value->nama}}</td>
                            <td>{{$value->tingkat_pendidikan->tingkat}}</td>
                            <td>{{$value->institusi->nama_institusi}}</td>
                            <td>{{$value->major->major_grup->nama_grup}}</td>
                            <td>{{$value->major->major}}</td>
                            <td>{{$value->akreditasi->akreditasi}}</td>
                            <td>{{$value->gpa}}</td>
                            <?php
                            $date = new DateTime(date('Y-m-d',strtotime($value->tgl_lahir)));
                            $now = new DateTime();
                            $interval = $now->diff($date);
                            $age = $interval->y;
                            ?>
                            <td>{{$age}}</td>
                            <td>10</td>
                            <td>{{$value->id_bidang_usaha=='0'?'No':'Yes'}}</td>
                            <td>{{$value->get_bidang_usaha->bidang_usaha}}</td>
                            <td><input class="checkBoxClass" type="checkbox" name="checkbox[]" value="{{$i}}"></td>
                          </tr>
                          <?php $i++;?>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <table id="" class="table table-striped table-bordered table_dashboard">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>No Applicant</th>
                          <th>Name</th>
                          <th>NTM</th>
                          <th>Ketelitian & Kecepatan</th>
                          <th>Hitung cepat</th>
                          <th>Logika Bahasa</th>
                          <th>Kreativitas Angka</th>
                          <th>Kreativitas Gambar</th>
                          <th>Daftar Isian</th>
                          <th>Metode Tes</th>
                          <th><input type="checkbox" class="selectAll"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; ?>
                        @foreach($pelamar_psychotest as $value)
                          <tr>
                            <td>{{$i}}</td>
                            <td>{{$value->no_applicant}}</td>
                            <td>{{$value->nama}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input class="checkBoxClass" type="checkbox" name="checkbox[]" value="{{$i}}"></td>
                          </tr>
                          <?php $i++;?>
                        @endforeach
                      </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" id="psychotest_process"  data-toggle="modal" data-target="#ProcessPsychotest">Process</button>

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- calendar modal -->
      <div id="ProcessPsychotest" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Process Test Scheduling</h4>
            </div>
            <div class="modal-body">
              <form id="" class="form-horizontal calender" role="form" action="{{url('pelamar_process_psychotest')}}" method="POST">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Test Method</label>
                  <div class="col-sm-9">
                    <select name="test_method" class="form-control">
                      <option value="Pencil and Paper Test">Pencil and Paper Test</option>
                      <option value="Computer Based Test">Computer Based Test</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Psychotest Date</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control myDatepicker2" id="tanggal" name="tanggal">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary antosubmit">Save changes</button>

              </div>
            </div>
          </div>
        </div>


      @endsection
