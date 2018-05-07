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
                  Edit Data Kriteria Syarat
                </h4>
              </div>
                <div class="widget-body">
                  <div class="widget-main">
                    <form action="{{url('kriteria_syarat/'.$kriteria_syarat->id.'/update')}}" method="GET">

                      <div class="form-group">
                        <label for="kota">GPA/IPK</label>
                        <input type="text" name="gpa" value="{{$kriteria_syarat->gpa}}">
                      </div>

                      <div class="form-group">
                        <label for="kota">Akreditasi</label>
                        <input type="text" name="akreditasi" value="{{$kriteria_syarat->akreditasi}}">
                      </div>

                      <div class="form-group">
                        <label>Masa Studi Maksimal</label>
                        <input type="text" name="masa_studi" value="{{$kriteria_syarat->masa_studi}}">
                      </div>

                      <div class="form-group">
                        <label>Usia Maksimal</label>
                        <input type="text" name="usia" value="{{$kriteria_syarat->usia}}">
                      </div>

                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" value="{{$kriteria_syarat->keterangan}}">
                      </div>

                        <input type="submit" class="btn btn-sm btn-primary" value="Update">
                        <a href="{{ url('kriteria_syarat') }}" class="btn btn-sm btn-danger">Close</a>
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
