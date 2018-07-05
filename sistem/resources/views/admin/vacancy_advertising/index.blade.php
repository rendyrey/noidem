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
      @if($errors->any())
        <ul>
          @foreach ($errors->all() as $error )
            <font color="red"><li>{{$error}}</li> </font>
          @endforeach
        </ul>
      @endif
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-bars"></i> Tabs <small>Float left</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active green"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Plan</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Inprocess</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Done</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form action="{{url('tambah_iklan')}}" method="POST">
                          <div class="col-xs-12">
                            <div class="modal-body">
                              {!! csrf_field() !!}
                              <div class="col-xs-6">
                                <div class="form-group">
                                  <label>Event Code</label>
                                  <input name="event_code" type="text" class="form-control" oninput="validAngka(this)">
                                </div>
                                {{-- <div class="form-group">
                                <label>Adv Category</label><br>
                                <select name='id_kategori' class='form-control select_search' data-placeholder="Select Adv Category" id="adv_categorys" style="width:100%;">
                                <option value=""></option>
                                @foreach($advertising_category as $key1 => $value1)
                                <option value="{{$key1}}" name="{{$key1}}">{{$value1}}</option>
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
                                    <option value="{{$value->id}}">{{$value->media}} - {{$value->domain}}</option>
                                  @endforeach
                                </optgroup>
                              @endforeach
                            </select>
                          </div>

                        </div>
                        <div class="col-xs-6">
                          <div class="form-group">
                            <label>Plan Start Date</label>
                            <div class="input-group">
                              <input name="plan_start_date" type="text" class="form-control myDatepicker2">
                              <span class="input-group-addon">
                                <i class="fa fa-calendar bigger-110"></i>
                              </span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Plan End Date</label>
                            <div class="input-group">
                              <input name="plan_end_date" id="plan_end_date" type="text" class="form-control myDatepicker2">
                              <span class="input-group-addon">
                                <i class="fa fa-calendar bigger-110"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>Close</button>
                        <button type="submit" class="btn btn-sm btn-primary simpan_iklan">Simpan</button>&nbsp;&nbsp;
                      </div>
                    </form>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <table id="datatable" class="table table-striped table-bordered table_dashboard">
                      <thead>
                        <tr>
                          <th rowspan="2" class="detail-col">Details</th>
                          <th rowspan="2">
                            <center>Adv Category</center>
                          </th>
                          <th rowspan="2">
                            <center>Adv Media</center>
                          </th>
                          <th colspan="2">
                            <center>Plan</center>
                          </th>
                          <th colspan="2">
                            <center>Actual</center>
                          </th>
                          <th rowspan="2">
                            <center>Event Code</center>
                          </th>
                          <th rowspan="2">
                            <center>Domain</center>
                          </th>
                          <th rowspan="2">
                            <center>Status</center>
                          </th>
                          <th rowspan="2">
                            <center>Aksi</center>
                          </th>
                        </tr>
                        <tr>
                          <th>
                            <center>Start Date</center>
                          </th>
                          <th>
                            <center>End Date</center>
                          </th>
                          <th>
                            <center>Start Date</center>
                          </th>
                          <th>
                            <center>End Date</center>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($iklan_inprocess as $value)
                          <tr>
                            <td class="center">
                              <div class="action-buttons">
                                <a href="{{url("vacancy_advertising/$value->id/detail_iklan")}}"><button type="button" class="btn btn-xs btn-primary btn_detail_iklan" value="{{$value->id}}" >Detail</button></a>
                                <a href="{{url("vacancy_advertising/$value->id/form_tambah_loker")}}"><button type="button" class="btn btn-xs btn-success" value="{{$value->id}}">Add</button></a>
                              </div>
                            </td>
                            <td>{{$value->advertising_category->kategori}}</td>
                            <td>{{$value->advertising_media->media}}</td>
                            <td>{{$value->plan_start_date}}</td>
                            <td>{{$value->plan_end_date}}</td>
                            <td>{{$value->actual_start_date}}</td>
                            <td>{{$value->actual_end_date}}</td>
                            <td>{{$value->event_code}}</td>
                            <td>
                              <a href="http://{{$value->domain}}" target="_blank">{{$value->domain}}</a>
                            </td>
                            <td>
                              @if ($value->actual_start_date=='0000-00-00' || $value->actual_end_date<date('Y-m-d'))
                                <button class="btn btn-xs btn-warning filter" value="Inprocess">Inprocess</button>
                              @else
                                <button class="btn btn-xs btn-success filter" value="Sudah Selesai">Aktif</button>
                              @endif
                            </td>
                            <td>
                              <a class="green" href="vacancy_advertising/{{$value->id}}/edit_iklan">
                                <i class="fa fa-pencil bigger-130"></i>
                              </a>
                              <a class="green" href="vacancy_advertising/{{$value->id}}/detail_pelamar">
                                <i class="fa fa-users"></i>
                              </button>
                            </td>
                          </tr>

                        @endforeach

                      </tbody>

                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <table id="" class="table table-striped table-bordered table_dashboard">
                      <thead>
                        <tr>
                          <th rowspan="2" class="detail-col">Details</th>
                          <th rowspan="2">
                            <center>Adv Category</center>
                          </th>
                          <th rowspan="2">
                            <center>Adv Media</center>
                          </th>
                          <th colspan="2">
                            <center>Plan</center>
                          </th>
                          <th colspan="2">
                            <center>Actual</center>
                          </th>
                          <th rowspan="2">
                            <center>Event Code</center>
                          </th>
                          <th rowspan="2">
                            <center>Domain</center>
                          </th>
                          <th rowspan="2">
                            <center>Status</center>
                          </th>
                          <th rowspan="2">
                            <center>Aksi</center>
                          </th>
                        </tr>
                        <tr>
                          <th>
                            <center>Start Date</center>
                          </th>
                          <th>
                            <center>End Date</center>
                          </th>
                          <th>
                            <center>Start Date</center>
                          </th>
                          <th>
                            <center>End Date</center>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($iklan_done as $value)
                          <tr>
                            <td class="center">
                              <div class="action-buttons">
                                <a href="{{url("vacancy_advertising/$value->id/detail_iklan")}}"><button type="button" class="btn btn-xs btn-primary btn_detail_iklan" value="{{$value->id}}" >Detail</button></a>
                                <a href="{{url("vacancy_advertising/$value->id/form_tambah_loker")}}"><button type="button" class="btn btn-xs btn-success" value="{{$value->id}}">Add</button></a>
                              </div>
                            </td>
                            <td>{{$value->advertising_category->kategori}}</td>
                            <td>{{$value->advertising_media->media}}</td>
                            <td>{{$value->plan_start_date}}</td>
                            <td>{{$value->plan_end_date}}</td>
                            <td>{{$value->actual_start_date}}</td>
                            <td>{{$value->actual_end_date}}</td>
                            <td>{{$value->event_code}}</td>
                            <td>
                              <a href="http://{{$value->domain}}" target="_blank">{{$value->domain}}</a>
                            </td>
                            <td>
                              @if ($value->actual_start_date=='0000-00-00' || $value->actual_end_date<date('Y-m-d'))
                                <button class="btn btn-xs btn-danger filter" value="Belum Selesai">Tidak Aktif</button>
                              @else
                                <button class="btn btn-xs btn-success filter" value="Sudah Selesai">Aktif</button>
                              @endif
                            </td>
                            <td>
                              <a class="green" href="vacancy_advertising/{{$value->id}}/edit_iklan">
                                <i class="fa fa-pencil bigger-130"></i>
                              </a>
                              <a class="green" href="vacancy_advertising/{{$value->id}}/detail_pelamar">
                                <i class="fa fa-users"></i>
                              </button>
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
      </div>
    </div>
  </div>
  <script src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#adv_categorys").change(function(){
      var id_kategori = $(this).val();
      $.ajax({
        type:"POST",
        url:"{{url('vacancy_advertising/get_adv_media')}}",
        data:"id_kategori="+id_kategori,
        success:function(result){
          if(result){
            $("#adv_medias").html(result);
          }else{
            alert("No Data");
            $("#adv_medias").html("<option value=''>No Data</option>");
          }
        }

      });
    });
  });
  </script>
@endsection
