@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data Akreditasi <small></small></h3>
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
              <form action='update' method="GET">
                <div class="form-group">
                  <label>Nama Institusi</label>
                  <select name = 'id_institusi' class = 'form-control' style="width: 100%;">
                    @foreach($institusi as $value)
                      <option value="{{$value->id}}" {{$akreditasi->id_institusi == $value->id ? 'selected' : ''}}>{{$value->nama_institusi}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Major</label>
                  <select name = 'id_major' class = 'form-control' style="width: 100%;">
                    @foreach($major as $value)
                      <option value="{{$value->id}}" {{$akreditasi->id_major == $value->id ? 'selected' : ''}}>{{$value->major}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Tingkat Pendidikan</label>
                  <select name = 'id_tingkat_pendidikan' class = 'form-control' style="width: 100%;">
                    @foreach($tingkat_pendidikan as $value)
                      <option value="{{$value->id}}" {{$akreditasi->id_tingkat_pendidikan == $value->id ? 'selected' : ''}}>{{$value->tingkat}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Akreditasi</label>
                  <input name = "akreditasi" type="text" class="form-control" value="{{$akreditasi->akreditasi}}">
                </div>

                <div class="form-group">
                  <label>Tanggal Kadaluarsa</label>
                  <div class="input-group">
                    <input name = "tgl_kadaluarsa" id="actual_start_date" type="text" class="form-control date-picker" value="{{$akreditasi->tgl_kadaluarsa}}">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>
                  </div>
                </div>
                <input type="submit" class="btn btn-sm btn-primary" value="Update">
                <a href="{{ url('akreditasi') }}" class="btn btn-sm btn-danger">Close</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
