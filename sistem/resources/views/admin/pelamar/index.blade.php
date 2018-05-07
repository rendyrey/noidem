@extends('layout.index')
@section('content')
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
      <a href="{{url('pelamar/update_tabel/Passed')}}"> <button type="button" class="btn btn-success pelamar_passed">Passed</button></a>
      <a href="{{url('pelamar/update_tabel/Awaiting')}}"><button type="button" class="btn btn-warning pelamar_awaiting">Awaiting</button></a>
      <a href="{{url('pelamar/update_tabel/Failed')}}"><button type="button" class="btn btn-danger pelamar_failed">Failed</button></a>
      <div class="text-right">
      <button class="btn btn-md btn-info" data-toggle="modal" data-target="#myModal">Export to CSV</button>
      <button class="btn btn-md btn-info" data-toggle="modal" data-target="#myModal2">Import CSV</button>
    </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered table_dashboard">
                <thead>
                  <tr>
                    <th>No Applicant</th>
                    <th>Nama</th>
                    <th>Tingkat Pendidikan</th>
                    <th>Institusi</th>
                    <th>Adv. Media</th>
                    <th>Status</th>
                    <th>aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pelamar as $value)
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
                      <td>{{$value->no_applicant}}</td>
                      <td>{{$value->nama}}</td>
                      <td>{{$value->tingkat_pendidikan->tingkat}}</td>
                      <td>{{$value->institusi->nama_institusi}}</td>
                      <td>{{$value->iklan->advertising_media->media}}</td>
                      <td><span class="label label-sm {{$lbl}} arrowed arrowed-righ">{{$value->status_pelamar}}</span></td>
                      <td>
                        <div class="btn-group">
                          <a href="{{url("pelamar/$value->id/detail")}}"><button class="btn btn-xs btn-success" title="Detail Pelamar">
                            <i class="fa fa-search bigger-120"></i>
                          </button>
                          </a>

                          <a href="{{url("pelamar/$value->id/edit")}}">
                            <button class="btn btn-xs btn-info btn_edit_pelamar" title="Edit Status Pelamar">
                              <i class="fa fa-pencil bigger-120"></i>
                            </button>
                          </a>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
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
