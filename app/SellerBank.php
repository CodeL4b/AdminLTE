<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerBank extends Model
{
	protected $fillable = ['acc_name','acc_num','name','branch','swift_code','branch_add','bin_num','currency','email','phone_no','rm_name','rm_mobile_num'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
