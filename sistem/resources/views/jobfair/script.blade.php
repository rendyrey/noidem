</div><!-- /.row -->
	</form>
		</div><!-- /.page-content -->				
			</div><!-- /.main-content -->
			</div>
			<br>
				<div class="footer-inner" align="center">PT. MEDION
					&copy; 2016
				</div>
			<br>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<script type="text/javascript">
			jQuery(function($) {			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}				
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop images here or click to choose Photo',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'fit',
					allowMime: ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"],
					preview_error : function(filename, error_code) {
					}
			
				}).on('change', function(){
				});
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
				//dynamically change allowed formats by changing allowExt && allowMime function			
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
			});
		</script>
		<script type="text/javascript">
		$('#medion_employee').change(function(){
			$("#medion_employee_name").prop("hidden", !$(this).is(':checked'));
		});
		$('#confirm_yes').change(function(){
			$("#simpan_lamaran").prop("disabled", !$(this).is(':checked'));
		});
		$('#confirm_no').change(function(){
			$("#simpan_lamaran").attr("disabled","disabled", !$(this).is(':checked'));
		});
		$('#confirm_followed_yes').change(function(){
			$("#confirm_followed_date").prop("hidden", !$(this).is(':checked'));
		});
		$('#confirm_followed_no').change(function(){
			$("#confirm_followed_date").attr("hidden","hidden", !$(this).is(':checked'));
		});
		$('#confirm_correctly').buttonset();
		function validAngka(a)
		{
  			if(!/^[0-9.]+$/.test(a.value))
  			{
  				a.value = a.value.substring(0,a.value.length-1);
  			}
		}
		</script>
		<script type="text/javascript">
		function other_institusi(val){
 			var element=document.getElementById('institusi');
 			if(val=='Other')
   				element.style.display='block';
 			else  
   				element.style.display='none';
		}
		function other_major(val){
 			var element=document.getElementById('major');
 			if(val=='Other')
   				element.style.display='block';
 			else  
   				element.style.display='none';
		}
		function line_business(val){
 			var element=document.getElementById('line_business');
 			if(val=='Other')
   				element.style.display='block';
 			else  
   				element.style.display='none';
		}
		function other_city(val){
 			var element=document.getElementById('city');
 			if(val=='Other')
   				element.style.display='block';
 			else  
   				element.style.display='none';
		}
		function other_venue(val){
 			var element=document.getElementById('other_venue');
 			if(val=='Other')
   				element.style.display='block';
 			else  
   				element.style.display='none';
		}
		</script>		
	</body>
</html>