$('document').ready(function(){

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

   var cost_regex = /^[0-9]+(\.[0-9]{1,2})?$/;
   var quantityregex = /^[0-9][0-9]*$/;
   var dropdown_regex = /^[A-Za-z]+$/;

   $.validator.addMethod("validcost", function( value, element ) {
       return this.optional( element ) || cost_regex.test( value );
   });

   $.validator.addMethod("validqty", function( value, element ) {
       return this.optional( element ) || quantityregex.test( value );
   });

   $.validator.addMethod("dropdown", function( value, element ) {
       return this.optional( element ) || dropdown_regex.test( value );
   });


  $("form[name='miscellaneous_items']").validate({
    // Specify validation rules
    rules: {
            item: {
              required:true,
              minlength: 2
            },
            description: {
              required:true,
              minlength: 4
            },
             uom: { dropdown:true },

            quantity:{
               required:true,
               validqty:true
              },
            vendor:{
               required:true
              },
             material_cost:{
                required:true,
                validcost:true
              },
              labor_cost:{
               required:true,
               validcost:true
              },
              retail_price:{
               required:true,
               validcost:true
             },
            approved_by: {
             required: true
          }

      },
    // Specify validation error messages
    messages: {
      item: "This cannnot be blank",
      description: "This cannnot be blank",
      uom: "Please make a selection",
      quantity: "This cannnot be blank",
      vendor: "This cannnot be blank",
      material_cost: "Please enter a valid amount",
      labor_cost: "Please enter a valid amount",
      retail_price: "Please enter a valid amount",
      approved_by:"This cannnot be blank"
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
      //  form.submit();
      //  alert('ok');
        var item = $('#item').val();
        var description =  $('#description').val();
        var uom =  $('#uom').val();
        var quantity =  $('#quantity').val();
        var vendor = $('#vendor').val();
        var material_cost =  $('#material_cost').val();
        var labor_cost =  $('#labor_cost').val();
        var retail_price =  $('#retail_price').val();
        var approved_by =  $('#approved_by').val();
        var order_id =  $('#order_id').val();
        var token = $('#token').val();
        //alert(item+"/"+description+"/"+uom+"/"+quantity+"/"+vendor+"/"+material_cost+"/"+labor_cost+"/"+retail_price+"/"+approved_by)
        //alert(token);
        $.ajax({
          type:'post',
          url:'/add_misc_items',
          data: {
                 "item":item,"description":description,"uom":uom, "quantity":quantity,"vendor":vendor,
                 "material_cost":material_cost, "labor_cost":labor_cost,"retail_price":retail_price,
                 "approved_by":approved_by, "order_id":order_id, "_token":token
               },
          success:function(data){
            console.log(data);
            alert(data);
            $('#show-misc-items').html(data);
            //following code clears the form
            $(':input','#miscellaneous_items_form')
					 .not(':button, :submit, :reset, :hidden')
					 .val('')
           $.fancybox.close();
           location.reload();
          },
          error:function(msg){
            //console.log(msg);
            $('.modal').modal('hide');
            alert(msg);
            //following code clears the form
            $(':input','#miscellaneous_items_form')
					 .not(':button, :submit, :reset, :hidden')
					 .val('')
            $('.modal').modal('hide');
            }
          })
            return false;
         }
     });

});
