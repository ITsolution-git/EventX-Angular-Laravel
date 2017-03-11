
<?php if(is_object($result)){ ?>
<form id = "orderForm" name = "orderForm" method = "post" class="form">
    {{ csrf_field() }}
    <?php
        $attributes = "";
        foreach($result->attribute_values as $key=>$value){
            $attributes .= $key." = ".$value;
            $attributes .= "\n";
        }
    ?>
    <input type="hidden" value="<?php echo ( $result->product_id )?>" name="product_id" id="product_id" />
    <input type="hidden" value="<?php echo ( $result->company_id )?>" name="company_id" id="company_id" />
    <input type="hidden" value="<?php echo Session::get('order_id')?>" name="order_num" id="order_num" />


    <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" class="form-control " disabled id="price" name="price" value="<?php echo $result->price ?>">
    </div>
    <div class="form-group">
        <label for="price">SKU:</label>
        <input type="text" class="form-control " disabled id="sku" name="sku" value="<?php echo $result->sku ?>">
    </div>
    <div class="form-group">
        <label for="price">Attributes:</label>
        <textarea type="text" class="form-control " disabled id="attributes" name="attributes" id="attributes" rows="10"><?php echo ($attributes) ?>
        </textarea>
    </div>
    <button class="btn btn-primary" id="saveOrderBtn">Add Product</button>
    <script type="text/javascript">
    $("#saveOrderBtn").click(function(e){
        e.preventDefault();
        $.post("{{route('home.saveorder')}}", {
            product_id : $('#product_id').val(),
            company_id : $('#company_id').val(),
            order_num : $('#order_num').val(),
            sku : $('#sku').val(),
            attributes : $('#attributes').val(),
            price : $('#price').val(),
            _token : $('input[name=_token]').val()
            }, function(msg) {
                alert(msg);
                location.href = "/home";
        });
    })
    </script>
</form>
<?php }else{
    echo "This product is not availalble";
} ?>
