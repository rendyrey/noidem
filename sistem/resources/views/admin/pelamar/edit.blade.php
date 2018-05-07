@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Pelamar <small></small></h3>
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
              <form action="{{url("pelamar/$status_pelamar->id/update")}}" method="GET">
                <div class="form-group">
                  Nama: {{$status_pelamar->nama}}
                  <br>
                  Institusi: {{$status_pelamar->institusi->nama_institusi}}
                  <br>
                  <label>Status Pelamar</label>
                  <select name = 'status_pelamar' class = 'form-control' style="width: 100%;">
                    <option value="{{$status_pelamar->status_pelamar}}" selected hidden>{{$status_pelamar->status_pelamar}}</option>
                    <option value="Passed">Passed</option>
                    <option value="Awaiting">Awaiting</option>
                    <option value="Failed">Failed</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" name="id_iklan" value="{{$status_pelamar->id_iklan}}" hidden>
                  <input type="text" name="job_interest_1" value="{{$status_pelamar->job_interest_1}}" hidden>
                  <input type="text" name="job_interest_2" value="{{$status_pelamar->job_interest_2}}" hidden>
                  <input type="text" name="job_interest_3" value="{{$status_pelamar->job_interest_3}}" hidden>
                  <input type="text" name="job_interest_4" value="{{$status_pelamar->job_interest_4}}" hidden>
                  <input type="text" name="keterangan" value="{{$status_pelamar->keterangan}}" hidden>
                </div>
                <input type="submit" class="btn btn-sm btn-primary" value="Update">
                <a href="{{ url('pelamar') }}" class="btn btn-sm btn-danger">Close</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
