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
                var queryString;
                function generateSelectBox(data){
                    var label = "<label for=" + data.attribute + ">" + data.attribute + " : &nbsp&nbsp</label>";
                    var select= "<select  id=" + data.attribute + 
                                        " name=" + data.attribute + 
                                        " placeholder='Select'" + 
                                        " onchange='itemClickedFrom(this.id)'>";
                    select += "<option value='' selected>Select</option>";
                    for (var i = 0; i < data.values.length; i++) {
                        select += "<option value='" + data.values[i] + "'>" + data.values[i] + "</option>";
                    }
                    select += "</select>"
                    return '<div id=attr_' + data.attribute + '>' + label + select + "<br/>" + '</div>';
                }
                function submitSelectForm(){
                    $.post("{{route('home.savevariation',$product_id )}}", {query:queryString,
                        _token : $('input[name=_token]').val()}, function(html) {

                            $('#order-box').html(html);
                        });
                }
                function itemClickedFrom(select_id){
                    var index = $("div#attr_" + select_id).index();
                    $('order-box').html("");
                    $("div#select_group div:gt("+index+")").each(function(){
                        $(this).remove();
                    });
                    if($("div#attr_" + select_id).children('select').val()=="")
                        return;

                    queryString = 'product_id=' + {{$product_id}};
                    queryString += '&attribute_set_count=' + (index+1) + '&';
                    $("div#attr_" + select_id).prevAll().andSelf().each(function(item){
                        var i = $(this).index();
                        queryString += "attribute" + (i+1) + "=" + $(this).children('select').attr('id') + "&";
                        queryString += "attribute" + (i+1) + "_value=" + $(this).children('select').val();
                        if(i != index)
                            queryString += "&";
                    });

                    $.post("{{route('home.getnextattr')}}", {
                        query: queryString,
                        _token : $('input[name=_token]').val()
                        }, function(data) {
                            console.log(data);
                             
                            if(data != "There are no variations with the information that was provided")
                            {
                                var result = JSON.parse(data);
                                if(result.variation)
                                    $("#select_group").append('<div><input type="button" id="saveVriationBtn" value="Save" class="btn btn-primary" onclick="submitSelectForm()"></div>');
                                else
                                    $("#select_group").append(generateSelectBox(result));

                            }
                            else
                                alert(data);
                    });

                }
                $(document).ready(function(){
                str = '<form action="{{route('home.savevariation',$product_id )}}" method="post" id="selectForm">';
                    str += '{{ csrf_field() }}';
                    str += '<div id="select_group">';
                    first_variation = <?php echo ($first_variation) ?>;
                    str += generateSelectBox(first_variation);
                    str += '</div>';
                    str = str + '<br/>';
                    str = str + '</form>';
                    $('#variation-box').append(str);
                });
                </script>
            </div>
        </div>
        <div class="col-md-5" id="order-box">
        </div>
    </div>
</div>
@endsection
