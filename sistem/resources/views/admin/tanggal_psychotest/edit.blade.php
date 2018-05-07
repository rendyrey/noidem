@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data Tanggal Psychotest <small></small></h3>
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
                  <label for="kota">Kota</label>
                  <select name = 'id_kota' class = 'form-control' style="width: 100%;">
                    @foreach($kota as $value)
                      <option value="{{$value->id}}" {{$tanggal_psychotest->kota->id == $value->id ? 'selected' : ''}}>{{$value->kota}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Tanggal Psychotest</label>
                  <div class="input-group">
                    <input name = "tanggal_psychotest" id="plan_start_date" type="text" class="form-control myDatepicker2" value="{{$tanggal_psychotest->tanggal}}">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Kuota</label>
                  <div class="input-group">
                    <input name = "kuota" id="plan_start_date" type="text" class="form-control" value="{{$tanggal_psychotest->kuota}}">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <input name = "keterangan" type="text" class="form-control" value="{{$tanggal_psychotest->keterangan}}">
                </div>

                <a href="{{ url('tanggal_psychotest') }}" class="btn btn-danger">Close</a>
                <input type="submit" class="btn btn-primary" value="Update">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
