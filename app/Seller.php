<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{

	protected $fillable = ['business_name','office_add','factory_add','bin_vat_no','erc_no','irc_no','phone_no','fax_no','email','contact_person'];
	
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
