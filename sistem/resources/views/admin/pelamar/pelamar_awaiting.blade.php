@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Pelamar <small>awaiting</small></h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
      @if (Session::has('message'))
        <div class="alert alert-{{Session::get('panel')}} alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          {{ Session::get('message') }}
        </div>
      @endif
      @if($errors->any())
        <ul>
          @foreach ($errors->all() as $error )
            <font color="red"><li>{{$error}}</li> </font>
          @endforeach
        </ul>
      @endif


      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              @if(isset($_GET['checkbox']))
                <?php $checkbox=$_GET['checkbox'];?>
                @foreach ($checkbox as $key => $value)
                  {{$value}}<br>
                @endforeach
              @endif
              <form action="" method="GET">
              <style>
              .scrollable { overflow-x: scroll; }

              </style>
              <div class="scrollable">
              <table id="" class="table table-striped table-bordered" style="width:100%;overflow-x:scroll">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Applicant</th>
                    <th>Name</th>
                    <th>Edu Level</th>
                    <th>Institution</th>
                    <th>Major Group</th>
                    <th>Major</th>
                    <th>Accreditation</th>
                    <th>GPA</th>
                    <th>Age</th>
                    <th>Study Period</th>
                    <th>Work Experience</th>
                    <th><input type="checkbox" class="selectAll"></th>
                  </tr>
                </thead>
                <tbody>
                  @for ($i=0; $i < 20; $i++)
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><input class="checkBoxClass" type="checkbox" name="checkbox[]" value="{{$i}}"></td>
                    </tr>
                  @endfor
                  <input type="submit" value="Submit"></button>
                </tbody>
              </thead>
            </table>
          </div>
          </form>
            </div>
          </div>
        </div>
      </div>




  @endsection
