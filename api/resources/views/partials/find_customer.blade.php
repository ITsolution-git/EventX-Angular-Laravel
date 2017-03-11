@extends('layouts.layout')
@section('jsfile')
  <script src="/js/search.js"></script>
@endsection
@section('content')
<div class="col-md-12">
<div class="container-">
  <div class="row">
      <?php if (count($customer)>0){ ?>
        <div class="col-md-12" id="form-cust-info">
          <table class="table">
            <form>
            <thead class="thead-default">
              <tr>
                  <th>S No</th>
                  <th>Customer Name</th>
                  <th>Address</th>
                  <th>Telephone</th>
                  <th>Appointment</th>
                  <th>Notes</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
          <?php  foreach($customer as $cust){ $i=1;?>
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$cust->FirstName}} {{$cust->LastName}}</td>
                  <td>{{$cust->Address}} </td>
                  <td>{{$cust->HomePhone}}</td>
                  <td>{{$cust->AppointmentDate}} {{$cust->AppointmentTime}}</td>
                  <td><i class="fa fa-list" style="color:orange"></i></td>
                  <input type="hidden" value="" name="order_id" id="order_id" />
                  <input type="hidden" id="token" value="{{ csrf_token() }}">
                  <td><button type="submit" data-fancybox-type="ajax" id="customer_id" value="{{$lead_id}}" class="btn btn-primary btn-round-xs btn-xs customer">Select</button></td>
              </tr>
              </tbody>
             </form>
            </table>
          </div>
          <?php  } }

          else { ?>
       <div id="cust-info">
        <div class="alert alert-danger alert-dismissable">Sorry, there is no customer information present for the entered search criteria.</div>
      <!--  <button type="submit" id="fb-add-newcustomer" class="btn btn-secondary" href="#fb-newcustomer-form" data-toggle="modal-" data-target="#myModal-">Add New Customer</button> -->
       </div>

    <?php
       }
         ?>
    </div>
        <div id="fb-newcustomer-form" style="display:none;">
              <form id="form" name="add_customer" autocomplete="off">
                 <div class="modal-header">
                  <h3 class="modal-title"><i class="fa fa-user"></i> New Customer</h3>
                 </div>
                  <div class="modal-body">
                   <div class="row">
                        <div class="form-group col-lg-6">
                             <div class="input-group">
                             <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                             <input name="first_name" id="first_name"  type="text" class="form-control" placeholder="First Name">
                             <input type="hidden" value="{{ csrf_token() }}"  id="token" />
                             </div>
                             <span class="help-block" id="error"></span>
                        </div>
                        <div class="form-group col-lg-6">
                             <div class="input-group">
                             <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                             <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Last Name">
                             </div>
                             <span class="help-block" id="error"></span>
                        </div>
                  </div>
                      <div class="form-group">
                           <div class="input-group">
                           <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                           <input name="address_1" id="address_1"type="text" class="form-control" placeholder="Address Line 1">
                           </div>
                           <span class="help-block" id="error"></span>
                      </div>
                      <div class="form-group">
                           <div class="input-group">
                           <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                           <input name="address_2" id="address_2" type="text" class="form-control" placeholder="Address Line 2">
                           </div>
                           <span class="help-block" id="error"></span>
                      </div>
                      <div class="row">
                           <div class="form-group col-lg-4">
                                <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
                                <input name="city" id="city"  type="text" class="form-control" placeholder="City">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-4">
                                <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
                                <input name="state" id="state" type="text" class="form-control" placeholder="State">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-4">
                                <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
                                <input name="zip" type="text" id="zip" class="form-control" placeholder="Zip Code">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                     </div>
                     <div class="form-group">
                          <div class="input-group">
                          <div class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></div>
                          <input name="phone" type="text" id="phone" class="form-control" placeholder="Phone Number">
                          </div>
                          <span class="help-block" id="error"></span>
                     </div>
                     <div class="form-group">
                          <div class="input-group">
                          <div class="input-group-addon"><span class="glyphicon glyphicon-send"></span></div>
                          <input name="email" type="text" id="email" class="form-control" placeholder="Email Address">
                          </div>
                          <span class="help-block" id="error"></span>
                     </div>
                    </div>
                    <div class="modal-footer">
                         <button type="submit" class="btn btn-info" id="add_cust_form">
                         <span class="glyphicon glyphicon-log-in"></span>Submit
                         </button>
                    </div>
                </form>
            </div>
       </div>
  </div>


@endsection
