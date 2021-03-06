@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data User <small></small></h3>
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
                  <label>Nama</label>
                  <input name = "name" type="text" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input name = "email" type="text" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input name = "password" type="password" class="form-control">
                </div>
                <input type="submit" class="btn btn-sm btn-primary" value="Update">
                <a href="{{ url('user') }}" class="btn btn-sm btn-danger">Close</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
