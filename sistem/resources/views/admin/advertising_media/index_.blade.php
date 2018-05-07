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
                  <th>Media</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
               @foreach($advertising_media as $value) 
                <tr>                                          
                  <td>{{$value->media}}</td>
                  <td>{{$value->advertising_category->kategori}}</td>
                  <td>
                    <a class="green" href="advertising_media/{{$value->id}}/edit">
                      <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <!-- <a class="red" href="#" ata-href="jabatan/{{$value->id}}/delete" data-toggle="modal" data-target="#confirm-delete">
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
<!-- Modal Tambah Advertising Media-->
<div id="myModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="smaller lighter blue no-margin">Tambah Data Advertising Media</h3>
      </div>
      <form action="{{url('tambah_advertising_media')}}" method="POST">
      <div class="modal-body">      
      {!! csrf_field() !!}     
        <div class="form-group">
            <label>Media</label>
            <input name = "media" type="text" class="form-control">
        </div>        
        <div class="form-group">
            <label>Kategori</label>
            <select name = 'id_kategori' class = 'form-control' style="width: 100%;">
              @foreach($advertising_category as $key1 => $value1)
              <option value="{{$key1}}">{{$value1}}</option>
              @endforeach
            </select>
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
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