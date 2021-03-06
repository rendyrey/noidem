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
                Edit Data User
              </h4>
            </div>
              <div class="widget-body">
                <div class="widget-main">
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
  </div>
</div>
</div>
@stop