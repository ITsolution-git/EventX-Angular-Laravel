@extends('layouts.app')
@section('jsfile')
  <script src="/js/show-hide.js"></script>
  <script src="/js/search-customer.js"></script>
  <script src="/js/form_validation_misc_items.js"></script>
@endsection

@section('summary-customer-information')
<div class="container">
  <div class="col-md-12">
    <div class="row" style="margin-top:0px;">
      <div class="col-md-6">
        <div class="btn-group" role="group" aria-label="First group">
        <form>
          <input type="hidden" value="{{Session::get('order_id')}}" name="order_id" id="order_id" />
          <input type="hidden" value="{{ csrf_token() }}" name="token" id="token" />
          <button type="submit" class="btn btn-primary" class="showCustDetails" id="customerdetailsbtn">Customer Information</button>
          <button type="button" class="btn btn-primary" id="comments-btn">Comments</button>
        </form>
        </div>
      </div>
   </div>
</div>
</div>
  <div id="search-customer-info" style="margin-top: 10px; display: block;">
  <div class="container">
    <div class="col-md-12">
     <div class="row">
       <div class="col-md-12">
        <div id="show-search-result"></div>
        <div id="customer-added"></div>
        <div id="order-customer-info"></div>
      </div>
     </div>
   </div>
  </div>
  </div>
<br>
@endsection

@section('summary-comments-section')
  <div id="comments">
    <div class="container">
      <div class="col-md-6">
        <div class="row- well-">
          <h4 class="dark-grey">Lead ID/Comments</h4><hr />
          <div class="col-md-6">
            <form>
             <div class="form-group">
               <label for="lead-id">Lead ID</label>
               <input type="text" class="form-control" id="summary-lead-id" aria-describedby="emailHelp" placeholder="Lead ID">
              </div>
              <div class="form-group">
               <label for="exampleTextarea">Comments</label>
               <textarea class="form-control" id="summary-comments" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              </form>
         </div>
       </div>
      </div>
      </div>
    </div>
  <br>
@endsection
@section('summary-review-order')

<div class="container">
  <div class="col-md-10">
    <div class="row">
      <?php
          if($button == 'disabled'){
            echo '<div class="alert alert-success alert-dismissable">There are currently no items added to this order</div>';
          } else {

          }
      ?>
      <h4 class="dark-grey">Order Details</h4><hr />
      <div class="btn-group btn pull-right" role="group">
        <button type="button" class="btn btn-primary" style="margin-right:10px;" id="show-all-details">Show/Hide Details</button>
      </div>
    	<form action="" method="post" id="cart">

        <table class="table table-bordered">
          <tbody>

            <?php $i = 1; ?>
            @foreach($orderDetails as $order)
            <tr>
               <th colspan="8" bgcolor="#f5f5f5">Rootcat</th>
            </tr>
            <tr>
              <td width="3%" align="center">{{$i++}}.</td>
              <td onclick="" class="product_name" width="37%">SKU: {{$order->sku}}</td>
              <td style="min-width: 200px" width="25%" align="right">
                <label class="slf">Unit Price: <input name="fslf_13" id="fslf_13" value="20" maxlength="4" onchange="" type="text" readonly></label>
              </td>
                <td id="uom_13" width="8%" align="right">EA</td>
                <td width="8%"><input name="qty_13" id="qty_13" value="1" size="3" maxlength="4" class="qty" onchange="" type="text"></td>
                <td width="5%" align="center">
                      <a href="" class="btn btn-info btn-circle" data-toggle="tooltip" data-placement="bottom" title="Update the quantity"><i class="glyphicon glyphicon-ok"></i></a>
                </td>
                <td width="5%" align="center">
                  <a href="" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="bottom" title="Delete Item"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
                <td width="17%" align="right">{{$order->price}}</td>
              </tr>
              <tr class="order_details" class="detailed_info" style="display: table-row;">
                <td colspan="8">
                  <ul class="product_desc">
                    <li style="width:28%;"><b class="upper">{{$order->attributes}}</li>
                  </ul>
                </td>
              </tr>
            @endforeach

            <?php if($miscitems) {?>
              @foreach($miscitems as $misc)
              <tr>
                 <th colspan="8" bgcolor="#f5f5f5">Miscellaneous Item: {{$misc->item}}</th>
              </tr>
              <tr>
                <td width="3%" align="center">{{$i++}}.</td>
                <td onclick="" class="product_name" width="37%">Item Name: {{$misc->item}}</td>
                <td style="min-width: 200px" width="25%" align="right">
                  <label class="slf">Unit Price: <input name="fslf_13" id="fslf_13" value="{{$misc->retail_price}}" maxlength="4" onchange="" type="text" readonly></label>
                </td>
                  <td id="uom_13" width="8%" align="right">{{$misc->uom}}</td>
                  <td width="8%"><input name="qty_13" id="qty_13" value="{{$misc->quantity}}" size="3" maxlength="4" class="qty" onchange="" type="text"></td>
                  <td width="5%" align="center">
                    <a href="" class="btn btn-info btn-circle" data-toggle="tooltip" data-placement="bottom" title="Update the quantity"><i class="glyphicon glyphicon-ok"></i></a>
                  </td>
                  <td width="5%" align="center">
                    <a href="" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="bottom" title="Delete Item"><i class="glyphicon glyphicon-remove"></i></a>
                  </td>
                  <td width="17%" align="right">{{$misc->retail_price * $misc->quantity}}</td>
                </tr>
                <tr class="order_details" class="detailed_info" style="display: table-row;">
                  <td colspan="8">
                    <ul class="product_desc">
                      <li style="width:28%;"><b class="upper">{{$misc->description}}</li>
                    </ul>
                  </td>
                </tr>
            @endforeach

          <?php
              } else
                 {} ?>

         <tr bgcolor="#f5f5f5">
           <td colspan="7" style="padding:10px; font-weight:bold;" align="right"> Grand Total </td>
           <td align="right">${{$order_total}}<label id="grand_total"></label> </td>
         </tr>
         <tr>
           <td colspan="7" style="padding:10px; font-weight:bold;" align="right">Promo
             <input maxlength="5" size="5" name="promo_discount" id="promo_discount" value="10" style="width:32px; border:0; text-align:right;" readonly="readonly" type="text">% :
           </td>
             <td colspan="1" align="right"> $<label id="promo_amt">{{0.1*$order_total}}</label> </td>
           </tr>
           <tr>
             <td colspan="7" style="padding:10px; font-weight:bold;" align="right">Adnl. Discount
               <input maxlength="5" size="5" name="adnl_promo_discount" id="adnl_promo_discount" value="0" style="width:22px; text-align:center;" type="text"> % : </td>
               <td colspan="1" align="right"> $<label id="adnl_promo_amt">0.00</label> </td>
             </tr>
             <tr style="display:none;">
               <td colspan="7" style="padding:10px; font-weight:bold;" align="right"> Administrative Fees : </td>
               <td colspan="1" align="right"> $<input id="admin_fee" maxlength="6" size="4" value="400.00"></td>
             </tr>
             <tr>
               <td colspan="7" style="padding:10px; font-weight:bold;" align="right"> Lead Test Fee <input name="leadtest_active" id="leadtest_active" value="0.00" type="checkbox"> : </td>
               <td colspan="1" align="right"> $<label id="leadtest_fee">0.00</label></td>
             </tr>
             <tr>
               <td colspan="7" style="padding:10px; font-weight:bold;" align="right"> Lead Free Work Practice
                 <input name="lfwp_active" id="lfwp_active" value="500.00" type="checkbox"> : </td>
                 <td colspan="1" align="right"> $<label id="lfwp_amt">0.00</label></td>
               </tr>
               <tr>
                 <td colspan="7" style="padding:10px; font-weight:bold;" align="right"> General Constructions : </td>
                 <td colspan="1" align="right"> $<input id="gen_const" maxlength="7" size="4" style="text-align:right;" value="0.00" type="text"></td>
               </tr>
               <tr>
                 <td colspan="7" style="padding:10px; font-weight:bold;" align="right"> Permit <label id="permit_percent" data-percent="4.00" style="display:none;">4.00</label>
                   <input name="permitfee_active" id="permitfee_active" checked="checked" type="checkbox">
                   <label id="permit_maxamt" style="display:none;">00.00</label> : </td>
                   <td colspan="1" align="right"> $<label id="permit_amt">00.00</label></td>
                 </tr>
                 <tr bgcolor="#f5f5f5"><td colspan="7" style="padding:10px; font-weight:bold;" align="right"> Net Amount </td>
                   <td colspan="1" align="right"> $<label id="net_amt">{{$order_total-(0.1*$order_total)}}</label></td>
                 </tr>
               </tbody>
             </table>
           </form>
      </div>
   </div>
</div>
@endsection
@section('summary-action-block')
  <div class="container">
    <div class="col-md-12">
        <div class="row">
          <div class="btn-group" role="group">
            <button type="submit" id="add_misc" {{$miscbutton}}  href="#fb-addmiscitems-form" class="btn btn-primary" style="margin-right:10px;">Add Miscellaneous item</button>
            <button type="button" id="saveorder" {{$button}} href="#loaderImage" class="btn btn-primary hide-button" style="margin-right:10px;">save order</button>
            <button type="button" id="placeorder" {{$button}}  class="btn btn-primary" style="margin-right:10px;">submit order</button>
            <button type="button" id="placeorder" {{$button}}  class="btn btn-primary" style="margin-right:10px;">Save as PDF</button>
            <button type="button" id="placeorder" {{$button}}  class="btn btn-primary" style="margin-right:10px;">Email order to customer</button>
          </div>
     </div>
  </div>
</div>
@endsection

@section('miscellaneous-items-content')
<div id="fb-addmiscitems-form" style="display:none;">
                <div class="modal-header">
                  <h4 class="modal-title">Add Miscellaneous Items</h4>
                </div>
                <div class="modal-body">
                <form id="miscellaneous_items_form" name="miscellaneous_items" autocomplete="off">
                  <div class="row">
                           <div class="form-group col-lg-12">
                                <div class="input-group">
                                  <div class="input-group-addon"></div>
                                  <input name="item" id="item"  type="text" class="form-control" placeholder="Item Name">
                                  <input type="hidden" value="{{ csrf_token() }}"  id="token" />
                                  <input type="hidden" value="{{Session::get('order_id')}}" name="order_id" id="order_id" />
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-12">
                                <div class="input-group">
                                  <div class="input-group-addon"></div>
                                  <input name="description" id="description"  type="text" class="form-control" placeholder="Item Description">
                                  <input type="hidden" value="{{ csrf_token() }}"  id="token" />
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-6">
                                <div class="input-group">
                                  <div class="input-group-addon"></div>
                                    <select class="form-control" name="uom" id="uom">
                                      <option value="0" selected="selected">UOM</option>
                                      <option value="EA">EA</option>
                                      <option value="SF">SF</option>
                                      <option value="LF">LF</option>
                                      <option value="LF">CA</option>
                                      <option value="LF">Bag</option>
                                </select>
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-6">
                                <div class="input-group">
                                  <div class="input-group-addon"></div>
                                  <input name="quantity" id="quantity"  type="text" class="form-control" placeholder="quantity">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-6">
                                <div class="input-group">
                                  <div class="input-group-addon"></div>
                                  <input name="vendor" id="vendor"  type="text" class="form-control" placeholder="Vendor">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-6">
                                <div class="input-group">
                                  <div class="input-group-addon"></div>
                                  <input name="material_cost" id="material_cost"  type="text" class="form-control" placeholder="Material Cost">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-6">
                                <div class="input-group">
                                  <div class="input-group-addon"></div>
                                  <input name="labor_cost" id="labor_cost"  type="text" class="form-control" placeholder="Labor Cost">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-6">
                                <div class="input-group">
                                  <div class="input-group-addon"></div>
                                  <input name="retail_price" id="retail_price"  type="text" class="form-control" placeholder="Retail Price">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="form-group col-lg-12">
                                <div class="input-group">
                                  <div class="input-group-addon"></div>
                                  <input name="approved_by" id="approved_by"  type="text" class="form-control" placeholder="Approved By">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>
                           <div class="modal-footer">
                                <button type="submit" class="btn btn-info">
                                <span class="glyphicon glyphicon-log-in"></span>Submit
                                </button>
                           </div>
                       </div>
                  </form>
              </div>
            </div>
            <div class="col-md-3" id="loaderImage" style="display:none;align:center">
              <img align="center" src='/img/ajax-loader.gif' width="80" height="80" />
              <span id="">Saving...</span>
            </div>
@endsection
