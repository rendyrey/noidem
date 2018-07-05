<!--================================= Personal Data ======================= -->
<div class="col-xs-12">
	<div class="widget-box widget-color-orange">
		<div class="widget-header widget-header-blue">
			<h4 class="widget-title lighter">Personal Data</h4>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div id="fuelux-wizard-container">
					<div class="step-pane active" data-step="1">
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">NIK</label>
							<div class="col-xs-12 col-sm-5">
								<span class="block input-icon input-icon-right">
									<input type="text" name="nik" id="nik" class="width-100" placeholder="NIK or ID Number" value="{{old('nik')}}">
									<i class="ace-icon fa fa-pencil-square-o"></i>
									<br>
									<font color="red">{{$errors->first('nik')}}</font>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Full Name</label>
							<div class="col-xs-12 col-sm-5">
								<span class="block input-icon input-icon-right">
									<input type="text" name="nama" id="nama" class="width-100" placeholder="Name as ID Card" value="{{old('nama')}}">
									<i class="ace-icon fa fa-pencil-square-o"></i>
									<br>
									<font color="red">{{$errors->first('nama')}}</font>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Gender</label>
							<div class="col-xs-12 col-sm-5">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-white {{old('jenis_kelamin')=='Laki-Laki' ? 'active':''}}">
										<input type="radio" name="jenis_kelamin" id="jenis_kelamin"  value="Laki-Laki" {{old('jenis_kelamin')=='Laki-Laki' ? 'checked':''}}> Male
									</label>
									<label class="btn btn-white {{old('jenis_kelamin')=='Perempuan' ? 'active':''}}">
										<input type="radio" name="jenis_kelamin" id="jenis_kelamin"  value="Perempuan" {{old('jenis_kelamin')=='Perempuan' ? 'checked':''}}> Female
									</label>
								</div>
								<font color="red">{{$errors->first('jenis_kelamin')}}</font>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Marital Status</label>
							<div class="col-xs-12 col-sm-5">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-white {{old('status')=='Single' ? 'active':''}}">
										<input type="radio" name="status" id="status" autocomplete="off" value="Single" {{old('status')=='Single' ? 'checked':''}}> Single
									</label>
									<label class="btn btn-white {{old('status')=='Married' ? 'active':''}}">
										<input type="radio" name="status" id="status" autocomplete="off" value="Married" {{old('status')=='Married' ? 'checked':''}}> Married
									</label>
									<label class="btn btn-white {{old('status')=='Widow' ? 'active':''}}">
										<input type="radio" name="status" id="status" autocomplete="off" value="Widow" {{old('status')=='Widow' ? 'checked':''}}> Widow
									</label>
								</div>
								<font color="red">{{$errors->first('status')}}</font>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Date of Birth</label>
							<div class="col-xs-12 col-sm-2">
								<select name="date_of_birth" class="form-control">
									<option value="">Select Date</option>
									@foreach($dateArray as $date)
										<option value='{{$date}}' {{$date==old('date_of_birth') ? 'selected':''}}>{{$date}}</option>
									@endforeach
								</select>
								<font color="red">{{$errors->first('date_of_birth')}}</font>
							</div>
							<div class="col-xs-12 col-sm-2">
								<select name='month_of_birth' class="form-control">
									<option value="">Select Month</option>
									@foreach($months as $key => $value)
										<option value="{{$key}}" {{$key==old('month_of_birth') ? 'selected':''}}>{{$value}}</option>
									@endforeach
								</select>
								<font color="red">{{$errors->first('month_of_birth')}}</font>
							</div>
							<div class="col-xs-12 col-sm-2">
								<select name="year_of_birth" class="form-control">
									<option value="">Select Year</option>
									@foreach ($yearArray as $year)
										<option value="{{$year}}" {{$year==old('year_of_birth') ? 'selected':''}}>{{$year}}</option>
									@endforeach
								</select>
								<font color="red">{{$errors->first('year_of_birth')}}</font>
							</div>
						</div>
						<br>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">E-mail</label>
							<div class="col-xs-12 col-sm-5">
								<span class="block input-icon input-icon-right">
									<input type="text" name="email" id="email" class="width-100" value="{{old('email')}}">
									<i class="ace-icon fa fa-envelope"></i>
									<br>
									<font color="red">{{$errors->first('email')}}</font>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Mobile Phone</label>
							<div class="col-xs-12 col-sm-5">
								<span class="block input-icon input-icon-right">
									<input type="text" name="mobile_phone" class="width-100" placeholder="ex. 081223344556" value="{{old('mobile_phone')}}">
									<i class="ace-icon fa fa-mobile"></i>
									<br>
									<font color="red">{{$errors->first('mobile_phone')}}</font>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right"></label>
							<div class="col-sm-4">
								<font color="red">{{$errors->first('photo')}}</font>
								<div class="widget-box">
									<div class="widget-header">
										<h4 class="widget-title">Photo </h4><small>must be png, jpg, bmp formats</small>
									</div>
									<div class="widget-body">
										<div class="widget-main">
											<div class="form-group">
												<div class="col-xs-12">
													<input type="file" name="photo" id="id-input-file-3" accept=".png, .jpg, .jpeg .bmp"/>
												</div>
											</div>
										</div>
									</div>
								</div>
								<small>Max image size 1 MB</small>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.widget-main -->
		</div><!-- /.widget-body -->
	</div>
</div><!-- /.col -->
<!--=============================== Personal Data ================== -->
