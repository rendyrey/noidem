@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Data Tanggal Psychotest <small></small></h3>
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
      <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Data</button>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    
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

<div class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Tanggal Psychotest</h4>
      </div>
      <div class="modal-body">
        <form action="{{url('tambah_tanggal_psychotest')}}" method="POST">
          {!! csrf_field() !!}
          {{-- <div class="form-group">
            <label>Iklan</label>
            <select name = 'id_iklan' class = 'form-control select_search' style="width: 100%;" data-placeholder="Pilih Iklan">
              <option value=""></option>
              @foreach($iklan as $value)
                <option value="{{$value->id}}">{{$value->advertising_media->media}} ( {{$value->domain}} ) {{date('d M Y',strtotime($value->actual_start_date))}}-{{date('d M Y',strtotime($value->actual_end_date))}}</option>
              @endforeach
            </select>
          </div> --}}

          <div class="form-group">
            <label>Kota</label>
            <select name = 'id_kota' class = 'form-control select_search' style="width: 100%;" data-placeholder="Pilih Kota">
              <option value=""></option>
              @foreach($kota as $value)
                <option value="{{$value->id}}">{{$value->kota}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Tanggal Psychotest</label>
            <div class="input-group">
              <input name = "tanggal_psychotest" id="plan_start_date" type="text" class="form-control myDatepicker2">
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;
        </div>
      </form>


    </div>
  </div>
</div>
@endsection
