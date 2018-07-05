@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Data Position Category  <small></small></h3>
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
      <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Data</button>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Position Category</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; ?>
                  @foreach ($position_category as $key => $value)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$value->position_category}}</td>
                      <td>
                        <a class="green" href="">
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        &nbsp;&nbsp;
                        <a class="red" href="#" data-href="position_category/{{$value->id}}/delete" data-toggle="modal" data-target="#confirm-delete">
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
    </div>
  </div>
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Data Position Category</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('tambah_position_category')}}" method="POST">
            <div class="modal-body">
              {!! csrf_field() !!}
              <div class="form-group">
                <label>Position Category</label>
                <input name = "position_category" type="text" class="form-control">
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
