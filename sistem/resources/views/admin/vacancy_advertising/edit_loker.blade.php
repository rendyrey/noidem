@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data Loker <small></small></h3>
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
              <form action="{{url("vacancy_advertising/$loker->id/update_loker")}}" method="GET">
                <div class="col-xs-12">
                  {!! csrf_field() !!}
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>No RCR</label>
                      <input name = "no_rcr" type="text" class="form-control" value="{{$loker->no_rcr}}">
                      <input name="id_iklan" type="hidden" value="{{$loker->id_iklan}}">
                    </div>
                    <div class="form-group">
                      <label>Budget</label>
                      <input name = "budget" type="text" class="form-control" value="{{$loker->budget}}" >
                    </div>
                    <div class="form-group">
                      <label>Cost</label>
                      <input name = "cost" type="text" class="form-control" value="{{$loker->cost}}">
                    </div>
                    <div class="form-group">
                      <label>Tingkat Pendidikan</label>
                      <select name = 'id_tingkat_pendidikan' class = 'form-control'>
                        @foreach($tingkat_pendidikan as $key1 => $value1)
                          <option value="{{$key1}}" {{$loker->id_tingkat_pendidikan == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Major Grup</label>
                      <select name = 'id_major_grup' class = 'form-control' id="major_grups">
                        @foreach($major_grup as $key1 => $value1)
                          <option value="{{$key1}}" name="{{$key1}}" {{$loker->id_major_grup == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Major</label>
                      <select name = 'id_major' class = 'form-control' id="majors">
                        @foreach($major as $value1)
                          <option value="{{$value1->id}}" name="{{$value1->id_grup}}" {{$loker->id_major == $value1->id ? 'selected' : ''}}>{{$value1->major}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Posisi</label>
                      <input name = "posisi" type="text" class="form-control" value="{{$loker->position_name}}">
                    </div>
                    <div class="form-group">
                      <label>Posisi Publish</label>
                      <input name = "posisi_publish" type="text" class="form-control" value="{{$loker->position_publish}}">
                    </div>
                    <div class="form-group">
                      <label>Target Fresh</label>
                      <input name = "target_fresh" type="text" class="form-control" value="{{$loker->target_fresh}}">
                    </div>
                    <div class="form-group">
                      <label>Target Exp</label>
                      <input name = "target_exp" type="text" class="form-control" value="{{$loker->target_exp}}">
                    </div>
                    <div class="form-group">
                      <label>Actual Fresh</label>
                      <input name = "actual_fresh" type="text" class="form-control" value="{{$loker->actual_fresh}}">
                    </div>
                    <div class="form-group">
                      <label>Actual Exp</label>
                      <input name = "actual_exp" type="text" class="form-control" value="{{$loker->actual_exp}}">
                    </div>
                  </div>

                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Target Pg Fresh</label>
                      <input name = "target_pg_fresh" type="text" class="form-control" value="{{$loker->target_pg_fresh}}">
                    </div>
                    <div class="form-group">
                      <label>Target Pg Exp</label>
                      <input name = "target_pg_exp" type="text" class="form-control" value="{{$loker->target_pg_exp}}">
                    </div>
                    <div class="form-group">
                      <label>Actual Pg Fresh</label>
                      <input name = "actual_pg_fresh" type="text" class="form-control" value="{{$loker->actual_pg_fresh}}">
                    </div>
                    <div class="form-group">
                      <label>Actual Pg Exp</label>
                      <input name = "actual_pg_exp" type="text" class="form-control" value="{{$loker->actual_pg_exp}}">
                    </div>
                    <div class="form-group">
                      <label>Awaiting Fresh</label>
                      <input name = "awaiting_fresh" type="text" class="form-control" value="{{$loker->awaiting_fresh}}">
                    </div>
                    <div class="form-group">
                      <label>Awaiting Exp</label>
                      <input name = "awaiting_exp" type="text" class="form-control" value="{{$loker->awaiting_exp}}">
                    </div>
                  </div>

                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Target Pass Fresh</label>
                      <input name = "target_pass_fresh" type="text" class="form-control" value="{{$loker->target_pass_fresh}}">
                    </div>
                    <div class="form-group">
                      <label>Target Pass Exp</label>
                      <input name = "target_pass_exp" type="text" class="form-control" value="{{$loker->target_pass_exp}}">
                    </div>
                    <div class="form-group">
                      <label>Actual Pass Fresh</label>
                      <input name = "actual_pass_fresh" type="text" class="form-control" value="{{$loker->actual_pass_fresh}}">
                    </div>
                    <div class="form-group">
                      <label>Actual Pass Exp</label>
                      <input name = "actual_pass_exp" type="text" class="form-control" value="{{$loker->actual_pass_exp}}">
                    </div>
                    <div class="form-group">
                      <label>Index Adv Media Effect Fresh</label>
                      <input name = "index_adv_media_effect_fresh" type="text" class="form-control" value="{{$loker->index_adv_media_effect_fresh}}">
                    </div>
                    <div class="form-group">
                      <label>Index Adv Media Effect Exp</label>
                      <input name = "index_adv_media_effect_exp" type="text" class="form-control" value="{{$loker->index_adv_media_effect_exp}}">
                    </div>
                    {{-- <div class="form-group">
                      <label>Kriteria Syarat Grup</label>
                      <select name = 'id_major_grup' class = 'form-control select_search' id="major_grups">
                        @foreach($kriteria_syarat as $value1)
                          <option value="{{$value1->id}}" {{$loker->id_syarat == $value1->id ? 'selected' : ''}}>{{$value1->keterangan}}</option>
                        @endforeach
                      </select>
                    </div> --}}
                  </div>
                </div>
                <a href="{{ url('vacancy_advertising') }}" class="btn btn-sm btn-danger">Close</a>
                <input type="submit" class="btn btn-sm btn-primary" value="Update">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
