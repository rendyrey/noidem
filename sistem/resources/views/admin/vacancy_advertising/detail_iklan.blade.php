@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tabel Iklan <small></small></h3>
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
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <h4>Advertising Category: {{$iklan->advertising_category->kategori}}</h4>
              <small>Advertising Media: {{$iklan->advertising_media->media}}</small>
              <br>
              <a href="{{url('vacancy_advertising')}}"><button class="btn btn-m btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;Back</button></a>
              <a href="{{url("vacancy_advertising/$iklan->id/form_tambah_loker")}}"><button type="button" class="btn btn-m btn-success">Add</button></a>
              <table id="datatable" class="table table-striped table-bordered table_dashboard">
                <thead>
                  <tr>
                    <!-- <th>Iklan</th> -->
                    <th>No</th>
                    <th>Budget</th>
                    <th>Cost</th>
                    <th>Edu Level</th>
                    <th>Major Grup</th>
                    <th>Major</th>
                    <th>No RCR</th>
                    <th>Gender</th>
                    <th>Posisi</th>
                    <th>Posisi Publish</th>
                    <th>Target Fresh</th>
                    <th>Target Exp</th>
                    <th>Actual Fresh</th>
                    <th>Actual Exp</th>
                    <th>Target pg Fresh</th>
                    <th>Target pg Exp</th>
                    <th>Actual pg Fresh</th>
                    <th>Actual pg Exp</th>
                    <th>awaiting Fresh</th>
                    <th>awaiting Exp</th>
                    <th>Target pass Fresh</th>
                    <th>Target pass Exp</th>
                    <th>Actual pass Fresh</th>
                    <th>Actual pass Exp</th>
                    <th>Index Fresh</th>
                    <th>Index Exp</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($lokers as $values)
                    <tr>
                      {{-- <!-- <td>{{$values->id_iklan}}</td> --> --}}
                      <td>{{++$i}}</td>
                      <td>Rp.{{number_format($values->budget)}}</td>
                      <td>Rp.{{number_format($values->cost)}}</td>
                      <td>{{$values->tingkat_pendidikan->tingkat}}</td>
                      <td>{{$values->major_grup->nama_grup}}</td>
                      <td>{{$values->major->major}}</td>
                      <td>{{$values->no_rcr}}</td>
                      <td>{{$values->gender}}</td>
                      <td>{{$values->position_name}}</td>
                      <td>{{$values->position_publish}}</td>
                      <td>{{$values->target_fresh}}</td>
                      <td>{{$values->target_exp}}</td>
                      <td>{{$values->actual_fresh}}</td>
                      <td>{{$values->actual_exp}}</td>
                      <td>{{$values->target_pg_fresh}}</td>
                      <td>{{$values->target_pg_exp}}</td>
                      <td>{{$values->actual_pg_fresh}}</td>
                      <td>{{$values->actual_pg_exp}}</td>
                      <td>{{$values->awaiting_fresh}}</td>
                      <td>{{$values->awaiting_exp}}</td>
                      <td>{{$values->target_pass_fresh}}</td>
                      <td>{{$values->target_pass_exp}}</td>
                      <td>{{$values->actual_pass_fresh}}</td>
                      <td>{{$values->actual_pass_exp}}</td>
                      <td>{{$values->index_adv_media_effect_fresh}}</td>
                      <td>{{$values->index_adv_media_effect_exp}}</td>
                      <td>
                        <a class="green" href="{{url("vacancy_advertising/$values->id/edit_loker")}}">
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        &nbsp;&nbsp;
                        <a class="red" href="" data-href="{{url("vacancy_advertising/$values->id/delete_loker/$iklan->id")}}" data-toggle="modal" data-target="#confirm-delete">
                          <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
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
  <!-- Modal Delete -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
        </div>
        <div class="modal-body">
          <p>Yakin akan menghapus data ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger btn-ok">Delete</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->
@endsection
