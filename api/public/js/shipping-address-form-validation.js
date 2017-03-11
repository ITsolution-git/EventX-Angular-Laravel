$('document').ready(function(){

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // valid email pattern
   var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   var phoneregex = /^[2-9]{1}[0-9]{9}$/;
   var zipregex = /^[0-9]{5}$/;

   $.validator.addMethod("validemail", function( value, element ) {
       return this.optional( element ) || eregex.test( value );
   });

   $.validator.addMethod("validphone", function( value, element ) {
       return this.optional( element ) || phoneregex.test( value );
   });

   $.validator.addMethod("validzip", function( value, element ) {
       return this.optional( element ) || zipregex.test( value );
   });

  $("form[name='add-shipping-information']").validate({
    // Specify validation rules
    alert('form-validation');
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
            fname: {
              required:true,
              minlength: 4
            },
            lname: {
              required:true,
              minlength: 4
            },
            addrs: {
              required:true,
              minlength: 4
            },
            email_address: {
             required: true,
             validemail: true
            },
             city_name:{
               required:true
             },
             state_name:{
               required:true
             },
             zip_code:{
               required:true,
               validzip:true
             },
            ph: {
             required: true,
             validphone: true
          },

      },
    // Specify validation error messages
    messages: {
      fname: "Please enter your firstname",
      lname: "Please enter your lastname",
      addrs: "Please enter an address",
      email_address: "Please enter a valid email address",
      ph: "Phone number should be exacty 10 digits long",
      zip_code: "5 Digit Zip Code"
    },

    errorPlacement : function(error, element) {
     $(element).closest('.form-group').find('.help-block').html(error.html());
     },
     highlight : function(element) {
     $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
     },
     unhighlight: function(element, errorClass, validClass) {
     $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
     $(element).closest('.form-group').find('.help-block').html('');
     },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
        //form.submit();
        var billing_first_name = $('#fname').val();
        var biling_last_name =  $('#lname').val();
        var billing_address =  $('#addr').val();
        var biling_city =  $('#city_name').val();
        var billing_state =  $('#state_name').val();
        var billling_zip =  $('#zip_code').val();
        var billing_phone =  $('#ph').val();
        var billing_email =  $('#email_address').val();
        var token = $('#token').val();
        //alert(first_name);
        $.ajax({
          type:'post',
          url:'/add_new_customer',
          data: {"first_name":first_name,"last_name":last_name,"address_1":address_1, "address_2":address_2,"city":city,"state":state, "zip":zip,"phone":phone, "email":email, "_token":token},
          success:function(data){
            console.log(data);
            alert(data);
            //following code clears the form
            $(':input','#form')
					 .not(':button, :submit, :reset, :hidden')
					 .val('')
            $(this).fancybox.close(true);
          },
          error:function(msg){
            console.log(msg);
            $.fancybox.close(true);
            alert("something went wrong");
            }
          })
            return false;
        }
     });

});
