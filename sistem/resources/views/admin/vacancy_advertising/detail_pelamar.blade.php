@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Detail Pelamar <small></small></h3>
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
              <h3>Detail Pelamar @ <small>{{$iklan->advertising_category->kategori}} category and {{$iklan->advertising_media->media}} media</h3></small>
              <a href="{{url("vacancy_advertising/$iklan->id/detail_pelamar/Passed")}}"> <button type="button" class="btn btn-success pelamar_passed">Passed</button></a>
              <a href="{{url("vacancy_advertising/$iklan->id/detail_pelamar/Awaiting")}}"><button type="button" class="btn btn-warning pelamar_awaiting">Awaiting</button></a>
              <a href="{{url("vacancy_advertising/$iklan->id/detail_pelamar/Failed")}}"><button type="button" class="btn btn-danger pelamar_failed">Failed</button></a>
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
                          <a class="btn btn-xs btn-success" href="{{url("vacancy_advertising/$value->id/personal_detail")}}" title="Detail Pelamar">
                            <i class="ace-icon fa fa-search bigger-120"></i>
                          </a>

                          <a href="{{url("pelamar/$value->id/edit")}}">
                            <button class="btn btn-xs btn-info btn_edit_pelamar" title="Edit Status Pelamar">
                              <i class="ace-icon fa fa-pencil bigger-120"></i>
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
    </div>
  </div>
@endsection
