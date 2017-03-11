<?php

namespace HttpClient\Http\Controllers;

use Illuminate\Http\Request;
use HttpClient\Http\Requests;
use Illuminate\Support\Facades\Input;
//use HttpClient\Order;
use HttpClient\Ordernumber;
use HttpClient\Product;
use HttpClient\Customer;
use HttpClient\Order;
use HttpClient\miscellaneous_items;
use Session;

class OrdersController extends ClientController
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');

  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */

  public function setOrderId(Request $request){

      $order_num=  Ordernumber::all();
      $newId = new Ordernumber;
      if (count($order_num)){
      $order_last=$order_num->sortByDesc('order_number')->pluck('order_number');
      $order_id =   $order_last[0]+1;
      $newId->order_number = $order_id;
       } else
         {
          $order_id = '1001';
          $newId->order_number = $order_id;
         }
      //  echo $newId;
      $newId->save();
      $request->session()->forget('order_id');
      $request->session()->put('order_id', $order_id);
      return redirect()->route('home');
  }

  public function selectOrderId(Request $request,$order_id){

      $request->session()->forget('order_id');
      $request->session()->put('order_id', $order_id);
      return redirect()->route('home');
  }


    public function show(Request $request, $order_id){

      $orderDetails = Product::where('order_num', Session::get('order_id'))->get();
      $total_orderitems=0;

      $miscitems = miscellaneous_items::where('order_number', Session::get('order_id'))->get();
      $total=0;

      //If there are no items in the card disable the buttons on the summary page
      $button='';
      if(!count($orderDetails) && !count($miscitems)){
        $button = 'disabled';
      } else {
        $button='';
      }
      //Check to see if an order is present, if not no items can be added
      $oid = $request->session()->get('order_id');
        if(!isset($oid)){
          $miscButton = 'disabled';
        } else{
          $miscButton='enable';
        }


      foreach ($miscitems as $item){
        $total +=($item->retail_price*$item->quantity);
      }
      return view('summary.show_summary')->with('orderDetails',$orderDetails )
      ->with('miscitems',$miscitems)->with('order_total',$total)->with('button',"$button")
      ->with('miscbutton',$miscButton);
      }

      public function searchOrders($search_by, $search_value){
        $orders=Ordernumber::where('order_number',$search_value)->get();
        if ($orders) {
        //$orders=$order_list->orders;
        return view('partials/search_result', compact('orders'));
      } else {
        return view('partials/search_result_null',compact('orders'));
      }
        //return "the search-by value is ". $search_by ." and the search value is ".$search_value;
      }

      //read customer info from LMS via an API
      public function findCustomer($v1, $v2, $company_id){
        if($v1=='email')
         {
           $customer = Customer::where('email', $v2)->get();
           //echo "the email is " .$v1;
         } elseif($v1=='phone') {
           $customer = Customer::where('telephone', $v2)->get();
           //echo "The phone number is ". $v1;
         } else {
           $customer = $this->obtainCustomerInformationByLeadid($v2,$company_id);
         }
          if ($customer=="Data not found."){
            return '<div class="alert alert-danger alert-dismissable">Sorry, there is no customer information present for the entered search criteria.</div>';
          } else {
            return view('partials/find_customer', ['customer'=>$customer,'lead_id'=>$v2]);
          }
      }

      //select customer from LMS search output to create an order
      public function selectCustomer($lead_id, $company_id){

          $selected_customer = $this->obtainCustomerInformationByLeadid($lead_id, $company_id);
          return view('partials/selected_customer',['selected_customer'=>$selected_customer, 'lead_id'=>$lead_id]);
        //  echo $selected_customer;
      }

      //add shipping information to the customer selected
      public function addShippingInformation(Request $request){
        $customer = new Customer;
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->address_1 = $request->input('address_1');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->zip = $request->input('zip');
        $customer->email = $request->input('email');
        $customer->telephone = $request->input('phone');
        $customer->lms_customer_id = $request->input('customer_id');

        if($customer->save()){
            $order_id = new Ordernumber;
            $order_id->lms_customer_id = $request->input('customer_id');
            $order_id->save();
            return "Cutsomer information saved successfully";

            // $request->session()->forget('order_id');
            // $request->session()->put('order_id', $order_id);
            // return redirect()->route('home')->with('message', 'Customer information added successfully. You can now create an sales order.');

         } else{
          return "Oops!! Something went wrong";
         }
      }

      public function addCustomerToOrder(Request $r, $cust_id, $order_id){
        $order = new Order;
        $order->customer_id = $cust_id;
        $order->order_number = $order_id;
        if($order->save())
          {
            return "Customer information been added to the order";
            } else{
              return "Some Error!";
          }
      }

      public function isCutomerInfoPresent($order_id){
        $customer_id = Order::where('order_number',$order_id)->get()->first()->customer_id;
        if(count($customer_id)>0){
        $customer_info= Customer::find($customer_id);
          return view('partials.customer_information', compact('customer_info'));
           //return "Customer information is present... ";
           //var_dump($customer_info);
         } else
          {
            return "Customer information is not present";
         } }



         public function addMiscItems(Request $request){

           $misc_item = new miscellaneous_items;
           $misc_item->item = $request->input('item');
           $misc_item->order_number = $request->input('order_id');
           $misc_item->description = $request->input('description');
           $misc_item->uom = $request->input('uom');
           $misc_item->quantity = $request->input('quantity');
           $misc_item->vendor = $request->input('vendor');
           $misc_item->material_cost = $request->input('material_cost');
           $misc_item->labor_cost = $request->input('labor_cost');
           $misc_item->retail_price = $request->input('retail_price');
           $misc_item->approved_by = $request->input('approved_by');

           if($misc_item->save()){
             return "miscellaneous item successfully added";
            } else{
             return "Oops!! Something went wrong";
            }
         }

}//final close bracket
