@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Data Institusi <small></small></h3>
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
                    <th>No</th>
                    <th>Position</th>
                    <th>Position Publish</th>
                    <th>Position Category</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=0; ?>
                  @foreach($position_publish as $value)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$value->posisi}}</td>
                      <td>{{$value->posisi_publish}}</td>
                      <td>{{$value->positionCategory->position_category}}</td>
                      <td>
                        <a class="green" href="position_publish/{{$value->id}}/edit">
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red" href="#" data-href="position_publish/{{$value->id}}/delete" data-toggle="modal" data-target="#confirm-delete">
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

  <div class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Data Posisi</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('position_publish/tambah')}}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
              <label>Position</label>
              <input name = "posisi" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Position Publish</label>
              <input type="text" name="posisi_publish" class="form-control">
            </div>
            <div class="form-group">
              <label>Position Category</label>
              <select name="id_position_category" class="form-control select_search" style="width:100%" data-placeholder="Pilih Category">
                <option value=""></option>
                @foreach ($position_category as $value )
                    <option value="{{$value->id}}">{{$value->position_category}}</option>
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
