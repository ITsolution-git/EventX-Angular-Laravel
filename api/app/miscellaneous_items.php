<?php

namespace HttpClient;
use Illuminate\Database\Eloquent\Model;

class miscellaneous_items extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'rdr_miscellaneous_items';
    protected $fillable = array(
      'order_number',
      'item',
      'description',
      'uom',
      'quantity',
      'vendor',
      'category',
      'material_cost',
      'labor_cost',
      'retail_cost',
      'company_id',
      'approved_by'
    );
}
