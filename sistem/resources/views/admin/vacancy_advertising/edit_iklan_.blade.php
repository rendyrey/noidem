@extends('layout.index')
@section('content')
  <div class="page-content">
    @if (Session::has('message'))
      <div class="alert alert-{{Session::get('panel')}} fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
                Edit Data Iklan
              </h4>
            </div>
            <div class="widget-body">
              <div class="widget-main">
                <form action='update_iklan' method="GET">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Code</label>
                      <input name = "event_code" type="text" class="form-control" value="{{$iklan->event_code}}">
                    </div>
                    <div class="form-group">
                      <label>Adv Category</label>
                      <select name = 'id_kategori' class = 'form-control' id="adv_category">
                        @foreach($advertising_category as $key1 => $value1)
                          <option value="{{$key1}}" name="{{$key1}}" {{$iklan->id_kategori == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Adv Media</label>
                      <select name = 'id_media' class = 'form-control' id="adv_media">
                        @foreach($advertising_media as $value1)
                          <option value="{{$value1->id}}" name="{{$value1->advertising_category->id}}" {{$iklan->id_media == $value1->id ? 'selected' : ''}}>{{$value1->media}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Domain</label>
                      <select name = 'domain' class = 'form-control'>
                        <option value="formlamaran.medion.co.id" {{$iklan->domain == "formlamaran.medion.co.id" ? 'selected' : ''}}>formlamaran.medion.co.id</option>
                        <option value="jobfair.medion.co.id" {{$iklan->domain == "jobfair.medion.co.id" ? 'selected' : ''}}>jobfair.medion.co.id</option>
                        <option value="cr.medion.co.id" {{$iklan->domain == "cr.medion.co.id" ? 'selected' : ''}}>cr.medion.co.id</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Plan Start Date</label>
                      <div class="input-group">
                        <input name = "plan_start_date" id="plan_start_date" type="text" class="form-control" value="{{$iklan->plan_start_date}}">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar bigger-110"></i></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Plan End Date</label>
                        <div class="input-group">
                          <input name = "plan_end_date" id="plan_end_date" type="text" class="form-control" value="{{$iklan->plan_end_date}}">
                          <span class="input-group-addon">
                            <i class="fa fa-calendar bigger-110"></i></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Actual Start Date</label>
                          <div class="input-group">
                            <input name = "actual_start_date" id="actual_start_date" type="text" class="form-control" value="{{$iklan->actual_start_date}}">
                            <span class="input-group-addon">
                              <i class="fa fa-calendar bigger-110"></i></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Actual End Date</label>
                            <div class="input-group">
                              <input name = "actual_end_date" id="actual_end_date" type="text" class="form-control" value="{{$iklan->actual_end_date}}">
                              <span class="input-group-addon">
                                <i class="fa fa-calendar bigger-110"></i></span>
                              </div>
                            </div>
                          </div>
                          <a href="{{ url('vacancy_advertising') }}" class="btn btn-sm btn-danger">Close</a>
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
        <script src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript">
        var $adv_categorys = $( '#adv_category' ),
        $adv_medias = $( '#adv_media' ),
        $options = $adv_medias.find( 'option' );

        $adv_categorys.on( 'change', function() {
          $adv_medias.html( $options.filter( '[name="' + this.value + '"]' ) );
        } );
      </script>


    @stop
