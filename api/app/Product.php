<?php

namespace HttpClient;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'rmd_products';
    protected $fillable = array(
        'product_id',
        'order_num',
        'company_id',
        'attributes',
        'sku',
        'price'
    );

    public $timestamps = true;

    public function products()
  {
    return $this->belongsTo('HttpClient\Ordernumber');
  }


}
