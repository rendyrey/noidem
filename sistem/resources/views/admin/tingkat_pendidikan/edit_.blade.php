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
                  Edit Data Tingkat Pendidikan
                </h4>
              </div>
                <div class="widget-body">
                  <div class="widget-main">
                    <form action='update' method="GET">               
                      <div class="form-group">
                        <label>Tingkat Pendidikan</label>
                        <input name = "tingkat" type="text" class="form-control" value="{{$tingkat_pendidikan->tingkat}}">
                      </div>
                      <div class="form-group">
                        <label>No Urut</label>
                        <input name = "no_urut" type="text" class="form-control" value="{{$tingkat_pendidikan->no_urut}}">
                      </div>
                        <input type="submit" class="btn btn-sm btn-primary" value="Update">
                        <a href="{{ url('tingkat_pendidikan') }}" class="btn btn-sm btn-danger">Close</a>        
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