<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'orders';
    protected $fillable = array(
        'product_id',
        'company_id',
        'attributes',
        'sku',
        'price'
    );

    public $timestamps = false;

}