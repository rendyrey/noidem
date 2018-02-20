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
          <table id="user" class="table table-striped table-bordered table-hover">
          <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach($user as $value)                
          <tr>                  
            <td>{{$value->name}}</td>
            <td>{{$value->email}}</td>
            <td>XXXXXXX</td>
            <td>
              <div class="btn-group">
              <button class="btn btn-xs btn-info" onclick="window.location.href='user/{{$value->id}}/edit'">
                <i class="ace-icon fa fa-pencil bigger-120"></i>
              </button>

              <button class="btn btn-xs btn-danger" data-href="user/{{$value->id}}/delete" data-toggle="modal" data-target="#confirm-delete">
                <i class="ace-icon fa fa-trash-o bigger-120"></i>
              </button>
              </div>
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

<!-- Modal Tambah Institusi-->
<div id="myModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="smaller lighter blue no-margin">Tambah Data User</h3>
      </div>
      <form action="{{url('tambah_user')}}" method="POST">
      <div class="modal-body">      
      {!! csrf_field() !!}            
        <div class="form-group">
          <label>Nama</label>
          <input name = "name" type="text" class="form-control">
        </div>
        
        <div class="form-group">
          <label>Email</label>
          <input name = "email" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input name = "password" type="password" class="form-control">
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

<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        
        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });
</script>
@stop