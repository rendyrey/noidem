$(function(){
    $( ".justNumber" ).keypress(function(evt) {
        var charCode = (evt.which) ? evt.which : evt.charCode;
        var value = this.value;
        var dotcontains = value.indexOf(".") != -1;

        if (dotcontains)
        if (charCode == 46) return false;

        if (charCode == 46) return true;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    });
});