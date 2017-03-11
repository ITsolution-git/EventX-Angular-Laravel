<div class="container" style="background-color:#668;">
    <div class="row" style="margin-top:80px;padding:0">
        <div class="col-md-12">
            <div id="show-var">
            <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
            <script type='text/javascript'>
              $(document).ready(function(){

                str = '<form action="/save_some_data_to_db" method="post">';
                arr = <?php echo ($variations) ?>;
                $.each(arr, function(i, v){
                  pid = Object.keys(v)[0];
                  properties = Object.keys(v[pid]);
                  product = v[pid];

                  str = str + '<p> Product id is '+pid+'</p>';
                  $.each(properties, function(ii, vv){
                    str = str + '<p> Choose '+vv+'</p>';

                    str = str + '<select name="' + vv + '">';
                    $.each(product[vv], function(iii, vvv){
                        str = str + '<option value="'+vvv+'">'+vvv+'</option>';
                    });
                    str = str + '</select>';

                  });
                });
                str = str + '<input type="submit" value="save">';
                str = str + '</form>';
                $('#show-var').append(str);
              });
            </script>
              </div>
            </div>
        </div>
    </div>
