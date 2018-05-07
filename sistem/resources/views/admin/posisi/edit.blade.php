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
              <form action='{{url("posisi/$posisi->id/update")}}' method="POST">
                <div class="form-group">
                  <label for="nama_institusi">Divisi</label>
                  <input name = "divisi" type="text" class="form-control" value="{{$posisi->divisi}}">
                </div>
                <div class="form-group">
                  <label for="singkatan">Posisi</label>
                  <input name = "posisi" type="text" class="form-control" value="{{$posisi->posisi}}">
                </div>
                <div class="form-group">
                  <label for="singkatan">Posisi Publish</label>
                  <input name = "posisi_publish" type="text" class="form-control" value="{{$posisi->posisi_publish}}">
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
