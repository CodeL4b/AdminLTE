<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function shipper()
    {
        return $this->hasMany('App\Shipper');
    }

    public function buyer()
    {
        return $this->hasMany('App\Buyer');
    }

    public function buyerBank()
    {
        return $this->hasMany('App\BuyerBank');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function seller()
    {
        return $this->hasMany('App\Seller');
    }

    public function sellerBank()
    {
        return $this->hasMany('App\SellerBank');
    }

    public function cnf()
    {
        return $this->hasMany('App\Cnf');
    }

}
