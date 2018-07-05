@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data Iklan <small></small></h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
      @if (Session::has('message'))
        <div class="alert alert-{{Session::get('panel')}} fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <h4><i class="icon fa fa-check"></i> Info !</h4>
          {{ Session::get('message') }}</div>
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
                <form action='update_iklan' method="GET">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Code</label>
                      <input name = "event_code" type="text" class="form-control" value="{{$iklan->event_code}}">
                    </div>
                    {{-- <div class="form-group">
                      <label>Adv Category</label>
                      <select name = 'id_kategori' class='form-control select_search' id="adv_category">
                        @foreach($advertising_category as $key1 => $value1)
                          <option value="{{$key1}}" name="{{$key1}}" {{$iklan->id_kategori == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                        @endforeach
                      </select>
                    </div> --}}

                    <div class="form-group">
                      <label>Adv Media</label>
                      <select name='id_media' class='form-control select_search' data-placeholder="Select Adv Media" id="adv_medias" style="width:100%;">
                        <option value=""></option>
                        @foreach($advertising_category as $value1)
                          <optgroup label="{{$value1->kategori}}">
                            @foreach ($value1->advertising_media as $value)
                              <option value="{{$value->id}}" {{$iklan->id_media == $value->id ? 'selected' : ''}}>{{$value->media}} - {{$value->domain}}</option>
                            @endforeach
                          </optgroup>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Plan Start Date</label>
                      <div class='input-group date' >
                        <input type='text' class="form-control myDatepicker2" name="plan_start_date" value="{{$iklan->plan_start_date}}">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Plan End Date</label>
                      <div class='input-group date' >
                        <input type='text' class="form-control myDatepicker2" name="plan_end_date" value="{{$iklan->plan_end_date}}">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>

                  </div>

                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Actual Start Date</label>
                      <div class='input-group date' >
                        <input type='text' class="form-control myDatepicker2" name="actual_start_date" value="{{$iklan->actual_start_date}}">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Actual End Date</label>
                      <div class='input-group date' >
                        <input type='text' class="form-control myDatepicker2" name="actual_end_date" value="{{$iklan->actual_end_date}}">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <a href="{{ url('vacancy_advertising') }}" class="btn btn-sm btn-danger">Close</a>
                    <input type="submit" class="btn btn-sm btn-primary" value="Update">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
