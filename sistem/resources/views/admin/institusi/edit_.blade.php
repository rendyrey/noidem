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
                  Edit Data Institusi
                </h4>
              </div>
            <div class="widget-body">
              <div class="widget-main">
                  <form action='update' method="GET">               
                    <div class="form-group">
                      <label for="nama_institusi">Nama Institusi</label>
                      <input name = "nama_institusi" type="text" class="form-control" value="{{$institusi->nama_institusi}}">
                    </div>
                    <div class="form-group">
                      <label for="singkatan">Singkatan</label>
                      <input name = "singkatan" type="text" class="form-control" value="{{$institusi->singkatan}}">
                    </div>
                    <div class="form-group">
                      <label for="kota">Kota</label>
                      <select name = 'id_kota' class = 'form-control' style="width: 100%;">
                      @foreach($kota as $key1 => $value1)
                        <option value="{{$key1}}" {{$institusi->kota->id == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="provinsi">Provinsi</label>
                      <select name = 'id_provinsi' class = 'form-control' style="width: 100%;">
                      @foreach($provinsi as $key1 => $value1)
                        <option value="{{$key1}}" {{$institusi->provinsi->id == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                      @endforeach
                      </select>
                    </div>                              
                      <input type="submit" class="btn btn-sm btn-primary" value="Update">
                      <a href="{{ url('institusi') }}" class="btn btn-sm btn-danger">Close</a>
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