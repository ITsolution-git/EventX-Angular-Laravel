@extends('layouts.layout')
@section('content')
<div class="col-md-12">
<div class="container-">
  <div class="row">
        <div class="col-md-12" id="form-cust-info">
          <table class="table">
             <tbody>
               <h4 class="modal-title"><i class="fa fa-user"></i>  Billing Information</h4>
                @foreach($selected_customer as $cust)
                <tr>
                  <td>Customer Name</td>
                  <td>{{$cust->FirstName}} {{$cust->LastName}}</td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td>{{$cust->Address}} </td>
                </tr>
                <tr>
                  <td>Telephone</td>
                  <td>{{$cust->HomePhone}} </td>
                </tr>
                <tr>
                  <td>Email Address</td>
                  <td>{{$cust->Email}} </td>
                </tr>
              </tbody>
            </table>
          </div>
          <input type="hidden" value="{{$cust->FirstName}}"  id="FirstName" />
          <input type="hidden" value="{{$cust->LastName}}"   id="LastName" />
          <input type="hidden" value="{{$cust->Address}}"    id="Address" />
          <input type="hidden" value="{{$cust->City}}"       id="City" />
          <input type="hidden" value="{{$cust->State}}"      id="State" />
          <input type="hidden" value="{{$cust->Zipcode}}"    id="Zipcode" />
          <input type="hidden" value="{{$cust->HomePhone}}"  id="HomePhone" />
          <input type="hidden" value="{{$cust->Email}}"      id="Email" />
          <input type="hidden" value="{{$cust->CustomerId}}" id="customer_id" />
          
          @endforeach
       </div>
          <div class="modal-header">
            <h4 class="modal-title" style="display:inline-block;margin-right:60px;"><i class="fa fa-user"></i>  Shipping Information</h4>
              <label style="display:inline-block;"><input type="checkbox" id="check-address" value=""> <span style="color:red;"> Same as billing information</span></label>
                 </div>
                  <div class="modal-body">
                  <form  id="shipping-info-form" name="add-shipping-information">
                   <div class="row">
                        <div class="form-group col-lg-6">
                             <div class="input-group">
                             <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                             <input type="text" name="fname" id="fname"   class="form-control" placeholder="First Name" value="" />
                             <input type="hidden" value="{{ csrf_token() }}"  id="token" />
                             </div>
                             <span class="help-block" id="error"></span>
                        </div>
                        <div class="form-group col-lg-6">
                             <div class="input-group">
                             <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                             <input name="lname" id="lname" type="text" class="form-control" placeholder="Last Name">
                             </div>
                             <span class="help-block" id="error"></span>
                        </div>
                     </div>
                      <div class="form-group">
                           <div class="input-group">
                           <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                           <input name="addrs" id="addrs" type="text" class="form-control" placeholder="Address Line">
                           </div>
                           <span class="help-block" id="error"></span>
                      </div>
                      <div class="row">
                           <div class="form-group col-lg-4">
                                <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
                                <input name="city_name" id="city_name"  type="text" class="form-control" placeholder="City">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-4">
                                <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
                                <input name="state_name" id="state_name" type="text" class="form-control" placeholder="State">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-4">
                                <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
                                <input name="zip_code" type="text" id="zip_code" class="form-control" placeholder="Zip Code">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                     </div>
                     <div class="form-group">
                          <div class="input-group">
                          <div class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></div>
                          <input name="ph" type="text" id="ph" class="form-control" placeholder="Phone Number">
                          </div>
                          <span class="help-block" id="error"></span>
                     </div>
                     <div class="form-group">
                          <div class="input-group">
                          <div class="input-group-addon"><span class="glyphicon glyphicon-send"></span></div>
                          <input name="email" type="text" id="email_address" class="form-control" placeholder="Email Address">
                          </div>
                          <span class="help-block" id="error"></span>
                     </div>
                    <div class="modal-footer">
                         <button type="submit" id="submit-billing-information" class="btn btn-info">
                         <span class="glyphicon glyphicon-log-in"></span> Select
                         </button>
                    </div>
                  </form>
                </div>
             </div>
       </div>
@endsection
@section('jsfile')
  <script src="/js/search.js"></script>
  <script src="/js/shipping-billing-address.js"></script>
@endsection
