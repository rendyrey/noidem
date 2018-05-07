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

        <div class="row">
          <div class="col-md-8">
            <button class="btn btn-md btn-success filter"  value="Passed">Passed</button>
            <button class="btn btn-md btn-warning filter"  value="Awaiting">Awaiting</button>
            <button class="btn btn-md btn-danger filter"  value="Failed">Failed</button>
            <button class="btn btn-md btn-info filter"  value="All">All</button>
          </div>
          <div class="col-md-4">
            <div class="text-right">
            <button class="btn btn-md btn-info" data-toggle="modal" data-target="#myModal">Export to CSV</button>
            <button class="btn btn-md btn-info" data-toggle="modal" data-target="#myModal2">Import CSV</button>
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



          <table id="pelamar" class="table table-striped table-bordered table-hover">
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
            <tbody id="isi_pelamar">
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
