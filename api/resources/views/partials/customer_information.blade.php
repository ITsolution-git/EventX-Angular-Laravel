<?php
  if(count($customer_info)>0){ ?>
<div id="customer-order-info">
    <div class="col-md-5 well">
      <div class="col-md-12">
        <table class="table">
          <thead class="thead-default">
            <tr>
              <th colspan="5">Customer Information</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><b>Name: </b></td>
              <td colspan="4">{{$customer_info->first_name}} {{$customer_info->last_name}}</td>
            </tr>
            <tr>
              <td><b>Address: </b></td>
              <td colspan="4">{{$customer_info->address_1}} {{$customer_info->address_2}}</td>
            </tr>
            <tr>
              <td><b>City, State, Zip: </b></td>
              <td colspan="4">{{$customer_info->city}}, {{$customer_info->state}} {{$customer_info->last_zip}}</td>
            </tr>
            <tr>
              <td><b>Phone Number: </b></td>
              <td colspan="4">{{$customer_info->telephone}} </td>
            </tr>
            <tr>
              <td><b>Email Address: </b></td>
              <td colspan="4">{{$customer_info->email}}</td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
</div>
 <?php  } else {
   "No customer information associated with this order.";
 }
