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
                Edit Data Major
              </h4>
            </div>
              <div class="widget-body">
                <div class="widget-main">
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
                      <select name = 'id_grup' class = 'form-control' style="width: 100%;">
                      @foreach($major_grup as $key1 => $value1)
                        <option value="{{$key1}}" {{$major->major_grup->id == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                      @endforeach
                      </select>
                    </div>
                      <input type="submit" class="btn btn-sm btn-primary" value="Update">
                      <a href="{{ url('major') }}" class="btn btn-sm btn-danger">Close</a>
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