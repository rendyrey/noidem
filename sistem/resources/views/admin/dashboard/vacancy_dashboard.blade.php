@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Vacancy Dashboard <small>(active vacancy)</small></h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <p class="text-muted font-13 m-b-30">
                {{-- The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built. --}}
              </p>
              <table id="datatable" class="table table-striped table-bordered table_dashboard">
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
                    <th>No RCR</th>
                    <th>Posisi</th>
                    <th>Posisi Publish</th>
                    <th>Budget</th>
                    <th>Cost</th>
                    <th>Target Fresh</th>
                    <th>Target Exp</th>
                    <th>Target pg Fresh</th>
                    <th>Target pg Exp</th>
                    <th>Target pass Fresh</th>
                    <th>Target pass Exp</th>
                    <th>Gender</th>
                    <th>Edu Level</th>
                    <th>Major Grup</th>
                    <th>Major</th>
                    <th>Actual Apllicant Fresh</th>
                    <th>Actual Applicant Exp</th>
                    <th>Actual Fresh</th>
                    <th>Actual Exp</th>
                    <th>Actual pg Fresh</th>
                    <th>Actual pg Exp</th>
                    <th>Awaiting Fresh</th>
                    <th>Awaiting Exp</th>
                    <th>Actual pass Fresh</th>
                    <th>Actual pass Exp</th>
                    <th>Index Fresh</th>
                    <th>Index Exp</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($iklan as $values)
                    <?php $loker = App\Loker::where('id_iklan', $values->id)->get();
                    $tanggal = strtotime($values->actual_end_date);
                    $ctanggal = date('M Y', $tanggal);
                    $head = 0;
                    ?>
                    @foreach($loker as $val)
                      <tr data-year="{{$ctanggal}}">
                        @if($head==0)
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
                        @else
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        @endif
                        <td><a href="http://{{$values->domain}}" target="_blank">{{$values->domain}}</a></td>
                        <td>{{$val->no_rcr}}</td>
                        <td>{{$val->position_name}}</td>
                        <td>{{$val->position_publish}}</td>
                        <td>Rp.{{number_format($val->budget)}}</td>
                        <td>Rp.{{number_format($val->cost)}}</td>
                        <td>{{$val->target_fresh}}</td>
                        <td>{{$val->target_exp}}</td>
                        <td>{{$val->target_pg_fresh}}</td>
                        <td>{{$val->target_pg_exp}}</td>
                        <td>{{$val->target_pass_fresh}}</td>
                        <td>{{$val->target_pass_exp}}</td>
                        <td>{{$val->gender}}</td>
                        <td>{{$val->tingkat_pendidikan->tingkat}}</td>
                        <td>{{$val->major_grup->nama_grup}}</td>
                        <td>{{$val->major->major}}</td>
                        <td>{{$val->actual_fresh}}</td>
                        <td>{{$val->actual_exp}}</td>
                        <td>Belum</td>
                        <td>Belum</td>
                        <td>{{$val->actual_pg_fresh}}</td>
                        <td>{{$val->actual_pg_exp}}</td>
                        <td>{{$val->awaiting_fresh}}</td>
                        <td>{{$val->awaiting_exp}}</td>
                        <td>{{$val->actual_pass_fresh}}</td>
                        <td>{{$val->actual_pass_exp}}</td>
                        <td>{{$val->index_adv_media_effect_fresh}}</td>
                        <td>{{$val->index_adv_media_effect_exp}}</td>
                      </tr>
                      <?php $head=1;?>
                    @endforeach
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    @endsection
