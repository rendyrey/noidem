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
          <div class="col-xs-12">
            <div class="widget-box">
              <div class="widget-header widget-header-flat">
                <h4 class="smaller">
                  Edit Data Event Vacancy
                </h4>
              </div>
                <div class="widget-body">
                  <div class="widget-main">
                    <form action='update' method="GET">               
                      <div class="col-xs-4">            
                        <div class="form-group">
                          <label>Event Code</label>
                          <input name = "event_code" type="text" class="form-control" value="{{$event_vacancy->event_code}}">
                        </div>                      
                        <div class="form-group">
                          <label>Media</label>
                          <select name = 'id_media' class = 'form-control'>
                          @foreach($advertising_media as $key1 => $value1)
                            <option value="{{$key1}}">{{$value1}}</option>
                          @endforeach
                            <option value="{{$event_vacancy->id_media}}" selected hidden>{{$event_vacancy->advertising_media->media}}</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Plan Start Date</label>
                          <div class="input-group">
                          <input name = "plan_start_date" id="plan_start_date" type="text" class="form-control" value="{{$event_vacancy->plan_start_date}}">
                          <span class="input-group-addon">
                          <i class="fa fa-calendar bigger-110"></i></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Plan End Date</label>
                          <div class="input-group">
                            <input name = "plan_end_date" id="plan_end_date" type="text" class="form-control" value="{{$event_vacancy->plan_end_date}}">
                            <span class="input-group-addon">
                            <i class="fa fa-calendar bigger-110"></i></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Actual Start Date</label>
                          <div class="input-group">
                          <input name = "actual_start_date" id="actual_start_date" type="text" class="form-control" value="{{$event_vacancy->actual_start_date}}">
                          <span class="input-group-addon">
                          <i class="fa fa-calendar bigger-110"></i></span>
                        </div>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="form-group">
                          <label>Actual End Date</label>
                          <div class="input-group">
                          <input name = "actual_end_date" id="actual_end_date" type="text" class="form-control" value="{{$event_vacancy->actual_end_date}}">
                          <span class="input-group-addon">
                          <i class="fa fa-calendar bigger-110"></i></span>
                          </div>
                        </div> 
                        <div class="form-group">
                          <label>Budget</label>
                          <input name = "budget" type="text" class="form-control" value="{{$event_vacancy->budget}}">
                        </div> 
                        <div class="form-group">
                          <label>Cost</label>
                          <input name = "cost" type="text" class="form-control" value="{{$event_vacancy->cost}}">
                        </div> 
                        <div class="form-group">
                          <label>Target Fresh</label>
                          <input name = "target_fresh" type="text" class="form-control" value="{{$event_vacancy->target_fresh}}">
                        </div> 
                        <div class="form-group">
                          <label>Target Exp</label>
                          <input name = "target_exp" type="text" class="form-control" value="{{$event_vacancy->target_exp}}">
                        </div>  
                      </div>
                      <div class="col-xs-4">
                        <div class="form-group">
                          <label>Target Fresh Call</label>
                          <input name = "target_fresh_call" type="text" class="form-control" value="{{$event_vacancy->target_fresh_call}}">
                        </div> 
                        <div class="form-group">
                          <label>Target Exp Call</label>
                          <input name = "target_exp_call" type="text" class="form-control" value="{{$event_vacancy->target_exp_call}}">
                        </div> 
                        <div class="form-group">
                          <label>Target Fresh Pass</label>
                          <input name = "target_fresh_pass" type="text" class="form-control" value="{{$event_vacancy->target_fresh_pass}}">
                        </div>  
                        <div class="form-group">
                          <label>Target Exp Pass</label>
                          <input name = "target_exp_pass" type="text" class="form-control" value="{{$event_vacancy->target_exp_pass}}">
                        </div> 
                        <div class="form-group">
                          <label>Active</label>
                          <select name = 'is_active' class = 'form-control' style="width: 100%;">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                            <?php 
                              if ($event_vacancy->is_active == "0")
                              {
                                echo '<option value="'.$event_vacancy->is_active.'" selected hidden>Tidak</option>';
                              }else
                              {
                                echo '<option value="'.$event_vacancy->is_active.'" selected hidden>Ya</option>';
                              }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Domain</label>
                          <input name = "domain" type="text" class="form-control" value="{{$event_vacancy->domain}}">
                        </div>
                      </div>
                        <a href="{{ url('event_vacancy') }}" class="btn btn-sm btn-danger">Close</a>
                        <input type="submit" class="btn btn-sm btn-primary" value="Update">     
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