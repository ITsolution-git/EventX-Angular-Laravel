$(document).ready(function(){
    $('#check-address').click(function(){
        if($('input#check-address').prop("checked", true)){
            // var firstname = $('input#fname').val();
            // alert("first name is "+ firstname);
            $('#fname').val($('input#FirstName').val());
            $('#lname').val($('input#LastName').val());
            $('#addrs').val($('input#Address').val());
            $('#city_name').val($('input#City').val());
            $('#state_name').val($('input#State').val());
            $('#zip_code').val($('input#Zipcode').val());
            $('#ph').val($('input#HomePhone').val());
            $('#email_address').val($('input#Email').val());

        } else {
            //Clear on uncheck
            //$('input#first_name').val("test");

        };

    });
});
