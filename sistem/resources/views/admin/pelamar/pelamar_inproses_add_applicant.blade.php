@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Applicant <small>psychotest @ {{date('d M Y',strtotime($tgl_psychotest->tanggal))}}</small></h3>
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
      <i class="fa fa-home"></i><a href="{{url('pelamar_inproses')}}"> Psychotest {{date('d M Y',strtotime($tgl_psychotest->tanggal))}}</a> >
      <a href="{{url('pelamar_inproses/details/'.$tgl_psychotest->id)}}">Details</a> >
      <a href="{{url()->current()}}">Add Applicant</a>
      <br>
      <a href="{{url('pelamar_inproses/details/'.$tgl_psychotest->id)}}"><button class="btn btn-sm btn-primary"> <i class="fa fa-arrow-circle-left"></i>&nbsp; Back</button></a>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <table id="" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No Applicant</th>
                    <th>Name</th>
                    <th>Edu Level</th>
                    <th>Institution Name</th>
                    <th>Major</th>
                    <th>Psychotest Readiness</th>
                    <th><input type="checkbox" class="selectAll"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach ($pelamar as $value)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$value->nama}}</td>
                      <td>{{$value->tingkat_pendidikan->tingkat}}</td>
                      <td>{{$value->institusi->nama_institusi}}</td>
                      <td>{{$value->major->major}}</td>
                      <td>{{$value->tanggal_psychotest->tanggal}}</td>
                      <form action="{{url('pelamar_inproses/add_applicants/'.$id)}}" method="POST">
                        <td><input class="checkBoxClass" type="checkbox" name="checkbox[]" value="{{$value->id}}"></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <button class="btn btn-success btn-sm" name="add_applicant" type="submit">+ Add</button>
              </form>

            </div>
          </div>
        </div>
        <div id="myModal" class="modal fade" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Export Tabel Pelamar ke CSV</h3>
              </div>
              <form action="{{url('export_pelamar')}}" method="post">
                {!! csrf_field() !!}
                <div class="modal-body">
                  <div class="form-group">
                    <label>Status Pelamar</label>
                    <select name="status_pelamar">
                      <option value="All" selected>All</option>
                      <option value="Passed">Passed</option>
                      <option value="Awaiting">Awaiting</option>
                      <option value="Failed">Failed</option>
                    </select>
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
          <div id="myModal2" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 class="smaller lighter blue no-margin">Export Tabel Pelamar ke CSV</h3>
                </div>
                <form action="{{url('import_pelamar')}}" method="post" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <div class="modal-body">
                    <div class="form-group">
                      <label>File CSV Pelamar</label>
                      <input type="file" name="file">
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
          @endsection
