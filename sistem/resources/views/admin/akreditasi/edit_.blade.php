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
                  Edit Data Akreditasi
                </h4>
              </div>
            <div class="widget-body">
              <div class="widget-main">
                  <form action='update' method="GET">               
                    <div class="form-group">
                      <label>Nama Institusi</label>
                      <select name = 'id_institusi' class = 'form-control' style="width: 100%;">
                      @foreach($institusi as $value)
                        <option value="{{$value->id}}" {{$akreditasi->id_institusi == $value->id ? 'selected' : ''}}>{{$value->nama_institusi}}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Major</label>
                      <select name = 'id_major' class = 'form-control' style="width: 100%;">
                      @foreach($major as $value)
                        <option value="{{$value->id}}" {{$akreditasi->id_major == $value->id ? 'selected' : ''}}>{{$value->major}}</option>
                      @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Tingkat Pendidikan</label>
                      <select name = 'id_tingkat_pendidikan' class = 'form-control' style="width: 100%;">
                      @foreach($tingkat_pendidikan as $value)
                        <option value="{{$value->id}}" {{$akreditasi->id_tingkat_pendidikan == $value->id ? 'selected' : ''}}>{{$value->tingkat}}</option>
                      @endforeach
                      </select>
                    </div>  

                    <div class="form-group">
                      <label>Akreditasi</label>
                      <input name = "akreditasi" type="text" class="form-control" value="{{$akreditasi->akreditasi}}">
                    </div>

                    <div class="form-group">
                      <label>Tanggal Kadaluarsa</label>
                      <div class="input-group">
                      <input name = "tgl_kadaluarsa" id="actual_start_date" type="text" class="form-control date-picker" value="{{$akreditasi->tgl_kadaluarsa}}">
                      <span class="input-group-addon">
                        <i class="fa fa-calendar bigger-110"></i>
                      </span>
                      </div>
                    </div>                             
                      <input type="submit" class="btn btn-sm btn-primary" value="Update">
                      <a href="{{ url('akreditasi') }}" class="btn btn-sm btn-danger">Close</a>
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