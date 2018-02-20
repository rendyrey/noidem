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
  <div class="col-xs-12">
    <div class="clearfix">
      <div class="pull-left tableTools-container">
        <a class="btn btn-white btn-primary" data-toggle="modal" data-target="#myModal" title= "Tambah Data"><i class='fa fa-plus'></i> Tambah Data</a>
      </div>
    </div>
      <div>
      <table id="menu_user" class="table table-striped table-bordered table-hover">
      <thead>
      <tr>
		<th>ID</th>
        <th>Induk</th>
        <th>Menu</th>
        <th>icon</th>
        <th>url</th>
		<th>No Urut</th>
        <th>aksi</th>
      </tr>
      </thead>
      <tbody>
      @foreach($menu_user as $value)                
      <tr>
		<td>{{$value->id}}</td>	  
        <td>{{$value->id_induk}}</td>
        <td>{{$value->menu}}</td>
        <td>{{$value->icon}}</td>
        <td>{{$value->url}}</td>
		<td>{{$value->no_urut}}</td>
        <td>
          <a class="green" href="menu_user/{{$value->id}}/edit">
            <i class="ace-icon fa fa-pencil bigger-130"></i>
          </a>
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
<!-- Modal Tambah Bidang Usaha-->
<div id="myModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="smaller lighter blue no-margin">Tambah Data Menu</h3>
      </div>
      <form action="{{url('tambah_menu_user')}}" method="POST">
      <div class="modal-body">      
      {!! csrf_field() !!}             
        <div class="form-group">
          <label>Induk</label>
          <select name="id_induk" class="form-control" id="form-field-select-3" data-placeholder="Choose ...">
            <option value="0">Parent</option>
			<option disabled>===================================================================</option>
            @foreach($menu_user_list as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Menu</label>
          <input name = "menu" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Icon</label>
          <input name = "icon" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>URL</label>
          <input name = "url" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>No Urut</label>
          <input name = "no_urut" type="text" class="form-control">
        </div>
        </div>
        <div class="modal-footer">
        <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>Close</button>
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>&nbsp;&nbsp;
        </div>
        </form>                     
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
<!-- End Modal -->
@endsection
