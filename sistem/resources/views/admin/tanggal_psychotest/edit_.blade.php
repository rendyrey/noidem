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
                  Edit Data Tanggal Psychotest
                </h4>
              </div>
                <div class="widget-body">
                  <div class="widget-main">
                    <form action='update' method="GET">

                      <div class="form-group">
                        <label for="kota">Iklan</label>
                          <select name = 'id_iklan' class = 'form-control' style="width: 100%;">
                          @foreach($iklan as $value)
                            <option value="{{$value->id}}" {{$tanggal_psychotest->id_iklan == $value->id ? 'selected' : ''}}>{{$value->advertising_media->media}} ( {{$value->domain}} )</option>
                          @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                        <label for="kota">Kota</label>
                          <select name = 'id_kota' class = 'form-control' style="width: 100%;">
                          @foreach($kota as $value)
                            <option value="{{$value->id}}" {{$tanggal_psychotest->kota->id == $value->id ? 'selected' : ''}}>{{$value->kota}}</option>
                          @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                        <label>Tanggal Psychotest</label>
                        <div class="input-group">                        
                          <input name = "tanggal_psychotest" id="plan_start_date" type="text" class="form-control date-picker" value="{{$tanggal_psychotest->tanggal}}">
                          <span class="input-group-addon">                        
                          <i class="fa fa-calendar bigger-110"></i>
                          </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Keterangan</label>                        
                          <input name = "keterangan" type="text" class="form-control" value="{{$tanggal_psychotest->keterangan}}">
                      </div>

                        <input type="submit" class="btn btn-sm btn-primary" value="Update">
                        <a href="{{ url('tanggal_psychotest') }}" class="btn btn-sm btn-danger">Close</a>             
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