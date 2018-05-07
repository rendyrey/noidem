@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Data Kriteria Syarat <small></small></h3>
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
                    <th>GPA</th>
                    <th>Akreditasi</th>
                    <th>Masa Studi</th>
                    <th>Usia</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($kriteria_syarat as $value)
                    <tr>
                      <td>{{$value->gpa}}</td>
                      <td>{{$value->akreditasi}}</td>
                      <td>{{$value->masa_studi}}</td>
                      <td>{{$value->usia}}</td>
                      <td>{{$value->keterangan}}</td>
                      <td>
                        <a class="green" href="kriteria_syarat/{{$value->id}}/edit">
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        {{-- <a class="red" href="#" ata-href="kriteria_syarat/{{$value->id}}/delete" data-toggle="modal" data-target="#confirm-delete">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                      </a> --}}
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
        <h4 class="modal-title" id="myModalLabel">Tambah Data Kriteria Syarat</h4>
      </div>
      <div class="modal-body">
        <form action="{{url('tambah_kriteria_syarat')}}" method="POST">
          {!! csrf_field() !!}
          <div class="form-group">
            <label>GPA/IPK</label>
            <input type='text' name='gpa' class='form-control'>
            <font color="red">{{$errors->first('gpa')}}</font>
          </div>

          <div class="form-group">
            <label>Akreditasi</label>
            <select name="akreditasi" class="form-control select_search"  style="width: 100%;" data-placeholder="Pilih Akreditasi">
              <option value=""></option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
            </select>
            <font color="red">{{$errors->first('akreditasi')}}</font>
          </div>

          <div class="form-group">
            <label>Masa Studi Maksimal</label>
            <input name = "masa_studi" type="text" class="form-control">
            <font color="red">{{$errors->first('masa_studi')}}</font>
          </div>

          <div class="form-group">
            <label>Usia Maksimal</label>
            <input type="text" name="usia" class="form-control">
            <font color="red">{{$errors->first('usia')}}</font>
          </div>

          <div class="form-group">
            <label>Keterangan (Kebutuhan Posisi)</label>
            <input name = "keterangan" type="text" class="form-control">
            <font color="red">{{$errors->first('keterangan')}}</font>
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
