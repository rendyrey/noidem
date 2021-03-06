@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Data Bidang Usaha <small></small></h3>
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
          {{Session::get('message')}}
        </div>
      @endif
      @if($errors->any())
        <ul>
          @foreach ($errors->all() as $error )
            <font color="red"><li>{{$error}} </li></font>
          @endforeach
        </ul>
      @endif
      <div class="row">
        <div class="col-md-6">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Data</button>

        </div>
        <div class="col-md-6">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Bidang Usaha</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($bidang_usaha as $value)
                    <tr>
                      <td>{{$value->bidang_usaha}}</td>
                      <td>
                        <a class="green" href="bidang_usaha/{{$value->id}}/edit">
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        &nbsp;&nbsp;
                        <a class="red" href="#" data-href="bidang_usaha/{{$value->id}}/delete" data-toggle="modal" data-target="#confirm-delete">
                          <i class="ace-icon fa fa-trash-o bigger-130"></i>
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
          <form action="{{url('import_bidang_usaha')}}" method="post" enctype="multipart/form-data">
            <h5>Upload Master Data (update)</h5>
            <input type="file" class="btn" name="file">
            <a href="{{url('export_bidang_usaha')}}"><button type="button" class="btn btn-primary">Download</button></a>
            <input type="submit" value="Submit" class="btn btn-success">
          </form>
        </div>
      </div>
      <hr>

    </div>
  </div>
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Data Bidang Usaha</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('tambah_bidang_usaha')}}" method="POST">
            <div class="modal-body">
              {!! csrf_field() !!}
              <div class="form-group">
                <label>Bidang Usaha</label>
                <input name = "bidang_usaha" type="text" class="form-control">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
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
  <!-- Modal Delete -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
        </div>
        <div class="modal-body">
          <p>Yakin akan menghapus data ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger btn-ok">Delete</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->
@endsection
