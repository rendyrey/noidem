@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Main Dashboard</h3>
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
                    <th><center>Month</center></th>
                    <th><center>Target Join Date</center></th>
                    <th><center>Request Date</center></th>
                    <th><center>Target Fullfillment Date</center></th>
                    <th><center>No. RCR</center></th>
                    <th><center>Position</center></th>
                    <th><center>Gender</center></th>
                    <th><center>Exp</center></th>
                    <th>Edu Level</th>
                    <th>Major Group</th>
                    <th>Adv Category</th>
                    <th>Adv Media</th>
                    <th>Plan Start Date</th>
                    <th>Plan End Date</th>
                    <th>Actual Start Date</th>
                    <th>Actual End Date</th>
                    <th>Target Result</th>
                    <th>Actual Result</th>
                    <th>Target Pg</th>
                    <th>Actual Pg</th>
                    <th>Awaiting</th>
                    <th>In-Process</th>
                    <th>Done</th>
                    <th>Failed</th>
                    <th>Passed</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    @endsection
