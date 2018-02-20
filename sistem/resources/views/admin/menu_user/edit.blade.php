@extends('layout.index')
@section('content')
<div class="page-content">
@if (Session::has('message'))
<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<h4><i class="icon fa fa-check"></i> Info !</h4>
{{ Session::get('message') }}</div>
@endif

@if ($errors->any())
<div class="alert alert-danger fade in">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<h4><i class="icon fa fa-ban"></i> Perhatian !</h4>
@foreach ($errors->all() as $error)
{{ $error }}<br>
@endforeach
</div>
@endif
<div class="row">
  <div class="space-7"></div>
    <div class="col-xs-7">
      <div class="widget-box">
        <div class="widget-header widget-header-flat">
          <h4 class="smaller">
            Edit Menu
          </h4>
        </div>
      <div class="widget-body">
        <div class="widget-main">
            <form action='update' method="GET">               
              <div class="form-group">
                <label>Induk</label>
                <select name="id_induk" class="form-control">
                <option value="0">Parent</option>
                  @foreach($menu_user_list as $key => $value)
                  <option value="{{$key}}" {{$menu_user->id_induk == $key ? 'selected' : ''}}>{{$value}}</option>
                  @endforeach
                </select>
              </div> 
              <div class="form-group">
                <label>Menu</label>
                <input type="text" name="menu" class="form-control" value="{{$menu_user->menu}}">
              </div> 
              <div class="form-group">
                <label>Icon</label>
                <input type="text" name="icon" class="form-control" value="{{$menu_user->icon}}">
              </div>
              <div class="form-group">
                <label>URL</label>
                <input type="text" name="url" class="form-control" value="{{$menu_user->url}}">
              </div>
              <div class="form-group">
                <label>No Urut</label>
                <input type="text" name="no_urut" class="form-control" value="{{$menu_user->no_urut}}">
              </div>                            
              <input type="submit" class="btn btn-sm btn-primary" value="Update">
              <a href="{{ url('menu_user') }}" class="btn btn-sm btn-danger">Close</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection