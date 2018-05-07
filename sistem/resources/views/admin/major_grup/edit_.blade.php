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
                  Edit Data Major Grup
                </h4>
              </div>
              <div class="widget-body">
                <div class="widget-main">
                  <form action='update' method="GET">               
                    <div class="form-group">
                      <label>Kode</label>
                      <input name = "kode" type="text" class="form-control" value="{{$major_grup->kode}}">
                    </div>
                    <div class="form-group">
                      <label>Nama Grup</label>
                      <input name = "nama_grup" type="text" class="form-control" value="{{$major_grup->nama_grup}}">
                    </div>
                      <input type="submit" class="btn btn-sm btn-primary" value="Update">
                      <a href="{{ url('major_grup') }}" class="btn btn-sm btn-danger">Close</a>
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