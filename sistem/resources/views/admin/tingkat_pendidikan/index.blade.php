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
          <table id="kota" class="table table-striped table-bordered table-hover">
           <thead>
          <tr>
            <th>Tingkat Pendidikan</th>
            <th>No Urut</th>
            <th>aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach($tingkat_pendidikan as $value)                
          <tr>                
            <td>{{$value->tingkat}}</td>
            <td>{{$value->no_urut}}</td>
              <td>
                <a class="green" href="tingkat_pendidikan/{{$value->id}}/edit">
                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>
                <!-- <a class="red" href="#" data-href="tingkat_pendidikan/{{$value->id}}/hapus" data-toggle="modal" data-target="#confirm-delete">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a> -->
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>          
</div>
</div>
</div>
            
<!-- Modal Tambah Tingkat Pendidikan-->
<div id="myModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="smaller lighter blue no-margin">Tambah Data Tingkat Pendidikan</h3>
      </div>
      <form action="{{url('tambah_tingkat_pendidikan')}}" method="POST">
      <div class="modal-body">       
      {!! csrf_field() !!}             
        <div class="form-group">
          <label>Tingkat Pendidikan</label>
          <input name = "tingkat" type="text" class="form-control">
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
<!-- End Modal -->
<!-- Modal Delete -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">    
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
        </div>    
        <div class="modal-body">
          <p>Yakin akan menghapus data ini ?</p>
        </div>        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger btn-ok">Delete</a>
        </div>
    </div>
  </div>
</div>
<!-- End Modal -->
@stop