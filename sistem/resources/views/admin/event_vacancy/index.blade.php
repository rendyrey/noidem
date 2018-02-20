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
        <div class="row">
          <div class="col-xs-12">
            <table id="event_vacancy" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th class="detail-col">Details</th>
                  <th>Event code</th>
                  <th>Media</th>
                  <th>Plan Start Date</th>
                  <th>Plan End Date</th>
                  <th>aksi</th>
                </tr>
              </thead>
              <tbody>
              @foreach($event_vacancy as $value)
                <tr>
                  <td class="center">
                    <div class="action-buttons">
                      <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                        <i class="ace-icon fa fa-angle-double-down"></i>
                        <span class="sr-only">Details</span>
                      </a>
                    </div>
                  </td>
                  <td>{{$value->event_code}}</td>
                  <td>{{$value->advertising_media->media}}</td>
                  <td>{{$value->plan_start_date}}</td>
                  <td>{{$value->plan_end_date}}</td>
                  <td>
                    <a class="green" href="event_vacancy/{{$value->id}}/edit">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                  </td>
                </tr>

                <tr class="detail-row">
                  <td colspan="8">
                    <div class="table-detail">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6">
                          <div class="space visible-xs"></div>
                          <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                              <div class="profile-info-name"> Event Code </div>
                              <div class="profile-info-value">
                                <span>{{$value->event_code}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Media </div>
                              <div class="profile-info-value">
                                <span>{{$value->advertising_media->media}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Plan Start Date </div>
                              <div class="profile-info-value">
                                <span>{{$value->plan_start_date}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Plan End Date </div>
                              <div class="profile-info-value">
                                <span>{{$value->plan_end_date}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Actual Start Date </div>
                              <div class="profile-info-value">
                                <span>{{$value->actual_start_date}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Actual End Date </div>
                              <div class="profile-info-value">
                                <span>{{$value->actual_end_date}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Budget </div>
                              <div class="profile-info-value">
                                <span>{{$value->budget}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Cost </div>
                              <div class="profile-info-value">
                                <span>{{$value->cost}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Target Fresh </div>
                              <div class="profile-info-value">
                                <span>{{$value->target_fresh}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Target Exp </div>
                              <div class="profile-info-value">
                                <span>{{$value->target_exp}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Actual Fresh </div>
                              <div class="profile-info-value">
                                <span>{{$value->actual_fresh}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Actual Exp </div>
                              <div class="profile-info-value">
                                <span>{{$value->actual_exp}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Target Fresh Call </div>
                              <div class="profile-info-value">
                                <span>{{$value->target_fresh_call}}</span>
                              </div>
                            </div>                                    
                          </div>
                        </div>
                        <!-- Kolom 2 -->
                        <div class="col-xs-12 col-sm-6">
                          <div class="space visible-xs"></div>
                          <div class="profile-user-info profile-user-info-striped">
                          <div class="profile-info-row">
                              <div class="profile-info-name"> Target Exp Call </div>
                              <div class="profile-info-value">
                                <span>{{$value->target_exp_call}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Actual Fresh Call </div>
                              <div class="profile-info-value">
                                <span>{{$value->actual_fresh_call}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Actual Exp Call </div>
                              <div class="profile-info-value">
                                <span>{{$value->actual_exp_call}}</span>
                              </div>
                            </div> 

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Actual Exp Call </div>
                              <div class="profile-info-value">
                                <span>{{$value->actual_exp_call}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Awaiting Fresh </div>
                              <div class="profile-info-value">
                                <span>{{$value->awaiting_fresh}}</span>
                              </div>
                            </div> 

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Awaiting Exp </div>
                              <div class="profile-info-value">
                                <span>{{$value->awaiting_exp}}</span>
                              </div>
                            </div> 

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Target Fresh Pass </div>
                              <div class="profile-info-value">
                                <span>{{$value->target_fresh_pass}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Target Exp Pass </div>
                              <div class="profile-info-value">
                                <span>{{$value->target_exp_pass}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Actual Fresh Pass </div>
                              <div class="profile-info-value">
                                <span>{{$value->actual_fresh_pass}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Actual Exp Pass </div>
                              <div class="profile-info-value">
                                <span>{{$value->actual_exp_pass}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> index_adv_media_effect_fresh </div>
                              <div class="profile-info-value">
                                <span>{{$value->index_adv_media_effect_fresh}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> index_adv_media_effect_exp </div>
                              <div class="profile-info-value">
                                <span>{{$value->index_adv_media_effect_exp}}</span>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Active </div>
                              <div class="profile-info-value">
                                <span>{{$value->is_active}}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td hidden></td>
                  <td hidden></td>
                  <td hidden></td>
                  <td hidden></td>
                  <td hidden></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- /.span -->
        </div><!-- /.row -->
      </div>
    </div>
  </div>
</div>
</div>
        
<!-- Modal Tambah Event Vacancy-->
<div id="myModal" class="modal fade" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 class="smaller lighter blue no-margin">Tambah Data Event Vacancy</h3>
  </div>
  <form action="{{url('tambah_event_vacancy')}}" method="POST">
  <div class="col-xs-12"> 
  <div class="modal-body">      
  {!! csrf_field() !!}
    <div class="col-xs-4">            
      <div class="form-group">
        <label>Event Code</label>
        <input name = "event_code" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Media</label>
        <select name = 'id_media' class = 'form-control'>
            @foreach($advertising_media as $key1 => $value1)
            <option value="{{$key1}}">{{$value1}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Plan Start Date</label>
        <div class="input-group">
        <input name = "plan_start_date" id="plan_start_date" type="text" class="form-control date-picker">
        <span class="input-group-addon">
          <i class="fa fa-calendar bigger-110"></i>
        </span>
        </div>
      </div>
      <div class="form-group">
        <label>Plan End Date</label>
        <div class="input-group">
        <input name = "plan_end_date" id="plan_end_date" type="text" class="form-control date-picker">
        <span class="input-group-addon">
          <i class="fa fa-calendar bigger-110"></i>
        </span>
        </div>
      </div>
      <div class="form-group">
        <label>Actual Start Date</label>
        <div class="input-group">
        <input name = "actual_start_date" id="actual_start_date" type="text" class="form-control date-picker">
        <span class="input-group-addon">
          <i class="fa fa-calendar bigger-110"></i>
        </span>
        </div>
      </div>
      </div>
      <div class="col-xs-4">
      <div class="form-group">
        <label>Actual End Date</label>
        <div class="input-group">
        <input name = "actual_end_date" id="actual_end_date" type="text" class="form-control date-picker">
        <span class="input-group-addon">
          <i class="fa fa-calendar bigger-110"></i>
        </span>
        </div>
      </div> 
      <div class="form-group">
        <label>Budget</label>
        <input name = "budget" type="text" class="form-control">
      </div> 
      <div class="form-group">
        <label>Cost</label>
        <input name = "cost" type="text" class="form-control">
      </div> 
      <div class="form-group">
        <label>Target Fresh</label>
        <input name = "target_fresh" type="text" class="form-control">
      </div> 
      <div class="form-group">
        <label>Target Exp</label>
        <input name = "target_exp" type="text" class="form-control">
      </div>  
      </div>
      <div class="col-xs-4">
      <div class="form-group">
        <label>Target Fresh Call</label>
        <input name = "target_fresh_call" type="text" class="form-control">
      </div> 
      <div class="form-group">
        <label>Target Exp Call</label>
        <input name = "target_exp_call" type="text" class="form-control">
      </div> 
      <div class="form-group">
        <label>Target Fresh Pass</label>
        <input name = "target_fresh_pass" type="text" class="form-control">
      </div>  
      <div class="form-group">
        <label>Target Exp Pass</label>
        <input name = "target_exp_pass" type="text" class="form-control">
      </div> 
      <div class="form-group">
        <label>Active</label>
        <select name = 'is_active' class = 'form-control' style="width: 100%;">    
          <option value="1">Ya</option>
          <option value="0">Tidak</option>
        </select>
      </div>
    </div>
    <div class="form-group">
        <label>Domain</label>
        <input name = "domain" type="text" class="form-control">
      </div>
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