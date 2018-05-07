@extends('layout.index')
@section('content')

  <style>
  .kanan{
    text-align:right
  }
  </style>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Pelamar <small></small></h3>
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
            <a href="{{url("vacancy_advertising/$pelamar->id_iklan/detail_pelamar")}}" class="btn btn-primary btn-md">Back</a>
              <div class="row">
                <!-- personal data -->
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><i class="fa fa-user green">&nbsp;&nbsp;</i>Personal Data</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class=" col-md-4 col-sm-4 col-xs-12">Nama
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12" >
                            {{$pelamar->nama}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Jenis Kelamin
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->jenis_kelamin}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Status
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->status}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Tanggal Lahir
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{date('d M Y',strtotime($pelamar->tgl_lahir))}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Email
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->email}}
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /personal data -->

                <!-- general data -->
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><i class="fa fa-book green">&nbsp;&nbsp;</i>General Data</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content collapse">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">No Applicant
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12" >
                            {{$pelamar->no_applicant}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Job Interest 1
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->job_interest_1}} ({{$loker1}})
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Job Interest 2
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->job_interest_2}} ({{$loker2}})
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Job Interest 3
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->job_interest_3}} ({{$loker3}})
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Job Interest 4
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->job_interest_4}} ({{$loker4}})
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Info Vacancy
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->iklan->advertising_media->media}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Medion Employee Name
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->medion_employee_name}}
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /general data -->
              </div>

              <div class="row">
                <!-- educational background -->
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><i class="fa fa-lightbulb-o green">&nbsp;&nbsp;</i>Educational Background</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content collapse">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Tingkat Pendidikan
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12" >
                            {{$pelamar->tingkat_pendidikan->tingkat}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Institusi
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->institusi->nama_institusi}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Other Institusi
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->other_institusi}} ({{$loker2}})
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Major
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->major->major}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Other Major
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->other_major}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">GPA
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->gpa}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Start Year Education
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->start_year_education}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">End Year Education
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->end_year_education}}
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /educational background -->
                <!-- psychotest readiness -->
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><i class="fa fa-check-square-o green">&nbsp;&nbsp;</i>Psychotest Readniess</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content collapse">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Tanggal Psychotest
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{date('d M Y',strtotime($pelamar->tanggal_psychotest->tanggal))}}
                            ({{$pelamar->tanggal_psychotest->kota->kota}})
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /psychotest readiness -->


              </div>

              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><i class="fa fa-align-left green"></i> Work Experience</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content collapse">

                      <!-- start accordion -->
                      <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel {{$we1}}">
                          <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4 class="panel-title">Work Experience #1</h4>
                          </a>
                          <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Bidang Usaha
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$id_bidang_usaha_1}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Other Bidang Usaha
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$other_bidang_usaha_1}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Start Year Work Experience
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$start_year_1}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">End Year Work Experience
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$end_year_1}}
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="panel {{$we2}}">
                          <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title">Work Experience #2</h4>
                          </a>
                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Bidang Usaha
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$id_bidang_usaha_2}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Other Bidang Usaha
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$other_bidang_usaha_2}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Start Year Work Experience
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$start_year_2}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">End Year Work Experience
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$end_year_2}}
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="panel {{$we3}}">
                          <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4 class="panel-title">Work Experience #3</h4>
                          </a>
                          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Bidang Usaha
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$id_bidang_usaha_3}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Other Bidang Usaha
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$other_bidang_usaha_3}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Start Year Work Experience
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$start_year_3}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">End Year Work Experience
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$end_year_3}}
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="panel {{$we4}}">
                          <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <h4 class="panel-title">Work Experience #4</h4>
                          </a>
                          <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Bidang Usaha
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$id_bidang_usaha_4}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Other Bidang Usaha
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$other_bidang_usaha_4}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">Start Year Work Experience
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$start_year_4}}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 col-sm-4 col-xs-12">End Year Work Experience
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$end_year_4}}
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end of accordion -->


                    </div>
                  </div>
                </div>

                <!-- psychotest readiness -->
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><i class="fa fa-exclamation-circle green">&nbsp;&nbsp;</i>Confirmation</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a>&nbsp;</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content collapse">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Pernah PKL di Medion
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->pernah_pkl_dimedion}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Tanggal Mulai PKL
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->tgl_praktek_start}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Tanggal Selesai PKL
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->tgl_praktek_end}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Pernah Psychotest di Medion
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$pelamar->pernah_psychotest_dimedion}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 col-sm-4 col-xs-12">Tanggal Psychotest di Medion
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            @if($pelamar->tgl_psychotest_dimedion)
                              {{date('d M Y',strtotime($pelamar->tgl_psychotest_dimedion))}}
                            @endif
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /psychotest readiness -->
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
