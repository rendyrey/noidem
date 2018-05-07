@extends('layout.index')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data Syarat Prescreening <small></small></h3>
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
              <form action="{{url('syarat_prescreening_khusus/'.$syarat_prescreening->id.'/update')}}" method="GET">

                <div class="form-group">
                  <label>Position Category</label>
                  <select name="position_category" class="form-control select_search" style="width:100%" data-placeholder="Pilih Position Category">
                    <option value=""></option>
                    @foreach ($position_category_opt  as $value)
                      <option value="{{$value}}" {{$syarat_prescreening->position_category==$value ? 'selected':''}}>{{$value}}</option>
                    @endforeach
                  </select>
                  <font color="red">{{$errors->first('position_category')}}</font>
                </div>
                <div class="form-group">
                  <label>Major</label>
                  <select name="id_major" class="form-control select_search" style="width:100%" data-placeholder="Pilih Major">
                    <option value=""></option>
                    @foreach ($major_opt  as $key=>$value )
                      <option value="{{$key}}" {{$syarat_prescreening->id_major==$key ? 'selected':''}}>{{$value}}</option>
                    @endforeach
                  </select>

                  <font color="red">{{$errors->first('major')}}</font>
                </div>
                <div class="form-group">
                  <label>Edu Level</label>
                  <select name="id_tingkat_pendidikan" class="form-control select_search" style="width:100%" data-placeholder="Pilih Edu Level">
                    <option value=""></option>
                    @foreach ($edu_level_opt as $key=>$value )
                      <option value="{{$key}}" {{$syarat_prescreening->id_tingkat_pendidikan==$key ? 'selected':''}}>{{$value}}</option>
                    @endforeach
                  </select>
                  <font color="red">{{$errors->first('id_tingkat_pendidikan')}}</font>
                </div>
                <div class="form-group">
                  <label>Accreditation</label>
                  <select name="accreditation" class="form-control select_search" style="width:100%" data-placeholder="Pilih Accreditation">
                    <option value=""></option>
                    @foreach ($accreditation_opt as $value)
                      <option value="{{$value}}" {{$syarat_prescreening->accreditation==$value ? 'selected':''}}>{{$value}}</option>
                    @endforeach
                  </select>
                  <font color="red">{{$errors->first('accreditation')}}</font>
                </div>
                <div class="form-group">
                  <label>GPA</label>
                  <input type="text" name="gpa" class="form-control" value="{{$syarat_prescreening->gpa}}">
                  <font color="red">{{$errors->first('gpa')}}</font>
                </div>
                <div class="form-group">
                  <label>Study Period</label>
                  <input type="text" name="study_period" class="form-control" value="{{$syarat_prescreening->study_period}}">
                  <font color="red">{{$errors->first('study_period')}}</font>
                </div>
                <div class="form-group">
                  <label>Age</label>
                  <input type="text" name="age" class="form-control" value="{{$syarat_prescreening->age}}">
                  <font color="red">{{$errors->first('age')}}</font>
                </div>
                <div class="form-group">
                  <label>Is Active</label>
                  <div class="radio">
                    <label>
                      @foreach ($is_active_opt as $value )
                        <input name="is_active" type="radio" class="flat" value="{{$value}}" {{$syarat_prescreening->is_active==$value ? 'checked':''}} required> {{$value=='1' ? 'Active':'Non-Active'}}
                      @endforeach
                    </label>
                  </div>
                </div>

                <a href="{{ url('syarat_prescreening') }}" class="btn btn-danger">Close</a>
                <input type="submit" class="btn btn-primary" value="Update">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
