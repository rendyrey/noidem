@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Data Tingkat Pendidikan <small></small></h3>
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
                    <th>Tingkat Pendidikan</th>
                    <th>No Urut</th>
                    <th>aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tingkat_pendidikan as $value)
                    <tr>
                      <td>{{$value->tingkat}}</td>
                      <td>{{$value->no_urut}}</td>
                      <td>
                        <a class="green" href="tingkat_pendidikan/{{$value->id}}/edit">
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <!-- <a class="red" href="#" data-href="tingkat_pendidikan/{{$value->id}}/hapus" data-toggle="modal" data-target="#confirm-delete">
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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <form action="{{url('tambah_tingkat_pendidikan')}}" method="POST">
          {!! csrf_field() !!}
          <div class="form-group">
            <label>Tingkat Pendidikan</label>
            <input name = "tingkat" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>No Urut</label>
            <input name = "no_urut" type="text" class="form-control">
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
