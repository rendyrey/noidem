@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Data Syarat Psychotest <small></small></h3>
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

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Umum</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Khusus</a>
                  </li>

                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target=".syarat_umum">Tambah Data</button>
                    <table id="datatable" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Position Category</th>
                          <th>Test Type</th>
                          <th>Test Score</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0;?>
                        @foreach($syarat_psychotest_umum as $value)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$value->position_category}}</td>
                            <td>{{$value->get_test_type->test_type}}</td>
                            <td>{{$value->test_score}}</td>
                            <td>
                              <a class="green" href="syarat_psychotest/{{$value->id}}/edit">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                              </a>&nbsp;|&nbsp;
                              <a class="red" href="#" data-href="syarat_psychotest/{{$value->id}}/delete" data-toggle="modal" data-target="#confirm-delete">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                              </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target=".syarat_khusus">Tambah Data</button>
                    <table id="" class="table table-striped table-bordered table-hover table_dashboard">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Position</th>
                          <th>Major</th>
                          <th>Test Type</th>
                          <th>Test Score</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0;?>
                        @foreach($syarat_psychotest_khusus as $value)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$value->position}}</td>
                            <td>{{$value->major}}</td>
                            <td>{{$value->get_test_type->test_type}}</td>
                            <td>{{$value->test_score}}</td>
                            <td>
                              <a class="green" href="syarat_psychotest_khusus/{{$value->id}}/edit">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                              </a>&nbsp;|&nbsp;
                              <a class="red" href="#" data-href="syarat_psychotest_khusus/{{$value->id}}/delete" data-toggle="modal" data-target="#confirm-delete">
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
      </div>
    </div>
  </div>

  {{-- modal untuk tambah data syarat umum --}}
  <div class="modal fade bs-example-modal-lg syarat_umum" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Data Kriteria Syarat</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('tambah_syarat_psychotest')}}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
              <label>Position Category</label>
              <select name="position_category" class="form-control select_search" style="width:100%" data-placeholder="Pilih Position Category">
                <option value=""></option>
                <option value="Lapangan">Lapangan</option>
                <option value="Pusat">Pusat</option>
              </select>
              <font color="red">{{$errors->first('position_category')}}</font>
            </div>
            <div class="form-group">
              <label>Test Type</label>
              <select name="test_type" class="form-control select_search" style="width:100%" data-placeholder="Pilih Test Type">
                <option value=""></option>
                @foreach ($test_type_opt as $key=>$value )
                  <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>

              <font color="red">{{$errors->first('test_type')}}</font>
            </div>
            <div class="form-group">
              <label>Test Score</label>
              <input name = "test_score" type="text" class="form-control">
              <font color="red">{{$errors->first('test_score')}}</font>
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

  {{-- modal untuk tambah data syarat khusus --}}
  <div class="modal fade bs-example-modal-lg syarat_khusus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Data Kriteria Syarat</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('tambah_syarat_psychotest_khusus')}}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
              <label>Position</label>
              <select name="position" class="form-control select_search" style="width:100%" data-placeholder="Pilih Position Category">
                <option value=""></option>
                <option value="1">Satu</option>
              </select>
              <font color="red">{{$errors->first('position_category')}}</font>
            </div>
            <div class="form-group">
              <label>Major</label>
              <select name="major" class="form-control select_search" style="width:100%" data-placeholder="Pilih Major">
                <option value=""></option>
                @foreach($major_opt as $key=>$value)
                  <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>

              <font color="red">{{$errors->first('test_type')}}</font>
            </div>
            <div class="form-group">
              <label>Test Type</label>
              <input name = "test_type" type="text" class="form-control">
              <font color="red">{{$errors->first('test_score')}}</font>
            </div>
            <div class="form-group">
              <label>Test Score</label>
              <input name = "test_score" type="text" class="form-control">
              <font color="red">{{$errors->first('test_score')}}</font>
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
