@extends('layout.index')
@section('content')
    <div class="page-content">
    @if (Session::has('message'))
    <div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <h4><i class="icon fa fa-check"></i> Info !</h4>
    {{ Session::get('message') }}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <h4><i class="icon fa fa-ban"></i> Perhatian !</h4>
    @foreach ($errors->all() as $error)
    {{ $error }}<br>
    @endforeach
    </div>
    @endif
    <div class="row">
      <div class="col-xs-12">
        <div class="clearfix">
          <!-- <div class="pull-left tableTools-container">
            <a class="btn btn-white btn-primary" data-toggle="modal" data-target="#myModal" title= "Tambah Data"><i class='fa fa-plus'></i> Tambah Data</a>
          </div> -->
        </div>
          <div>
          <table id="pelamar" class="table table-striped table-bordered table-hover">
          <thead>
          <tr>
            <th>No Applicant</th>
            <th>Nama</th>
            <th>Tingkat Pendidikan</th>
            <th>Institusi</th>
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
            <td><span class="label label-sm {{$lbl}} arrowed arrowed-righ">{{$value->status_pelamar}}</span></td>
            <td>
              <div class="btn-group">
              <button class="btn btn-xs btn-success" onclick="window.location.href='pelamar/{{$value->id}}/detail'" title="Detail Pelamar">
                <i class="ace-icon fa fa-search bigger-120"></i>
              </button>

              <button class="btn btn-xs btn-info" onclick="window.location.href='pelamar/{{$value->id}}/edit'" title="Edit Status Pelamar">
                <i class="ace-icon fa fa-pencil bigger-120"></i>
              </button>
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
@stop