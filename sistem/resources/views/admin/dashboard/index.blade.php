@extends('layout.index')
@section('content')
    <div class="page-content">  
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12">
          <form>
          <label>Month : </label>
          <select data-table="table">
            <option value="All">All</option>         
            <option value="Jan 2016">Jan 2016</option>
            <option value="Feb 2016">Feb 2016</option>
            <option value="Mar 2016">Mar 2016</option>
            <option value="Apr 2016">Apr 2016</option>
            <option value="May 2016">May 2016</option>
            <option value="Jun 2016">Jun 2016</option>
            <option value="Jul 2016">Jul 2016</option>
            <option value="Aug 2016">Aug 2016</option>
            <option value="Sep 2016">Sep 2016</option>
            <option value="Oct 2016">Oct 2016</option>
            <option value="Nov 2016">Nov 2016</option>
            <option value="Dec 2016">Dec 2016</option>          
          </select>
          </form>
          <div class="space-10"></div>
          <div class="table-responsive">
            <table class="table table-condensed" id="myTable">
              <thead>
                <tr>
                  <th><center>Adv Category</center></th>
                  <th><center>Adv Media</center></th>
                  <th><center>Plan Start Date</center></th>
                  <th><center>Plan End Date</center></th>
                  <th><center>Actual Start Date</center></th>
                  <th><center>Actual End Date</center></th>
                  <th><center>Event Code</center></th>
                  <th><center>Domain</center></th>
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
                </tr>
              </thead>
              <tbody id="fbody">
              @foreach($iklan as $values)
              <?php $loker = App\Loker::where('id_iklan', $values->id)->get();
              $tanggal = strtotime($values->actual_end_date);
              $ctanggal = date('M Y', $tanggal);
              ?>

              @foreach($loker as $val)              
                <tr data-year="{{$ctanggal}}">
                  <td>{{$values->advertising_category->kategori}}</td>
                  <td>{{$values->advertising_media->media}}</td>
                  <td>{{$values->plan_start_date}}</td>
                  <td>{{$values->plan_end_date}}</td>
                  <td>{{$values->actual_start_date}}</td>
                  <td>{{$values->actual_end_date}}</td>
                  <?php
                  if ($values->event_code == "")
                  {
                    $values->event_code = "-";
                  } else {

                    $values->event_code = $values->event_code;
                  }

                  ?>
                  <td>{{$values->event_code}}</td>
                  <td><a href="http://{{$values->domain}}" target="_blank">{{$values->domain}}</a></td><td>{{$val->budget}}</td>
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
              </tbody>                      
            </table>              
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.span -->
</div><!-- /.row -->
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
<script type="text/javascript">
  var filterTable = function(item) {
  // Select the table based on select data attribute 
  var table = $('.' + item.data('table') + ' tbody');
  // Cache the table rows
  var rows = table.find('tr');
  // Get the value of the selected item
  var val = item.val();
  // Show all the rows
  rows.show();
  // Hide all the rows except the ones with the value
  if(val == "All") {
    rows.show();                
  }else{
    rows.not(table.find('tr[data-year="' + val + '"]')).hide();        
  }
}
$('select').on('change', function(e){
    // Fire on select change
    filterTable($(this));
});
// Find all select boxes and loop through to filter
$('select').each(function(i, val){
    filterTable($(val));
})
</script>
@stop