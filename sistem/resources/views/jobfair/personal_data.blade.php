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
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Full Name</label>

							<div class="col-xs-12 col-sm-5">
								<span class="block input-icon input-icon-right">
									<input type="text" name="nama" class="width-100" />
									<i class="ace-icon fa fa-pencil-square-o"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Gender</label>
							<div class="col-xs-12 col-sm-5">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-white">
										<input type="radio" name="jenis_kelamin" id="option1" autocomplete="off" checked value="Laki-laki"> Male
									</label>
									<label class="btn btn-white">
										<input type="radio" name="jenis_kelamin" id="option2" autocomplete="off" value="Perempuan"> Female
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Marital Status</label>
							<div class="col-xs-12 col-sm-5">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-white">
										<input type="radio" name="status" id="option1" autocomplete="off" checked value="Single"> Single
									</label>
									<label class="btn btn-white">
										<input type="radio" name="status" id="option2" autocomplete="off" value="Married"> Married
									</label>
									<label class="btn btn-white">
										<input type="radio" name="status" id="option2" autocomplete="off" value="Widow"> Widow
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Date of Birth</label>
							<div class="col-xs-12 col-sm-2">
								<select name="tgl_lahir" class="form-control">
									<option value="">Select Date</option>
									<?php
									foreach ($dateArray as $date) {
										$selected = ($date == 1) ? 'selected' : '';
										echo '<option '.$selected.' value="'.$date.'">'.$date.'</option>';
									}
									?>
								</select>
							</div>
							<div class="col-xs-12 col-sm-2">
								<select name='month_of_birth' class="form-control">
									<option value="">Select Month</option>
									<?php
									foreach ($months as $num => $name) {
										printf('<option value="%s">%s</option>', $num, $name);
									}
									?>
								</select>
							</div>
							<div class="col-xs-12 col-sm-2">
								<select name="year_of_birth" class="form-control">
									<option value="">Select Year</option>
									<?php
									foreach ($yearArray as $year) {
										$selected = ($year == $cur_year) ? 'selected' : '';
										echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">E-mail</label>

							<div class="col-xs-12 col-sm-5">
								<span class="block input-icon input-icon-right">
									<input type="text" name="email" class="width-100" />
									<i class="ace-icon fa fa-envelope"></i>
								</span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Mobile Phone</label>

							<div class="col-xs-12 col-sm-5">
								<span class="block input-icon input-icon-right">
									<input type="text" name="mobile_phone" class="width-100" placeholder="ex. 081223344556" />
									<i class="ace-icon fa fa-mobile"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right"></label>
							<div class="col-sm-4">
								<div class="widget-box">
									<div class="widget-header">
										<h4 class="widget-title">Photo </h4><small>must be .jpg, .png, .bmp formats</small>
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
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.widget-main -->
		</div><!-- /.widget-body -->
	</div>
</div><!-- /.col -->
<!--=============================== Personal Data ================== -->
