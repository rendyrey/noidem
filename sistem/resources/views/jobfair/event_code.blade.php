<!--=============================== Event Code ========================== -->
@if(count($errors)>0)
	<ul>
		@foreach ($errors->all() as $err)
			<li><font color='red'>{{$err}}</font></li>
		@endforeach
	</ul>
@endif

<form class="form-horizontal" id="sample-form" action="{{url('open_form')}}" method="post" >
	<div class="row">
		<div class="col-xs-12">
			<div class="widget-box widget-color-orange">
				<div class="widget-header widget-header-blue">
					<h4 class="widget-title lighter">Event Code</h4>
				</div>
				<div class="widget-body">
					<div class="widget-main">
						<div id="fuelux-wizard-container">
							<div class="step-pane active" data-step="1">
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Event Code</label>

									<div class="col-xs-12 col-sm-5">
										<span class="block input-icon input-icon-right">
											<input type="text" name="event_code" class="width-100" maxlength="3" oninput="validAngka(this)" />
											<i class="ace-icon fa fa-pencil-square-o"></i>
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-12" align="right">
										<button type="submit" id="simpan_lamaran" class="btn btn-white btn-default btn-round"><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Submit</button>
										<button type="reset" class="btn btn-white btn-default btn-round"><i class="ace-icon fa fa-times red2"></i>Cancel</button>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.widget-main -->
				</div><!-- /.widget-body -->
			</div>
		</div><!-- /.col -->
		<!--=============================== Event Code =========================== -->
