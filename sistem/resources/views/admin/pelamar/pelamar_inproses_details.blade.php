@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Applicant <small>psychotest @ {{date('d M Y',strtotime($tgl_psychotest->tanggal))}}</small></h3>
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
      <a href="{{url('pelamar_inproses')}}"> <button type="button" class="btn btn-primary">Back</button></a>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Invitation</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Invited</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                           <table id="datatable" class="table table-striped table-bordered table_dashboard">
                <thead>
                  <tr>
                    <th>No Applicant</th>
                    <th>Name</th>
                    <th>Edu Level</th>
                    <th>Institution Name</th>
                    <th>Major</th>
                    <th><input type="checkbox" class="selectAll"></th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
                  @foreach($pelamar_invitation as $value)
                    <tr>
                      <?php
                      $lbl = "";
                      if($value->status_pelamar == "Passed") {
                        $lbl = "label-success";
                      } elseif ($value->status_pelamar == "Awaiting") {
                        $lbl = "label-warning";
                      } else {
                        $lbl = "label-danger";
                      }
                      ?>
                      <td><a href="{{url("pelamar/$value->id/detail")}}" target="_blank"><font color="blue">{{$value->no_applicant}}</font></a></td>
                      <td>{{$value->nama}}</td>
                      <td>{{$value->tingkat_pendidikan->tingkat}}</td>
                      <td>{{$value->institusi->nama_institusi}}</td>
                      <td>{{$value->major->major}}</td>
                      <td><input class="checkBoxClass" type="checkbox" name="checkbox[]" value="{{$i}}"></td>
                    </tr>
                    <?php $i++;?>
                  @endforeach
                </tbody>
              </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                      </div>
                    </div>
             
            </div>
          </div>
        </div>
      </div>

      <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class="smaller lighter blue no-margin">Export Tabel Pelamar ke CSV</h3>
            </div>
            <form action="{{url('export_pelamar')}}" method="post">
              {!! csrf_field() !!}
              <div class="modal-body">
                <div class="form-group">
                  <label>Status Pelamar</label>
                  <select name="status_pelamar">
                    <option value="All" selected>All</option>
                    <option value="Passed">Passed</option>
                    <option value="Awaiting">Awaiting</option>
                    <option value="Failed">Failed</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                  <i class="ace-icon fa fa-times"></i>Close</button>
                  <button type="submit" class="btn btn-sm btn-primary">Simpan</button>&nbsp;&nbsp;
                </div>
              </form>
            </div>
          </div>
        </div>
        <div id="myModal2" class="modal fade" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Export Tabel Pelamar ke CSV</h3>
              </div>
              <form action="{{url('import_pelamar')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="modal-body">
                  <div class="form-group">
                    <label>File CSV Pelamar</label>
                    <input type="file" name="file">
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>&nbsp;&nbsp;
                  </div>
                </form>
              </div>
            </div>
          </div>
    @endsection
