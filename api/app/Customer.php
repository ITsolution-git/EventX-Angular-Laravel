<?php

namespace HttpClient;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'rmd_customers';
    protected $fillable = array(
        'order_id',
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip',
        'telephone',
        'email'
    );

    public $timestamps = true;

    public function customers(){
      return $this->hasMany('HttpClient\Order');
    }
}
