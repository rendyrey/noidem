@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Data Akreditasi <small></small></h3>
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      @if(Session::has('message'))
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
                    <th>ID</th>
                    <th>Nama Institusi</th>
                    <th>Major</th>
                    <th>Tingkat Pendidikan</th>
                    <th>Akreditasi</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($akreditasi as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->institusi->nama_institusi}}</td>
                      <td>{{$value->major->major}}</td>
                      <td>{{$value->tingkat_pendidikan->tingkat}}</td>
                      <td>{{$value->akreditasi}}</td>
                      <td>{{$value->tgl_kadaluarsa}}</td>
                      <td>
                        <a class="green" href="akreditasi/{{$value->id}}/edit">
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
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
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('tambah_akreditasi')}}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
              <label>Nama Institusi</label>
              <select name = 'id_institusi' class = 'form-control select_search' style="width: 100%;" data-placeholder="Pilih Institusi">
                <option value=""></option>
                @foreach($institusi as $value)
                  <option value="{{$value->id}}">{{$value->nama_institusi}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Major</label>
              <select name = 'id_major' class='form-control select_search' style="width: 100%;" data-placeholder="Pilih Major">
                <option></option>
                @foreach($major as $value)
                  <option value="{{$value->id}}">{{$value->major}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tingkat Pendidikan</label>
              <select name = 'id_tingkat_pendidikan' class = 'form-control select_search' style="width: 100%;" data-placeholder="Pilih Tingkat Pendidikan">
                <option></option>
                @foreach($tingkat_pendidikan as $value)
                  <option value="{{$value->id}}">{{$value->tingkat}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Akreditasi</label>
              <input name = "akreditasi" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Tanggal Kadaluarsa</label>
              <div class="input-group">
                <input name = "tgl_kadaluarsa" id="plan_start_date" type="text" class="form-control myDatepicker2">
                <span class="input-group-addon">
                  <i class="fa fa-calendar bigger-110"></i>
                </span>
              </div>
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
