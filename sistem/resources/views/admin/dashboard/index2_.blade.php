@extends('layout.index')
@section('content')
    <div class="page-content">  
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12">
          <div class="table-responsive">
            <table class="table" id="myTable">
              <thead>
                <tr>
                  <th rowspan="2"><center>Adv Category</center></th>
                  <th rowspan="2"><center>Adv Media</center></th>
                  <th colspan="2"><center>Plan</center></th>
                  <th colspan="2"><center>Actual</center></th>
                  <th rowspan="2"><center>Event Code</center></th>
                  <th rowspan="2"><center>Domain</center></th>
                  <th rowspan="2">Budget</th>
                  <th rowspan="2">Cost</th>
                  <th rowspan="2">Edu Level</th>
                  <th rowspan="2">Major Grup</th>
                  <th rowspan="2">Major</th>
                  <th rowspan="2">No RCR</th>
                  <th rowspan="2">Posisi</th>
                  <th rowspan="2">Posisi Publish</th>
                  <th rowspan="2">Target Fresh</th>
                  <th rowspan="2">Target Exp</th>
                  <th rowspan="2">Actual Fresh</th>
                  <th rowspan="2">Actual Exp</th>
                  <th rowspan="2">Target pg Fresh</th>
                  <th rowspan="2">Target pg Exp</th>
                  <th rowspan="2">Actual pg Fresh</th>
                  <th rowspan="2">Actual pg Exp</th>
                  <th rowspan="2">awaiting Fresh</th>
                  <th rowspan="2">awaiting Exp</th>
                  <th rowspan="2">Target pass Fresh</th>
                  <th rowspan="2">Target pass Exp</th>
                  <th rowspan="2">Actual pass Fresh</th>
                  <th rowspan="2">Actual pass Exp</th>
                  <th rowspan="2">Index Fresh</th>
                  <th rowspan="2">Index Exp</th>
                </tr>
                <tr>
                  <th><center>Start Date</center></th>
                  <th><center>End Date</center></th>
                  <th><center>Start Date</center></th>
                  <th><center>End Date</center></th>
                </tr>
              </thead>
              <tbody>
              @foreach($iklan as $values)
              <?php $loker = App\Loker::where('id_iklan', $values->id)->get(); ?>
              @foreach($loker as $val)              
                <tr>
                  <td>{{$values->advertising_category->kategori}}</td>
                  <td>{{$values->advertising_media->media}}</td>
                  <td>{{$values->plan_start_date}}</td>
                  <td>{{$values->plan_end_date}}</td>
                  <td>{{$values->actual_start_date}}</td>
                  <td>{{$values->actual_end_date}}</td>
                  <td>{{$values->event_code}}</td>
                  <td><a href="http://{{$values->domain}}" target="_blank">{{$values->domain}}</a></td>
                  
                  <td>{{$val->budget}}</td>
                  <td>{{$val->cost}}</td>
                  <td>{{$val->tingkat_pendidikan->tingkat}}</td>
                  <td>{{$val->major_grup->nama_grup}}</td>
                  <td>{{$val->major->major}}</td>
                  <td>{{$val->no_rcr}}</td>
                  <td>{{$val->position_name}}</td>
                  <td>{{$val->position_publish}}</td>
                  <td>{{$val->target_fresh}}</td>
                  <td>{{$val->target_exp}}</td>
                  <td>{{$val->actual_fresh}}</td>
                  <td>{{$val->actual_exp}}</td>
                  <td>{{$val->target_pg_fresh}}</td>
                  <td>{{$val->target_pg_exp}}</td>
                  <td>{{$val->actual_pg_fresh}}</td>
                  <td>{{$val->actual_pg_exp}}</td>
                  <td>{{$val->awaiting_fresh}}</td>
                  <td>{{$val->awaiting_exp}}</td>
                  <td>{{$val->target_pass_fresh}}</td>
                  <td>{{$val->target_pass_exp}}</td>
                  <td>{{$val->actual_pass_fresh}}</td>
                  <td>{{$val->actual_pass_exp}}</td>
                  <td>{{$val->index_adv_media_effect_fresh}}</td>
                  <td>{{$val->index_adv_media_effect_exp}}</td>
                                    
                </tr>
                @endforeach
                @endforeach                       
                </table>              
              </div>
            </div>
          </div>
          </td>
        </tr>
        
      </tbody>
    </table>
    </div>
  </div><!-- /.span -->
</div><!-- /.row -->
</div>
</div>
</div>
</div>
</div>
<script src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
function groupTable($rows, startIndex, total){
if (total === 0){
return;
}
var i , currentIndex = startIndex, count=1, lst=[];
var tds = $rows.find('td:eq('+ currentIndex +')');
var ctrl = $(tds[0]);
lst.push($rows[0]);
for (i=1;i<=tds.length;i++){
if (ctrl.text() ==  $(tds[i]).text()){
count++;
$(tds[i]).addClass('deleted');
lst.push($rows[i]);
}
else{
if (count>1){
ctrl.attr('rowspan',count);
groupTable($(lst),startIndex+1,total-1)
}
count=1;
lst = [];
ctrl=$(tds[i]);
lst.push($rows[i]);
}
}
}
groupTable($('#myTable tr:has(td)'),0,8);
$('#myTable .deleted').remove();
});
</script>
@stop