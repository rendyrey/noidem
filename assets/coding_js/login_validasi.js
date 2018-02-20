jQuery(function ($){

	$('#form_login').validate({
        rules: {
        	'email': {
                required: true,
                email: true
            },
            'password': {
            	required: true
            }
        },

        highlight: function(element, errorClass, validClass) {
        	
            $(element).closest('.form-group').addClass('has-error');
               
        },

        unhighlight: function(element) {
        	
                $(element).closest('.form-group').removeClass('has-error');		            
            
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