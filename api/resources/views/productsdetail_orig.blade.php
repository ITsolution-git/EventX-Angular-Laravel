@extends('layouts.app')
@section('stylesheet')
<link href="{{ asset('/css/products.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row" style="margin-top:0px;padding:0">
        <div class="col-md-3">
            <div id="category-prod">
                @foreach($product as $products)
                <div class="col-md-6">
                    <a id="show-var"  href="{{route('home.showproductsdetail', array('id'=>$products->group_id, 'product_id'=>$products->id)) }}">
                        <img src="{{$products->image_url}}"  style="height:150px;width:150px;"  />
                        <span>{{$products->name}}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div id="variation-box">
                <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
                <script type='text/javascript'>
                $(document).ready(function(){
                str = '<form action="{{route('home.savevariation',$product_id )}}" method="post" id="selectForm">';
                    str += '{{ csrf_field() }}';
                    arr = <?php echo ($variations) ?>;
                    $.each(arr, function(i, v){
                        pid = Object.keys(v)[0];
                        properties = Object.keys(v[pid]);
                        product = v[pid];

                        str = str + '<h4>Product: '+"<?php echo ($currentProduct->name)?>"+'</h4><hr />';
                        $.each(properties, function(ii, vv){
                            str = str + '<b> Choose '+vv+'</b>';
                            str = str + '<select name="' + vv + '">';
                                str = str + '<option value="">Please Select</option>';
                                $.each(product[vv], function(iii, vvv){
                                    str = str + '<option value="'+vvv+'">'+vvv+'</option>';
                                });
                            str = str + '</select><br />';
                        });
                    });
                    str = str + '<br/> <input type="button" id="saveVriationBtn" value="Save" class="btn btn-primary">';
                    str = str + '</form>';
                    $('#variation-box').append(str);
                    $("#saveVriationBtn").click(function(){
                    $.post("{{route('home.savevariation',$product_id )}}", $("#selectForm").serialize(), function(html) {

                            $('#order-box').html(html);
                        });
                    })
                });
                </script>
            </div>
        </div>
        <div class="col-md-5" id="order-box">
        </div>
    </div>
</div>
@endsection
