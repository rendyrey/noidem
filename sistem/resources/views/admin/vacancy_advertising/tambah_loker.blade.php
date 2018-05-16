@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Iklan<small></small></h3>
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
            <form action="{{url("tambah/$lokers->id/loker")}}" method="POST" id="form{{$lokers->id}}">
  <div class="col-md-12">
    {!! csrf_field() !!}
    <div class="col-md-4">
      <div class="form-group">
        <label>No RCR</label>
        <input name="id_iklan_{{$lokers->id}}" type="hidden" class="form-control">
        <input name="no_rcr_{{$lokers->id}}" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Budget</label>
        <input name="budget_{{$lokers->id}}" type="text" class="form-control auto_currency">
      </div>
      <div class="form-group">
        <label>Cost</label>
        <input name="cost_{{$lokers->id}}" type="text" class="form-control auto_currency">
      </div>
      <div class="form-group">
        <label>Tingkat Pendidikan</label>
        <select name='id_tingkat_pendidikan_{{$lokers->id}}' class='form-control select_search'>
          @foreach($tingkat_pendidikan as $key1 => $lokers1)
            <option value="{{$key1}}">{{$lokers1}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Major Grup</label>
        <select name='id_major_grup_{{$lokers->id}}' class='form-control select_search' id="major_grup_{{$lokers->id}}">
          @foreach($major_grup as $key1 => $lokers1)
            <option value="{{$key1}}" name="{{$key1}}">{{$lokers1}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Major</label>
        <select name='id_major_{{$lokers->id}}' class='form-control select_search' id="major_{{$lokers->id}}">
          <option value="">Pilih Major</option>
          @foreach($major as $lokers1)
            <option value="{{$lokers1->id}}" name="{{$lokers1->id_grup}}">{{$lokers1->major}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Posisi</label>
        <select name="posisi_{{$lokers->id}}" class="form-control select_search" data-placeholder="Pilih Posisi" id="select_posisi">
          <option value="">Pilih Posisi</option>
          @foreach($posisi as $key1 => $value1)
            <option value="{{$value1}}">{{$value1}}</option>
          @endforeach
        </select>
        {{-- <input name="posisi_{{$lokers->id}}" type="text" class="form-control"> --}}
      </div>
      <div class="form-group">
        <label>Posisi Publish</label>
        <select name="posisi_publish_{{$lokers->id}}" class="form-control select_search" data-placeholder="Pilih Posisi Publish" id="select_posisi_publish">
          <option value="">Pilih Posisi</option>
          @foreach($posisi_publish as $key1 => $value1)
            <option value="{{$value1}}">{{$value1}}</option>
          @endforeach
        </select>
        {{-- <input name="posisi_publish_{{$lokers->id}}" type="text" class="form-control"> --}}
      </div>
      <div class="form-group">
        <label>Target Fresh</label>
        <input name="target_fresh_{{$lokers->id}}" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Target Exp</label>
        <input name="target_exp_{{$lokers->id}}" type="text" class="form-control">
      </div>
      {{--
      <div class="form-group">
      <label>Actual Fresh</label>
      <input name="actual_fresh_{{$lokers->id}}" type="text" class="form-control">
    </div>
    <div class="form-group">
    <label>Actual Exp</label>
    <input name="actual_exp_{{$lokers->id}}" type="text" class="form-control">
  </div> --}}
  <div class="form-group">
    <label>Target Pg Fresh</label>
    <input name="target_pg_fresh_{{$lokers->id}}" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Target Pg Exp</label>
    <input name="target_pg_exp_{{$lokers->id}}" type="text" class="form-control">
  </div>
</div>

<div class="col-md-4">

  {{--
  <div class="form-group">
  <label>Actual Pg Fresh</label>
  <input name="actual_pg_fresh_{{$lokers->id}}" type="text" class="form-control">
</div>
<div class="form-group">
<label>Actual Pg Exp</label>
<input name="actual_pg_exp_{{$lokers->id}}" type="text" class="form-control">
</div> --}}
{{-- <div class="form-group">
  <label>Awaiting Fresh</label>
  <input name="awaiting_fresh_{{$lokers->id}}" type="text" class="form-control">
</div>
<div class="form-group">
  <label>Awaiting Exp</label>
  <input name="awaiting_exp_{{$lokers->id}}" type="text" class="form-control">
</div> --}}
<div class="form-group">
  <label>Target Pass Fresh</label>
  <input name="target_pass_fresh_{{$lokers->id}}" type="text" class="form-control">
</div>
<div class="form-group">
  <label>Target Pass Exp</label>
  <input name="target_pass_exp_{{$lokers->id}}" type="text" class="form-control">
</div>
{{--
<div class="form-group">
<label>Actual Pass Fresh</label>
<input name="actual_pass_fresh_{{$lokers->id}}" type="text" class="form-control">
</div>
<div class="form-group">
<label>Actual Pass Exp</label>
<input name="actual_pass_exp_{{$lokers->id}}" type="text" class="form-control">
</div> --}}
<div class="form-group">
  <label>Index Adv Media Effect Fresh</label>
  <input name="index_adv_media_effect_fresh_{{$lokers->id}}" type="text" class="form-control">
</div>
<div class="form-group">
  <label>Index Adv Media Effect Exp</label>
  <input name="index_adv_media_effect_exp_{{$lokers->id}}" type="text" class="form-control">
</div>

<button type="submit" class="btn btn-sm btn-primary pull-right">
  <i class="fa fa-check"></i> Simpan</button>
</div>
</form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
