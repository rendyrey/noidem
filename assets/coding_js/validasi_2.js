$.validator.addMethod('filesize', function (value, element, param) {
    	return this.optional(element) || (element.files[0].size <= param)
		}, 'File size must be less than 1 MB');

		jQuery(function ($){

			"use strict";

			$('#form_lamaran').validate({
		        rules: {
		        	'id_iklan': {
		                required: true
		            },
		            'job_interest_1': {
		                required: true
		            },
		            'nama': {
		                required: true
		            },
		            'email': {
		                required: true,
		                email: true
		            },
		            'mobile_phone': {
		            	required: true
		            },
		            'photo': {
		            	required: true,
		                filesize: 2000000
		            },
		            'id_institusi': {
		            	required: true
		            },
		            'id_major': {
		            	required: true
		            },
		            'gpa': {
		            	required: true
		            },
		            'id_tanggal_psychotest': {
		            	required: true
		            },
		            'gpa_more': {
		            	required: '#Profesi:checked,#S2:checked'
		            },
		            'other_institusi': {
		            	required: function (el) {
                			return $(el).closest('form_lamaran').find('#id_institusi').val() != '113';
            			}
		            },
		            'other_major': {
		            	required: function (el) {
                			return $(el).closest('form_lamaran').find('#id_major').val() != '152';
            			}
		            },
		            'other_institusi_more': {
		            	required: function (el) {
                			return $(el).closest('form_lamaran').find('#id_institusi_more').val() != '113';
            			}
		            },
		            'other_major_more': {
		            	required: function (el) {
                			return $(el).closest('form_lamaran').find('#id_major_more').val() != '152';
            			}
		            }

		        },
		        

		        highlight: function(element, errorClass, validClass) {

		        	if (element.type === "radio") {
		                this.findByName(element.name).addClass(errorClass).removeClass(validClass);
		            } else {
		                $(element).closest('.form-group').addClass('has-error');
		            }    
		        },

		        unhighlight: function(element) {

		        	if (element.type === "radio") {
		                this.findByName(element.name).removeClass(errorClass).addClass(validClass);
		            } else {
		                $(element).closest('.form-group').removeClass('has-error');
		        		$(element).closest('.form-group').find('chosen-select').remove();
		            }
		            
		        },

		        errorElement: 'span',
		        errorClass: 'help-block',
		        errorPlacement: function(error, element) {
		            if(element.parent('.input-group').length) {
		                error.insertAfter(element.parent());
		            } else {
		                error.insertAfter(element);
		            }
		        }
		    });

		});