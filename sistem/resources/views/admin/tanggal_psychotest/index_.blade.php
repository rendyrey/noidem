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
          <div class="pull-left tableTools-container">
            <a class="btn btn-white btn-primary" data-toggle="modal" data-target="#myModal" title= "Tambah Data"><i class='fa fa-plus'></i> Tambah Data</a>
          </div>
        </div>
        <div>
          <table id="tanggal_psychotest" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Iklan</th>
                <th>Kota</th>
                <th>Tanggal Psychotest</th>
                <th>Kuota Tes</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tanggal_psychotest as $value)
              <tr>
                <td>{{$value->iklan->advertising_media->media}} ( {{$value->iklan->domain}} )</td>
                <td>{{$value->kota->kota}}</td>
                <td>{{$value->tanggal}}</td>
                <td>{{$value->kuota}}</td>
                <td>{{$value->keterangan}}</td>
                <td>
                  <a class="green" href="tanggal_psychotest/{{$value->id}}/edit">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                  </a>
                  <!-- <a class="red" href="#" ata-href="jabatan/{{$value->id}}/delete" data-toggle="modal" data-target="#confirm-delete">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                  </a> -->
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

<!-- Modal Tambah Bidang Usaha-->
<div id="myModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="smaller lighter blue no-margin">Tambah Data Tanggal Psychotest</h3>
      </div>
      <form action="{{url('tambah_tanggal_psychotest')}}" method="POST">
      <div class="modal-body">
      {!! csrf_field() !!}
        <div class="form-group">
          <label>Iklan</label>
          <select name = 'id_iklan' class = 'form-control' style="width: 100%;">
              <option value="" selected></option>
              @foreach($iklan as $value)
              <option value="{{$value->id}}">{{$value->advertising_media->media}} ( {{$value->domain}} ) {{date('d M Y',strtotime($value->actual_start_date))}}-{{date('d M Y',strtotime($value->actual_end_date))}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Kota</label>
          <select name = 'id_kota' class = 'form-control' style="width: 100%;">
              <option value="" selected></option>
              @foreach($kota as $value)
              <option value="{{$value->id}}">{{$value->kota}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Tanggal Psychotest</label>
          <div class="input-group">
            <input name = "tanggal_psychotest" id="plan_start_date" type="text" class="form-control date-picker">
            <span class="input-group-addon">
              <i class="fa fa-calendar bigger-110"></i>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label>Kuota tes</label>
          <div class="input-gorup">
            <input name="kuota" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <input name = "keterangan" type="text" class="form-control">
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
<!-- End Modal -->
<!-- Modal Delete -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        <p>Yakin akan menghapus data ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger btn-ok">Delete</a>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
@stop
