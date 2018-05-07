@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data Syarat Psychotest <small></small></h3>
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
              <form action="{{url('syarat_psychotest_khusus/'.$syarat_psychotest->id.'/update')}}" method="GET">

                <div class="form-group">
                  <label>Position</label>
                  <select name="position" class="form-control select_search" style="width:100%" data-placeholder="Pilih Position Category">
                    <option value=""></option>
                    <option value="Lapangan">Lapangan</option>
                    <option value="Pusat">Pusat</option>
                  </select>
                  <font color="red">{{$errors->first('position_category')}}</font>
                </div>
                <div class="form-group">
                  <label>Major</label>
                  <select name="major" class="form-control select_search" style="width:100%" data-placeholder="Pilih Position Category">
                    <option value=""></option>
                    <option value="1">Satu</option>
                  </select>
                  <font color="red">{{$errors->first('test_score')}}</font>
                </div>
                <div class="form-group">
                  <label>Test Type</label>
                  <select name=" test_type" class="form-control select_search" style="width:100%" data-placeholder="Pilih Test Type">
                    <option value=""></option>
                    @foreach ($test_type_opt as $key=>$value )
                      <option value="{{$key}}" {{$syarat_psychotest->test_type == $key ? 'selected':''}}>{{$value}}</option>
                    @endforeach
                  </select>

                  <font color="red">{{$errors->first('test_type')}}</font>
                </div>
                <div class="form-group">
                  <label>Test Score</label>
                  <input name = "test_score" type="text" class="form-control" value="{{$syarat_psychotest->test_score}}">
                  <font color="red">{{$errors->first('test_score')}}</font>
                </div>

                <a href="{{ url('syarat_psychotest') }}" class="btn btn-danger">Close</a>
                <input type="submit" class="btn btn-primary" value="Update">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
