<?php

namespace HttpClient;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'rmd_orders';
  protected $fillable = array(
      'order_number',
      'customer_id'
  );

  public $timestamps = true;

  public function products(){
  return $this->hasMany('HttpClient\Product');
  }
  public function customerOrder() {
    return $this->belongsTo('HttpClient\Customer', 'customer_id');
  }
}
