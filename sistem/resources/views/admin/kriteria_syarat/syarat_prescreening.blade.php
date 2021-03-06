@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Data Syarat Prescreening <small></small></h3>
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
                          <th>Work Experience</th>
                          <th>Edu Level</th>
                          <th>Accreditation</th>
                          <th>GPA</th>
                          <th>Study Period</th>
                          <th>Age</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0;?>
                        @foreach($syarat_prescreening_umum as $value)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$value->position_category}}</td>
                            <td>{{$value->work_experience}}</td>
                            <td>{{$value->tingkat_pendidikan->tingkat}}</td>
                            <td>{{$value->accreditation}}</td>
                            <td>{{$value->gpa}}</td>
                            <td>{{$value->study_period}}</td>
                            <td>{{$value->age}}</td>
                            <td>
                              <a class="green" href="syarat_prescreening/{{$value->id}}/edit">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                              </a>&nbsp;|&nbsp;
                              <a class="red" href="#" data-href="syarat_prescreening/{{$value->id}}/delete" data-toggle="modal" data-target="#confirm-delete">
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
                          <th>Position Category</th>
                          <th>Major</th>
                          <th>Edu Level</th>
                          <th>GPA</th>
                          <th>Accreditation</th>
                          <th>Study Period</th>
                          <th>Age</th>
                          <th>Is Active</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0;?>
                        @foreach($syarat_prescreening_khusus as $value)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$value->position_category}}</td>
                            <td>{{$value->major->major}}</td>
                            <td>{{$value->tingkat_pendidikan->tingkat}}</td>
                            <td>{{$value->gpa}}</td>
                            <td>{{$value->accreditation}}</td>
                            <td>{{$value->study_period}}</td>
                            <td>{{$value->age}}</td>
                            <td>{{$value->is_active==1 ? 'Active':'Non-Active'}}</td>
                            <td>
                              <a class="green" href="syarat_prescreening_khusus/{{$value->id}}/edit">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                              </a>&nbsp;|&nbsp;
                              <a class="red" href="#" data-href="syarat_prescreening/{{$value->id}}/delete" data-toggle="modal" data-target="#confirm-delete">
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
  <div class="modal fade bs-example-modal-lg syarat_umum" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Data Syarat Prescreening <small>Umum</small></h4>
        </div>
        <div class="modal-body">
          <form action="{{url('tambah_syarat_prescreening')}}" method="POST">
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
              <label>Work Experience</label>
              <div class="radio">
                <label>
                  <input name="work_experience" type="radio" class="flat" value="Yes" required> Yes
                  <input name="work_experience" type="radio" class="flat" value="No"> No
                </label>
              </div>

              <font color="red">{{$errors->first('work_experience')}}</font>
            </div>
            <div class="form-group">
              <label>Edu Level</label>
              <select name="id_tingkat_pendidikan" class="form-control select_search" style="width:100%" data-placeholder="Pilih Edu Level">
                <option value=""></option>
                @foreach ($edu_level_opt as $key=>$value )
                  <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
              <font color="red">{{$errors->first('id_tingkat_pendidikan')}}</font>
            </div>
            <div class="form-group">
              <label>Accreditation</label>
              <select name="accreditation" class="form-control select_search" style="width:100%" data-placeholder="Pilih Accreditation">
                <option value=""></option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
              </select>
              <font color="red">{{$errors->first('accreditation')}}</font>
            </div>
            <div class="form-group">
              <label>GPA</label>
              <input type="text" name="gpa" class="form-control" placeholder="Ex: 2.75">
              <font color="red">{{$errors->first('gpa')}}</font>
            </div>
            <div class="form-group">
              <label>Study Period</label>
              <input type="text" name="study_period" class="form-control" placeholder="Ex: 4.5">
              <font color="red">{{$errors->first('study_period')}}</font>
            </div>
            <div class="form-group">
              <label>Age</label>
              <input type="text" name="age" class="form-control" placeholder="Ex: 27">
              <font color="red">{{$errors->first('age')}}</font>
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
  <div class="modal fade bs-example-modal-lg syarat_khusus" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Data Syarat Prescreening <small>Khusus</small></h4>
        </div>
        <div class="modal-body">
          <form action="{{url('tambah_syarat_prescreening_khusus')}}" method="POST">
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
              <label>Major</label>
              <select name="id_major" class="form-control select_search" style="width:100%" data-placeholder="Pilih Major">
                <option value=""></option>
                @foreach ($major_opt as $key=>$value )
                  <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
              <font color="red">{{$errors->first('work_experience')}}</font>
            </div>
            <div class="form-group">
              <label>Edu Level</label>
              <select name="id_tingkat_pendidikan" class="form-control select_search" style="width:100%" data-placeholder="Pilih Edu Level">
                <option value=""></option>
                @foreach ($edu_level_opt as $key=>$value )
                  <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
              <font color="red">{{$errors->first('id_tingkat_pendidikan')}}</font>
            </div>
            <div class="form-group">
              <label>Accreditation</label>
              <select name="accreditation" class="form-control select_search" style="width:100%" data-placeholder="Pilih Accreditation">
                <option value=""></option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
              </select>
              <font color="red">{{$errors->first('accreditation')}}</font>
            </div>
            <div class="form-group">
              <label>GPA</label>
              <input type="text" name="gpa" class="form-control" placeholder="Ex: 3.25">
              <font color="red">{{$errors->first('gpa')}}</font>
            </div>
            <div class="form-group">
              <label>Study Period</label>
              <input type="text" name="study_period" class="form-control" placeholder="Ex: 4.5">
              <font color="red">{{$errors->first('study_period')}}</font>
            </div>
            <div class="form-group">
              <label>Age</label>
              <input type="text" name="age" class="form-control" placeholder="Ex: 27">
              <font color="red">{{$errors->first('age')}}</font>
            </div>
            <div class="form-group">
              <label>Is Active</label>
              <div class="radio">
                <label>
                  @foreach ($is_active_opt as $value )
                    <input name="is_active" type="radio" class="flat" value="{{$value}}" required> {{$value=='1' ? 'Active':'Non-Active'}}
                  @endforeach
                </label>
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
  <div class="modal fade" id="confirm-delete" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
