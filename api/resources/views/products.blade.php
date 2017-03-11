@extends('layouts.app')
@section('stylesheet')
  <link href="{{ asset('/css/products.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row" style="margin-top:0px;padding:0">
        <div class="col-md-12">
             <div id="category">
               <h4><b>PRODUCTS</b></h4><hr />
                    @foreach($product as $products)
                      <div class="col-md-3">
                        <a id="show-var"  href="{{route('home.showproductsdetail', array('id'=>$products->group_id, 'product_id'=>$products->id)) }}">
                          <img src="{{$products->image_url}}"  />
                          <span>{{$products->name}}</span>
                        </a>
                      </div>
                    @endforeach
              </div>
            </div>
        </div>
    </div>
@endsection
