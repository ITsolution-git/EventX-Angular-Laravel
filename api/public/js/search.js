$.ajaxSetup({
        headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } 
})

$(document).ready(function(){
  //search for existing order
  $(document).on("click",'#search-order',function(e){
      event.preventDefault();
      var search_by = $('#search-by').val();
      var search_value = $('#search-value').val();
      var token = $('#token').val();
      //alert("search by: " + search_by + " search-value: " + search_value);
      $('#show-search-result-neworder').hide();
      $('#search-customer-info').hide();

      $('#loaderImage').show();
      $.ajax({
          type: 'POST',
          url: "search/"+ search_by+ "/"+search_value,
          data: {'search_by':search_value, 'search_value':search_value, '_token':token},
          //data: $('#search-order').serialize(),
          dataType: "text",
          cache: false,
          success: function (data) {
          console.log(data);
          $('#show-search-result-existingorder').html(data).show();
          $('#loaderImage').hide();
      },
        error: function (data) {
              console.log(data);
              $('#loaderImage').hide();
              alert("Your session has timed out.");
          }
      });
    });

    //ajax script to create a new order (welcome page)
    $('#new-order-btn').on('click',function(e){
       e.preventDefault();
       $('#show-search-result-existingorder').hide();
       $('#search-customer-info').show();

      }) //end script new-order-btn

      //create new order: welcome page
      $('#search-customer-info').on("click", function(e){
          e.preventDefault();
          $('#search-option-error').hide();
          if($('#search-cust :selected').val()=='0' || $.trim($('#customer-search-criteria').val()).length==0) {
          $('#search-option-error').html('<strong><span style="color:red;">Please enter a search option</span></strong>').show();
          }
          else
            {
              $('#search-option-error').hide();
              var value_1 = $('#search-cust :selected').val();
              var value_2 = $('#customer-search-criteria').val();
              var value_3 = $('#companyId').val();
              var token = $('#token').val();
              $('#loaderImage2').show();
              //alert("search-value :"+value_1 + " search criteria: "+ value_2);
              $.ajax({
                type:'POST',
                url: "/search-customer/"+ value_1+ "/"+value_2+"/"+value_3,
                data: {'value_1':value_1, 'value_2':value_2,'value_3':value_3, '_token':token},
                success: function(data){
                   console.log(data);
                   $('#loaderImage2').hide();
                   $('#show-search-result-neworder').html(data).show();
                },
                error: function(data){
                   console.log(data);
                   alert("Your session has timed out.");
                }
              })
          }
      })

      //select customer popup
      $('.customer').on("click", function(e){
         e.preventDefault();
           var customer_id = $('#customer_id').val();
           var company_id = '4';
           var token = $('#token').val();
           $('#loaderImage2').show();
           $.ajax({
              type: "POST",
              cache: false,
              url: "/select_customer/"+customer_id + "/" + company_id,
              data: {"customer_id":customer_id,"company_id":company_id, "_token":token},
              success: function (data) {
        // on success, post (preview) returned data in fancybox
                  $('#loaderImage2').hide();
                  $.fancybox(data, {
                    // fancybox API options
                    'width':'500',
                    'height':'650',
                    'autoDimensions':false,
                    'autoSize':false
                }); // fancybox
            },
              error: function(err){
              console.log(err);
            } //
         })
      })

      $('#submit-billing-information').on("click",function(e){
        e.preventDefault();
        var billing_first_name = $('#fname').val();
        var billing_last_name =  $('#lname').val();
        var billing_address =  $('#addrs').val();
        var billing_city =  $('#city_name').val();
        var billing_state =  $('#state_name').val();
        var billing_zip =  $('#zip_code').val();
        var billing_phone =  $('#ph').val();
        var billing_email =  $('#email_address').val();
        var customer_id =  $('#customer_id').val();
        var token = $('#token').val();
        $.ajax({
          type:'post',
          url:'/add_shipping_information',
          data: {"first_name":billing_first_name,"last_name":billing_last_name,"address_1":billing_address,
                 "city":billing_city,"state":billing_state, "zip":billing_zip,"phone":billing_phone,
                 "email":billing_email,"customer_id":customer_id, "_token":token},

          success:function(data){
            console.log(data);
            alert(data);
            //following code clears the form
            $(':input','#shipping-info-form')
           .not(':button, :submit, :reset, :hidden')
           .val('')
           $.fancybox.close();
           location.reload();
          },
          error:function(msg){
            console.log(msg);
            $.fancybox.close(true);
            alert("something went wrong");
            }
        })
      })

 });//final close bracket
