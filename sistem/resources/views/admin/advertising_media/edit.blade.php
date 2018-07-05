@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Iklan <small></small></h3>
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
                        <label for="media">Media</label>
                        <input name = "media" type="text" class="form-control" value="{{$advertising_media->media}}">
                      </div>
                      <div class="form-group">
                        <label for="media">Kategori</label>
                        <select name = 'id_kategori' class = 'form-control' style="width: 100%;">
                          @foreach($advertising_category as $key1 => $value1)
                          <option value="{{$key1}}" {{$advertising_media->advertising_category->id == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="domain">Domain</label>
                        <select name = 'domain' class = 'form-control' style="width: 100%;">
                          <option value="formlamaran.medion.co.id" {{$advertising_media->domain == "formlamaran.medion.co.id" ? 'selected':''}}>formlamaran.medion.co.id</option>
                          <option value="jobfair.medion.co.id" {{$advertising_media->domain == "jobfair.medion.co.id" ? 'selected':''}}>jobfair.medion.co.id</option>
                          <option value="cr.medion.co.id" {{$advertising_media->domain == "cr.medion.co.id" ? 'selected':''}}>cr.medion.co.id</option>
                        </select>
                      </div>
                        <a href="{{ url('advertising_media') }}" class="btn btn-danger">Close</a>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
