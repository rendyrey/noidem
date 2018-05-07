@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data Major <small></small></h3>
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
                  <label for="kode_major">Kode</label>
                  <input name = "kode_major" type="text" class="form-control" value="{{$major->kode_major}}">
                </div>
                <div class="form-group">
                  <label for="major">Major</label>
                  <input name = "major" type="text" class="form-control" value="{{$major->major}}">
                </div>
                <div class="form-group">
                  <label for="id_grup">Major Grup</label>
                  <select name = 'id_grup' class = 'form-control select_search' style="width: 100%;">
                    @foreach($major_grup as $key1 => $value1)
                      <option value="{{$key1}}" {{$major->major_grup->id == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                    @endforeach
                  </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Update">
                <a href="{{ url('major') }}" class="btn btn-danger">Close</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
