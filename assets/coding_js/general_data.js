var $select1 = $( '#adv_cat' );

		var $interest_1 = $( '#interest_1' );
		var $options_1 = $interest_1.find( 'option' );
		var $interest_2 = $( '#interest_2' );
		var $options_2 = $interest_2.find( 'option' );
		var $interest_3 = $( '#interest_3' );
		var $options_3 = $interest_3.find( 'option' );
		var $interest_4 = $( '#interest_4' );
		var $options_4 = $interest_4.find( 'option' );
		var $tgl_psychotest = $("#tgl_psychotest");
		var $option_5 = $tgl_psychotest.find( 'option' );

		$select1.on('change', function() {

			$interest_1.html($options_1.filter('[name="' + this.value + '"]'));
			$interest_2.html($options_2.filter('[name="' + this.value + '"]'));
			$interest_3.html($options_3.filter('[name="' + this.value + '"]'));
			$interest_4.html($options_4.filter('[name="' + this.value + '"]'));
			$tgl_psychotest.html($option_5.filter('[name="' + this.value + '"]'));

			var length = $( '#interest_1 option' ).length;

			if(length >= 4){
				$('#com_adv_cat').hide('slow');
				$('#lbl_job_1').show('slow');
				$('#lbl_job_2').show('slow');
				$('#lbl_job_3').show('slow');
				$('#lbl_job_4').show('slow');
			} else if(length == 3){
				$('#com_adv_cat').hide('slow');
				$('#lbl_job_1').show('slow');
				$('#lbl_job_2').show('slow');
				$('#lbl_job_3').show('slow');
				$('#lbl_job_4').hide('slow');
			} else if (length == 2){
				$('#com_adv_cat').hide('slow');
				$('#lbl_job_1').show('slow');
				$('#lbl_job_2').show('slow');
				$('#lbl_job_3').hide('slow');
				$('#lbl_job_4').hide('slow');
			} else if (length == 1) {
				$('#com_adv_cat').hide('slow');
				$('#lbl_job_1').show('slow');
				$('#lbl_job_2').hide('slow');
				$('#lbl_job_3').hide('slow');
				$('#lbl_job_4').hide('slow');
			} else {
				$('#com_adv_cat').show('slow');
				$('#lbl_job_1').hide('slow');
				$('#lbl_job_2').hide('slow');
				$('#lbl_job_3').hide('slow');
				$('#lbl_job_4').hide('slow');
			}

			$interest_1.append('<option val="" selected></option>');
			$interest_2.append('<option val="" selected></option>');
			$interest_3.append('<option val="" selected></option>');
			$interest_4.append('<option val="" selected></option>');
			$tgl_psychotest.append('<option val="" selected></option>');

			$interest_1.append($("#interest_1 option").remove().sort(function(a, b) {
		    var at = $(a).text(), bt = $(b).text();
		    return (at > bt)?1:((at < bt)?-1:0);
			}));
			$interest_2.append($("#interest_2 option").remove().sort(function(a, b) {
		    var at = $(a).text(), bt = $(b).text();
		    return (at > bt)?1:((at < bt)?-1:0);
			}));
			$interest_3.append($("#interest_3 option").remove().sort(function(a, b) {
		    var at = $(a).text(), bt = $(b).text();
		    return (at > bt)?1:((at < bt)?-1:0);
			}));
			$interest_4.append($("#interest_4 option").remove().sort(function(a, b) {
		    var at = $(a).text(), bt = $(b).text();
		    return (at > bt)?1:((at < bt)?-1:0);
			}));
			$tgl_psychotest.append($("#tgl_psychotest option").remove().sort(function(a, b) {
		    var at = $(a).text(), bt = $(b).text();
		    return (at > bt)?1:((at < bt)?-1:0);
			}));
		}).trigger('change');
