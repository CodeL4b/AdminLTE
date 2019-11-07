<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyerBank extends Model
{
	protected $fillable = ['name','swift_code','branch_add','other_info'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
