@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Data Major <small></small></h3>
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
                    <th>kode_major</th>
                    <th>Major</th>
                    <th>Grup</th>
                    <th>aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($major as $value)
                    <tr>
                      <td>{{$value->kode_major}}</td>
                      <td>{{$value->major}}</td>
                      <td>{{$value->major_grup->nama_grup}}</td>
                      <td>
                        <a class="green" href="major/{{$value->id}}/edit">
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
      <div class="row">
        <div class="col-md-6" style="border:gray 1px;margin-left:20px">
          <form action="{{url('import_major')}}" method="post" enctype="multipart/form-data">
            <h5>Upload Master Data (update)</h5>
            <input type="file" class="btn" name="file">
            <a href="{{url('export_major')}}"><button type="button" class="btn btn-primary">Download</button></a>
            <input type="submit" value="Submit" class="btn btn-success">
          </form>
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
          <h4 class="modal-title" id="myModalLabel">Tambah Data Major</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('tambah_major')}}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
              <label>Kode Major</label>
              <input name = "kode_major" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Major</label>
              <input name = "major" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Major Grup</label>
              <select name = 'id_grup' class = 'form-control select_search' style="width: 100%;" data-placeholder="Pilih Major Group">
                <option value=""></option>
                @foreach($major_grup as $key1 => $value1)
                  <option value="{{$key1}}">{{$value1}}</option>
                @endforeach
              </select>
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
