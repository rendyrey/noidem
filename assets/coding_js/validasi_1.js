function Validasi_simpan() {
	    var jk = document.forms["form_lamaran"]["jenis_kelamin"].value;
	    var status = document.forms["form_lamaran"]["status"].value;
	    var edu_level = document.forms["form_lamaran"]["id_tingkat_pendidikan"].value;
	    var institusi = document.forms["form_lamaran"]["id_institusi"].value;
	    var major = document.forms["form_lamaran"]["id_major"].value;
	    var pernah_pkl_dimedion = document.forms["form_lamaran"]["pernah_pkl_dimedion"].value;
	    var pernah_psychotest_dimedion = document.forms["form_lamaran"]["pernah_psychotest_dimedion"].value;
	    var confirm_correctly = document.forms["form_lamaran"]["confirm_correctly"].value;
	    var edu_level_more = document.forms["form_lamaran"]["id_tingkat_pendidikan_more"].value;
	    var institusi_more = document.forms["form_lamaran"]["id_institusi_more"].value;
	    var major_more = document.forms["form_lamaran"]["id_major_more"].value;
	    if (jk == "") {
	        alert("Gender must be filled out");
	        $( "#jenis_kelamin" ).focus();
	        return false;
	    } else if (status == "") {

	    	alert("Marital status must be filled out");
	        $( "#status" ).focus();
	        return false;

	    } else if (edu_level == "") {

	    	alert("Education Level must be filled out");
	        document.getElementsByName("id_tingkat_pendidikan").focus();
	        return false;

	    } else if (institusi == "") {

	    	alert("Institusi must be filled out");
	        $( "#id_institusi" ).focus();
	        return false;

	    } else if (major == "") {

	    	alert("Major must be filled out");
	        $( "#id_major" ).focus();
	        return false;

	    } else if (pernah_pkl_dimedion == "") {

	    	alert("Confirmation practical must be filled out");
	        document.getElementsByName("pernah_pkl_dimedion").focus();
	        return false;

	    } else if (pernah_psychotest_dimedion == "") {

	    	alert("Confirmation followed the psychotest must be filled out");
	        document.getElementsByName("pernah_pkl_dimedion").focus();
	        return false;

	    }

	    if (document.getElementById('Profesi').checked || document.getElementById('S2').checked) {

	    	if(edu_level_more == "") {

	    		alert("More Education Level must be filled out");
		        document.getElementsByName("id_tingkat_pendidikan_more").focus();
		        return false;

	    	} else if (institusi_more == "") {

	    		alert("More Institusi must be filled out");
		        document.getElementsByName("id_institusi_more").focus();
		        return false;

	    	} else if (id_major_more == "") {

	    		alert("More Major must be filled out");
		        document.getElementsByName("id_major_more").focus();
		        return false;

	    	}

		}
	}
