$(document).ready(function(){

  $('div#comments').hide();
  $("#comments-btn").on("click",function(){
    $('#customer-order-info').hide();
    $('.order_details').hide();
    $('#cust-info').hide();
    $('#form-cust-info').hide();
    $('div#comments').show();
  });

  $('.order_details').hide();
   $("#show-all-details").on("click",function(){
     $('div#comments').hide();
     $('#search-customer-info').hide();
     $('#customer-order-info').hide();
     $('#cust-info').hide();
    $('.order_details').slideToggle();

  });

  $('#search-customer-info').hide();
   $("#search-customer").on("click",function(){
     $('div#comments').hide();
     $('#customer-order-info').hide();
     $('.order_details').hide();
     $('#cust-info').hide();
     $('#form-cust-info').hide();
     $('#search-customer-info').show();
  });

  $('#customer-order-info').hide();
   $("#customerdetailsbtn").on("click",function(){
     $('div#comments').hide();
     $('.order_details').hide();
     $('#cust-info').hide();
     $('#form-cust-info').hide();
    $('#search-customer-info').hide();
    $('#customer-order-info').show();
  });

});
