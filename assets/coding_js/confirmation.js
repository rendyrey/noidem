$("#medion_employee").change(function(){
			$("#medion_employee_name").prop("hidden", !$(this).is(':checked'));
		});
		$('#confirm_yes').change(function(){
			$("#simpan_lamaran").prop("disabled", !$(this).is(':checked'));
		});
		$('#confirm_no').change(function(){
			$("#simpan_lamaran").attr("disabled","disabled", !$(this).is(':checked'));
		});
		$('#confirm_followed_yes').change(function(){
			$('#confirm_followed_date').show('slow');
		});
		$('#confirm_followed_no').change(function(){
			$('#confirm_followed_date').hide('slow');
		});
		$('#confirm_practical_yes').change(function(){
			$('#confirm_practical_date').show('slow');
		});
		$('#confirm_practical_no').change(function(){
			$('#confirm_practical_date').hide('slow');
		});
		$('#Profesi, #S2').change(function(){
			$('#more_edu').show('slow');			
		});
		$('#S1, #D3, #D4').change(function(){			
			$('#more_edu').hide('slow');			
		});

		$('#confirm_correctly').buttonset();