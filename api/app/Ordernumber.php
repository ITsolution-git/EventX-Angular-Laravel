<?php

namespace HttpClient;
use HttpClient\Product;
use Illuminate\Database\Eloquent\Model;

class Ordernumber extends Model
{
  protected $connection = 'mysql';
  protected $primaryKey = 'order_number';
  protected $table = 'rmd_ordernumber';
  protected $fillable = array(
      'order_number'
  );

  public $timestamps = true;

  public function orders(){
    return $this->hasMany('HttpClient\Product', 'order_num');
  }

}
