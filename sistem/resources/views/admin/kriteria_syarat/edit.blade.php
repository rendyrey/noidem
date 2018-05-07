@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data Kriteria Syarat <small></small></h3>
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
              <form action="{{url('kriteria_syarat/'.$kriteria_syarat->id.'/update')}}" method="GET">

                <div class="form-group">
                  <label for="kota">GPA/IPK</label>
                  <input type="text" name="gpa" value="{{$kriteria_syarat->gpa}}" class="form-control">
                </div>
                
                <div class="form-group">
                  <label for="kota">Akreditasi</label>
                  <input type="text" name="akreditasi" value="{{$kriteria_syarat->akreditasi}}" class="form-control">
                </div>

                <div class="form-group">
                  <label>Masa Studi Maksimal</label>
                  <input type="text" name="masa_studi" value="{{$kriteria_syarat->masa_studi}}" class="form-control">
                </div>

                <div class="form-group">
                  <label>Usia Maksimal</label>
                  <input type="text" name="usia" value="{{$kriteria_syarat->usia}}" class="form-control">
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" name="keterangan" value="{{$kriteria_syarat->keterangan}}" class="form-control">
                </div>

                <a href="{{ url('kriteria_syarat') }}" class="btn btn-danger">Close</a>
                <input type="submit" class="btn btn-primary" value="Update">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
