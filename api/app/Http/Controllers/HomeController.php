<?php

namespace HttpClient\Http\Controllers;

use HttpClient\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use HttpClient\Product;

class HomeController extends ClientController
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('checkorderid');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index()
	{
		$root_categories = $this->obtainRootCategories();
		return view('home', ['rootcat'=>$root_categories]);

	}

	public function partialsWelcome(){
	  return view('partials.welcome');
	}

	//This function is used to pass rootcat vales to the the menu using composer view
	public function compose(View $view)
	{
		$root_categories = $this->obtainRootCategories();
		$view->with('rootcat',$root_categories);

	}

	public function getSubcategory($rootcategory_id){
	   $subcategory = $this->obtainSubCategory($rootcategory_id);
	   return view('subcategory',['subcat'=>$subcategory]);
	}

	public function getGroup($subcategory_id){
	   $group= $this->obtainGroup($subcategory_id);
	   return view('group',['group'=>$group]);
	}

	public function getProducts($group_id){
	   $product = $this->obtainProducts($group_id);
	   return view('products',['product'=>$product]);
	}


	public function getProductsDetail($group_id, $product_id){
	   $product = $this->obtainProducts($group_id);
	   $currentProduct = [];
	   foreach ($product as $key => $value) {
		 if($value->id == $product_id)
		  $currentProduct = $value;
	   }

	   $first_variation = $this->getFirstAttrSet($product_id);
	   return view('productsdetail',['product'=>$product, 'first_variation'=>$first_variation,'product_id'=>$product_id, 'currentProduct'=>$currentProduct]);

	}
// product_id=1146&attribute_set_count=3&attribute1=Color&attribute1_value=White&attribute2=Drain&attribute2_value=Left&attribute3=Height&attribute3_value=19
// product_id=1146&attribute_set_count=3&attribute1=Color&attribute1_value=White&attribute2=Drain&attribute2_value=Left&attribute3_value=19 inches&attribute3=Height
	public function getVariations($product_id){
		$variation = $this->obtainVariations($product_id);
		return view('variations',['variations'=>$variation]);
	}

	public function getNextAttribute(Request $request){
		return $this->getNextAttrSet($request->input('query'));
	}

	public function saveVariations(Request $request, $product_id){
	   // $result = $this->sendVariation($request->all(), $product_id);
		$result = $this->getNextAttrSet($request->input('query'));
	   	return view('variationresult',['result'=>json_decode($result)->variation]);
	}

	public function getCutomerInfo (){
	  $customer_info = $this->obtainCustomerInformationByLeadid($lead_id, $company_id);
	}

	public function saveOrder(Request $request){
		$order = new Product;

		$order->product_id = $request->input('product_id');
		$order->company_id = $request->input('company_id');
		$order->order_num = $request->input('order_num');
		$order->sku = $request->input('sku');
		$order->price = $request->input('price');
		$order->attributes = $request->input('attributes');
		if($order->save())
			return "Success";
		else
			return "Failed";
		print_r($order);
	}

	 //this is a test to view all the session variables
	 public function sessions(Request $request){
	 return $request->session()->all();
	 }

}
