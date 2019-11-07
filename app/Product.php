<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $fillable = ['code_sku','name','description','hs_code_bd','hs_code','photo','unit','net_weight','gross_weight','cbm','product_cost','packing_cost','cash_incentive'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
