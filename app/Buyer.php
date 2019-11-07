<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{

	protected $fillable = ['business_name','office_add','factory_add','phone_no','fax_no','email','contact_person'];
    
    public function addInfo()
    {
        return $this->hasMany('App\AddInfo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
