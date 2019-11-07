<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cnf extends Model
{
	protected $fillable = ['name','address','phone','mobile','email','contact_person','reg_no','working_port'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
