$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $('#search-for-customer').on('click',function(e){
    event.preventDefault();
    if($('#search-cust :selected').val()=='0' || $.trim($('#customer-search-criteria').val()).length==0) {
      alert("Please enter all the search option.")
    } else
      {
        var value_1 = $('#search-cust :selected').val();
        var value_2 = $('#customer-search-criteria').val();
        var token = $('#token').val();
        //alert("search-value :"+value_1 + " search criteria: "+ value_2);
        $.ajax({
          type:'POST',
          url: "/search-customer/"+ value_1+ "/"+value_2,
          data: {'value_1':value_1, 'value_2':value_2, '_token':token},
          success: function(data){
             console.log(data);
             $('#show-search-result').html(data);
          },
          error: function(data){
             console.log(data);
             alert("Your session has timed out.");
          }
        })
    }
  });

  $('#select-customer').on('click', function(e){
     e.preventDefault();
     var customer_id = $('#customer_id').val();
     var order_id = $('#order_id').val();
     var token = $('#token').val();
     //alert("The customer id is "+customer_id+ " and order id is "+order_id );
     $.ajax({
       type:'POST',
       url:"addCustomer/"+customer_id+"/"+order_id,
       data: {'customer_id':customer_id, 'order_id':order_id,'_token':token},
       success: function(data){
         console.log(data);
         $('#show-search-result').hide();
         $('#customer-added').html(data);
       },
       error: function(data){
         console.log(data);
         alert("Your session has timed out.");
       }
     })
   }); //End select-customer   

   $('#customerdetailsbtn').on("click",function(e){
       e.preventDefault();
       var order_num = $('#order_id').val();
       var token = $('#token').val();
       //alert(token);
       $.ajax({
         type:'POST',
         url: "check_customer_present/"+order_num,
         data:{'order_num':order_num, '_token':token},
         success:function(data){
           console.log(data);
            $('#order-customer-info').html(data);
         },
         error: function(data){
           console.log(data);
           alert("Your session has timed out.");
         }
      })
   });// End customerdetailsbtn

       $('#fb-add-newcustomer').fancybox({
        'width':'500',
        'autoDimensions':false,
        'autoSize':false
         });

       $('#add_misc').fancybox({
        'width':'500',
        'height':'500',
        'autoDimensions':false,
        'autoSize':false
          });
      $('#saveorder').fancybox({
        'width':'50',
        'closeBtn':false
      });

       $('#add_misc').on('click', function(e){
           e.preventDefault();
           $('#modal-miscellaneous-items').modal({show:true});
       });

}); //final close bracket
