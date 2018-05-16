@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Applicant Dashboard</h3>
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
                    <th><center>No. Applicant</center></th>
                    <th><center>Name</center></th>
                    <th><center>Gender</center></th>
                    <th><center>Edu Level</center></th>
                    <th><center>Institution Name</center></th>
                    <th><center>Major Group</center></th>
                    <th><center>Major</center></th>
                    <th><center>Work Experience</center></th>
                    <th>Job Interest</th>
                    <th>Status</th>
                    <th>Progress</th>
                    <th>Archive Code</th>
                    <th>Position Name</th>
                    <th>LT (days)</th>
                    <th>Advertising Media</th>
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
