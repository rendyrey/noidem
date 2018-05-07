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
          <div class="col-xs-5">
            <div class="widget-box">
              <div class="widget-header widget-header-flat">
                <h4 class="smaller">
                  Edit Status Pelamar
                </h4>
              </div>
                <div class="widget-body">
                  <div class="widget-main">
                    <form action='update' method="GET"> 
                      <div class="form-group">
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
      </div>
    </div>
  </div>
@stop