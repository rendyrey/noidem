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
            <a class="btn btn-white btn-primary" data-toggle="modal" data-target="#myModal" title= "Tambah Data"><i class='fa fa-plus'></i> Tambah Header</a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th rowspan="2" class="detail-col">Details</th>
                  <th rowspan="2"><center>Adv Category</center></th>
                  <th rowspan="2"><center>Adv Media</center></th>
                  <th colspan="2"><center>Plan</center></th>
                  <th colspan="2"><center>Actual</center></th>
                  <th rowspan="2"><center>Event Code</center></th>
                  <th rowspan="2"><center>Domain</center></th>
                  <th rowspan="2"><center>aksi</center></th>
                </tr>
                <tr>
                  <th><center>Start Date</center></th>
                  <th><center>End Date</center></th>
                  <th><center>Start Date</center></th>
                  <th><center>End Date</center></th>
                </tr>
              </thead>
              <tbody>
              @foreach($iklan as $value)
                <tr>
                  <td class="center">
                    <div class="action-buttons">
                      <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                        <i class="ace-icon fa fa-angle-double-down"></i>
                        <span class="sr-only">Details</span>
                      </a>
                    </div>
                  </td>
                  <td>{{$value->advertising_category->kategori}}</td>
                  <td>{{$value->advertising_media->media}}</td>
                  <td>{{$value->plan_start_date}}</td>
                  <td>{{$value->plan_end_date}}</td>
                  <td>{{$value->actual_start_date}}</td>
                  <td>{{$value->actual_end_date}}</td>
                  <td>{{$value->event_code}}</td>
                  <td><a href="http://{{$value->domain}}" target="_blank">{{$value->domain}}</a></td>
                  <td>
                    <a class="green" href="vacancy_advertising/{{$value->id}}/edit_iklan">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                  </td>
                </tr>
                <tr class="detail-row">
                  <td colspan="10">
                  <div class="table-detail">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12">
                        <div class="space visible-xs"></div>
                        <table class="table table-sm table-striped table-bordered">
                        <?php $lokers = App\Loker::where('id_iklan', $value->id)->get(); ?>
                        
                        <tr>
                          <!-- <th>Iklan</th> -->
                          <th>Budget</th>
                          <th>Cost</th>
                          <th>Edu Level</th>
                          <th>Major Grup</th>
                          <th>Major</th>
                          <th>No RCR</th>
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
                        @foreach($lokers as $values)
                        <tr>
                        <!-- <td>{{$values->id_iklan}}</td> -->
                        <td>{{$values->budget}}</td>
                        <td>{{$values->cost}}</td>
                        <td>{{$values->tingkat_pendidikan->tingkat}}</td>
                        <td>{{$values->major_grup->nama_grup}}</td>
                        <td>{{$values->major->major}}</td>
                        <td>{{$values->no_rcr}}</td>
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
                        <td> <a class="green" href="vacancy_advertising/{{$values->id}}/edit_loker">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a></td>
                        </tr>
                        @endforeach
                        </table>
                        <style type="text/css">
                        #form{{$value->id}} {
                          display : none;
                        }
                        button {
                          margin-bottom: 10px;
                        }
                        </style>
                        <button id="signup{{$value->id}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Detail</button>
                        <div class="space-10"></div>      
                        <div id="signup{{$value->id}}">                          
                        <form action="tambah/{{$value->id}}/loker"  method="POST"  id="form{{$value->id}}">
                        <div class="col-xs-12">
                          {!! csrf_field() !!}
                          <div class="col-xs-3">            
                            <div class="form-group">
                              <label>No RCR</label>
                              <input name = "id_iklan_{{$value->id}}" type="hidden" class="form-control">
                              <input name = "no_rcr_{{$value->id}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Budget</label>
                              <input name = "budget_{{$value->id}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Cost</label>
                              <input name = "cost_{{$value->id}}" type="text" class="form-control">
                            </div>      
                            <div class="form-group">
                              <label>Tingkat Pendidikan</label>
                              <select name = 'id_tingkat_pendidikan_{{$value->id}}' class = 'form-control'>
                                  @foreach($tingkat_pendidikan as $key1 => $value1)
                                  <option value="{{$key1}}">{{$value1}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Major Grup</label>
                              <select name = 'id_major_grup_{{$value->id}}' class = 'form-control' id="major_grup_{{$value->id}}">
                                  @foreach($major_grup as $key1 => $value1)
                                  <option value="{{$key1}}" name="{{$key1}}">{{$value1}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Major</label>
                              <select name = 'id_major_{{$value->id}}' class = 'form-control' id="major_{{$value->id}}">
                                  @foreach($major as $value1)
                                  <option value="{{$value1->id}}" name="{{$value1->id_grup}}">{{$value1->major}}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-xs-3">            
                          <div class="form-group">
                            <label>Posisi</label>
                            <input name = "posisi_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Posisi Publish</label>
                            <input name = "posisi_publish_{{$value->id}}" type="text" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Target Fresh</label>
                            <input name = "target_fresh_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Target Exp</label>
                            <input name = "target_exp_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Actual Fresh</label>
                            <input name = "actual_fresh_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Actual Exp</label>
                            <input name = "actual_exp_{{$value->id}}" type="text" class="form-control">
                          </div>                       
                          </div>

                          <div class="col-xs-3"> 
                          <div class="form-group">
                            <label>Target Pg Fresh</label>
                            <input name = "target_pg_fresh_{{$value->id}}" type="text" class="form-control">
                          </div>           
                          <div class="form-group">
                            <label>Target Pg Exp</label>
                            <input name = "target_pg_exp_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Actual Pg Fresh</label>
                            <input name = "actual_pg_fresh_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Actual Pg Exp</label>
                            <input name = "actual_pg_exp_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Awaiting Fresh</label>
                            <input name = "awaiting_fresh_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Awaiting Exp</label>
                            <input name = "awaiting_exp_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          </div>

                          <div class="col-xs-3"> 
                          <div class="form-group">
                            <label>Target Pass Fresh</label>
                            <input name = "target_pass_fresh_{{$value->id}}" type="text" class="form-control">
                          </div>            
                          <div class="form-group">
                            <label>Target Pass Exp</label>
                            <input name = "target_pass_exp_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Actual Pass Fresh</label>
                            <input name = "actual_pass_fresh_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Actual Pass Exp</label>
                            <input name = "actual_pass_exp_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Index Adv Media Effect Fresh</label>
                            <input name = "index_adv_media_effect_fresh_{{$value->id}}" type="text" class="form-control">
                          </div> 
                          <div class="form-group">
                            <label>Index Adv Media Effect Exp</label>
                            <input name = "index_adv_media_effect_exp_{{$value->id}}" type="text" class="form-control">
                          </div>                          
                          </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-check"></i> Simpan</button>
                        </form>
                      </div>              
                      </div>
                    </div>
                  </div>
                  </td>
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

<!-- Modal Tambah Vacancy-->
<div id="myModal" class="modal fade" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 class="smaller lighter blue no-margin">Tambah Data Iklan</h3>
  </div>
  <form action="{{url('tambah_iklan')}}" method="POST">
  <div class="col-xs-12"> 
  <div class="modal-body">      
  {!! csrf_field() !!}
    <div class="col-xs-6">            
      <div class="form-group">
        <label>Event Code</label>
        <input name = "event_code" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Adv Category</label>
        <select name = 'id_kategori' class = 'form-control' id="adv_categorys">
            @foreach($advertising_category as $key1 => $value1)
            <option value="{{$key1}}" name="{{$key1}}">{{$value1}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Adv Media</label>
        <select name = 'id_media' class = 'form-control' id="adv_medias">
            @foreach($advertising_media as $value1)
            <option value="{{$value1->id}}" name="{{$value1->advertising_category->id}}">{{$value1->media}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Domain</label>
        <select name = 'domain' class = 'form-control'>
            <option value="formlamaran.medion.co.id">formlamaran.medion.co.id</option>
            <option value="jobfair.medion.co.id">jobfair.medion.co.id</option>
            <option value="cr.medion.co.id">cr.medion.co.id</option>
        </select>
      </div>
      </div>

    <div class="col-xs-6">
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
      <div class="form-group">
        <label>Actual End Date</label>
        <div class="input-group">
        <input name = "actual_end_date" id="actual_end_date" type="text" class="form-control date-picker">
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
<script src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript">
  var $adv_categorys = $( '#adv_categorys' ),
      $adv_medias = $( '#adv_medias' ),
      $options = $adv_medias.find( 'option' );
    
      $adv_categorys.on( 'change', function() {
      $adv_medias.html( $options.filter( '[name="' + this.value + '"]' ) );
      } ).trigger( 'change' );
</script>
@foreach($iklan as $val)
<script type="text/javascript">
  $( document ).ready( function() {
  $( "#signup{{$val->id}}" ).click( function() {
    $( "#form{{$val->id}}" ).toggle( 'slow' );
  });
});
</script>
<script type="text/javascript">
  var $select1_{{$val->id}} = $( '#major_grup_{{$val->id}}' ),
      $select2_{{$val->id}} = $( '#major_{{$val->id}}' ),
      $options_{{$val->id}} = $select2_{{$val->id}}.find( 'option' );
    
      $select1_{{$val->id}}.on( 'change', function() {
      $select2_{{$val->id}}.html( $options_{{$val->id}}.filter( '[name="' + this.value + '"]' ) );
      } ).trigger( 'change' );
</script>
@endforeach
@stop