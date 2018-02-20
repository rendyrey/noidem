</div>
	</form>
		</div><!-- /.page-content -->				
			</div><!-- /.main-content -->
			</div>
			<br>
				<div class="footer-inner" align="center">
					PT. MEDION
					&copy; 2016
				</div>
			<br>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>				
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			$(window).load(function() {
				 $("#more_edu").attr("hidden","hidden", !$(this).is(':checked'));
				 $("#D3_more").attr("hidden","hidden", !$(this).is(':checked'));
				 // $("#remove_field").hide();
			});
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/coding_js/chosen-photo.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/coding_js/validasi_2.js"></script>
		<script src="assets/coding_js/general_data.js"></script>
		<script src="assets/coding_js/other_data.js"></script>
		<script src="assets/coding_js/confirmation.js"></script>
		<script src="assets/coding_js/work_experience.js"></script>
		<script src="assets/coding_js/just_number.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				String.format = function() {
			    var s = arguments[0];
			    for (var i = 0; i < arguments.length - 1; i++) {
			        var reg = new RegExp("\\{" + i + "\\}", "gm");
			        s = s.replace(reg, arguments[i + 1]);
			    }

			    return s;
			}
		    var max_fields      = 4; //maximum input boxes allowed
		    var wrapper         = $("#more_work_experience"); //Fields wrapper
		    var add_button      = $("#add"); //Add button ID
		    var form1			= '<div id="tampil_form"><br><div class="form-group"><label class="col-xs-12 col-sm-3 control-label no-padding-right">Line of Business</label><div class="col-xs-12 col-sm-5"><select name="more_id_bidang_usaha{0}" class="chosen-select form-control more" id="more_id_bidang_usaha{1}" data-placeholder="Choose ..."><option></option>@foreach($bidang_usaha as $value)<option value="{{$value->id}}">{{$value->bidang_usaha}}</option>@endforeach</select></div></div>', index1 = 0;
		    var form2			= '<div class="form-group more" id="more_other_bidang_usaha{0}" hidden><label class="col-xs-12 col-sm-3 control-label no-padding-right">Other Line of Business</label><div class="col-xs-12 col-sm-5"><span class="block input-icon input-icon-right"><input type="text" name="more_other_bidang_usaha{1}" class="width-100 more_other_bidang_usaha"><i class="ace-icon fa fa-pencil-square-o"></i></span></div></div>', index2 = 0;
		    var form3			= '<div class="form-group"><label class="col-xs-12 col-sm-3 control-label no-padding-right">Start Year</label><div class="col-xs-12 col-sm-2"><select name="more_we_start_month{0}" class="form-control">@foreach($months as $num => $name)<option value="{{$name}}">{{$name}}</option>@endforeach</select></div><div class="col-xs-12 col-sm-2"><select name="more_we_start_year{1}" class="form-control">@foreach ($yearArray as $year){{$selected = ($year == $cur_year) ? "selected" : ''}}<option {{$selected}} value="{{$year}}">{{$year}}</option>@endforeach</select></div></div>', index3 = 0;
		    var form4 			= '<div class="form-group"><label class="col-xs-12 col-sm-3 control-label no-padding-right">End Year</label><div class="col-xs-12 col-sm-2"><select name="more_we_end_month{0}" class="form-control"><option value="Present">Present</option>@foreach ($months as $num => $name)<option value="{{$name}}">{{$name}}</option>@endforeach</select></div><div class="col-xs-12 col-sm-2"><select name="more_we_end_year{1}" class="form-control"><option value="Present">Present</option>@foreach ($yearArray as $year){{$selected = ($year == $cur_year) ? '' : ''}}<option {{$selected}} value="{{$year}}">{{$year}}</option>@endforeach</select></div></div></div>', index4 = 0;

		    var x = 1; //initlal text box count
		    // $("#remove_field").hide();
		    $(add_button).click(function(e){ //on add input button click
		        e.preventDefault();
		        if(x < max_fields){ //max input box allowed
		            x++; //text box increment		            
		            $(wrapper).append(String.format(form1+form2+form3+form4,index1,index1,index2,index2,index3,index3,index4,index4)); //add input box
		            index1 = index1 + 1;
		            index2 = index2 + 1;
		            index3 = index3 + 1;
		            index4 = index4 + 1;
		            $('.chosen-select').chosen({allow_single_deselect:true});
		            // $("#remove_field").show('slow');

					jQuery(function($) {
					    $('#more_other_bidang_usaha0').hide(); 
					    $('#more_id_bidang_usaha0').change(function(){
					        if($('#more_id_bidang_usaha0').val() == '19') {
					            $('#more_other_bidang_usaha0').show('slow'); 
					        } else {
					            $('#more_other_bidang_usaha0').hide('slow'); 
					        } 
					    });
					});	

					jQuery(function($) {
					    $('#more_other_bidang_usaha1').hide(); 
					    $('#more_id_bidang_usaha1').change(function(){
					        if($('#more_id_bidang_usaha1').val() == '19') {
					            $('#more_other_bidang_usaha1').show('slow'); 
					        } else {
					            $('#more_other_bidang_usaha1').hide('slow'); 
					        } 
					    });
					});	

					jQuery(function($) {
					    $('#more_other_bidang_usaha2').hide(); 
					    $('#more_id_bidang_usaha2').change(function(){
					        if($('#more_id_bidang_usaha2').val() == '19') {
					            $('#more_other_bidang_usaha2').show('slow'); 
					        } else {
					            $('#more_other_bidang_usaha2').hide('slow'); 
					        } 
					    });
					});								
		        }
		    });
		   
		    $(wrapper).on("click","#remove_field", function(e){ //user click on remove text
		        e.preventDefault(); 
		        $("#tampil_form").fadeOut(500, function() { 
		        	$(this).remove();
		        }); 
		        x--;		        
		    });
		});
		</script>				
	</body>
</html>