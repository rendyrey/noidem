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
                  Edit Data Loker
                </h4>
              </div>
                <div class="widget-body">
                  <div class="widget-main">
                    <form action='update_loker' method="GET">               
                      <div class="col-xs-12">
                          {!! csrf_field() !!}
                          <div class="col-xs-3">            
                            <div class="form-group">
                              <label>No RCR</label>
                              <input name = "no_rcr" type="text" class="form-control" value="{{$loker->no_rcr}}">
                            </div>
                            <div class="form-group">
                              <label>Budget</label>
                              <input name = "budget" type="text" class="form-control" value="{{$loker->budget}}" >
                            </div>
                            <div class="form-group">
                              <label>Cost</label>
                              <input name = "cost" type="text" class="form-control" value="{{$loker->cost}}">
                            </div>      
                            <div class="form-group">
                              <label>Tingkat Pendidikan</label>
                              <select name = 'id_tingkat_pendidikan' class = 'form-control'>
                                  @foreach($tingkat_pendidikan as $key1 => $value1)
                                  <option value="{{$key1}}" {{$loker->id_tingkat_pendidikan == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Major Grup</label>
                              <select name = 'id_major_grup' class = 'form-control' id="major_grups">
                                  @foreach($major_grup as $key1 => $value1)
                                  <option value="{{$key1}}" name="{{$key1}}" {{$loker->id_major_grup == $key1 ? 'selected' : ''}}>{{$value1}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Major</label>
                              <select name = 'id_major' class = 'form-control' id="majors">
                                  @foreach($major as $value1)
                                  <option value="{{$value1->id}}" name="{{$value1->id_grup}}" {{$loker->id_major == $value1->id ? 'selected' : ''}}>{{$value1->major}}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-xs-3">            
                          <div class="form-group">
                            <label>Posisi</label>
                            <input name = "posisi" type="text" class="form-control" value="{{$loker->position_name}}">
                          </div> 
                          <div class="form-group">
                            <label>Posisi Publish</label>
                            <input name = "posisi_publish" type="text" class="form-control" value="{{$loker->position_publish}}">
                          </div>
                          <div class="form-group">
                            <label>Target Fresh</label>
                            <input name = "target_fresh" type="text" class="form-control" value="{{$loker->target_fresh}}">
                          </div> 
                          <div class="form-group">
                            <label>Target Exp</label>
                            <input name = "target_exp" type="text" class="form-control" value="{{$loker->target_exp}}">
                          </div> 
                          <div class="form-group">
                            <label>Actual Fresh</label>
                            <input name = "actual_fresh" type="text" class="form-control" value="{{$loker->actual_fresh}}">
                          </div> 
                          <div class="form-group">
                            <label>Actual Exp</label>
                            <input name = "actual_exp" type="text" class="form-control" value="{{$loker->actual_exp}}">
                          </div>                       
                          </div>

                          <div class="col-xs-3"> 
                          <div class="form-group">
                            <label>Target Pg Fresh</label>
                            <input name = "target_pg_fresh" type="text" class="form-control" value="{{$loker->target_pg_fresh}}">
                          </div>           
                          <div class="form-group">
                            <label>Target Pg Exp</label>
                            <input name = "target_pg_exp" type="text" class="form-control" value="{{$loker->target_pg_exp}}">
                          </div> 
                          <div class="form-group">
                            <label>Actual Pg Fresh</label>
                            <input name = "actual_pg_fresh" type="text" class="form-control" value="{{$loker->actual_pg_fresh}}">
                          </div> 
                          <div class="form-group">
                            <label>Actual Pg Exp</label>
                            <input name = "actual_pg_exp" type="text" class="form-control" value="{{$loker->actual_pg_exp}}">
                          </div> 
                          <div class="form-group">
                            <label>Awaiting Fresh</label>
                            <input name = "awaiting_fresh" type="text" class="form-control" value="{{$loker->awaiting_fresh}}">
                          </div> 
                          <div class="form-group">
                            <label>Awaiting Exp</label>
                            <input name = "awaiting_exp" type="text" class="form-control" value="{{$loker->awaiting_exp}}">
                          </div> 
                          </div>

                          <div class="col-xs-3"> 
                          <div class="form-group">
                            <label>Target Pass Fresh</label>
                            <input name = "target_pass_fresh" type="text" class="form-control" value="{{$loker->target_pass_fresh}}">
                          </div>            
                          <div class="form-group">
                            <label>Target Pass Exp</label>
                            <input name = "target_pass_exp" type="text" class="form-control" value="{{$loker->target_pass_exp}}">
                          </div> 
                          <div class="form-group">
                            <label>Actual Pass Fresh</label>
                            <input name = "actual_pass_fresh" type="text" class="form-control" value="{{$loker->actual_pass_fresh}}">
                          </div> 
                          <div class="form-group">
                            <label>Actual Pass Exp</label>
                            <input name = "actual_pass_exp" type="text" class="form-control" value="{{$loker->actual_pass_exp}}">
                          </div> 
                          <div class="form-group">
                            <label>Index Adv Media Effect Fresh</label>
                            <input name = "index_adv_media_effect_fresh" type="text" class="form-control" value="{{$loker->index_adv_media_effect_fresh}}">
                          </div> 
                          <div class="form-group">
                            <label>Index Adv Media Effect Exp</label>
                            <input name = "index_adv_media_effect_exp" type="text" class="form-control" value="{{$loker->index_adv_media_effect_exp}}">
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
  var $major_grup = $( '#major_grups' ),
      $major = $( '#majors' ),
      $options = $major.find( 'option' );
    
      $major_grup.on( 'change', function() {
      $major.html( $options.filter( '[name="' + this.value + '"]' ) );
      } );
</script>
@stop