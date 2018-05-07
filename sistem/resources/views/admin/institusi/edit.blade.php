@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data Institusi <small></small></h3>
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
                  <label for="nama_institusi">Nama Institusi</label>
                  <input name = "nama_institusi" type="text" class="form-control" value="{{$institusi->nama_institusi}}">
                </div>
                <div class="form-group">
                  <label for="singkatan">Singkatan</label>
                  <input name = "singkatan" type="text" class="form-control" value="{{$institusi->singkatan}}">
                </div>
                <div class="form-group">
                  <label for="kota">Kota</label>
                  <select name = 'id_kota' class = 'form-control select_search' style="width: 100%;">
                    @foreach($kota as $key1 => $value1)
                      <option value="{{$key1}}" {{$institusi->kota->id == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="provinsi">Provinsi</label>
                  <select name = 'id_provinsi' class = 'form-control select_search' style="width: 100%;">
                    @foreach($provinsi as $key1 => $value1)
                      <option value="{{$key1}}" {{$institusi->provinsi->id == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                    @endforeach
                  </select>
                </div>
                <a href="{{ url('institusi') }}" class="btn btn-danger">Close</a>
                <input type="submit" class="btn btn-primary" value="Update">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
