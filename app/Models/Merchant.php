<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\Branch;

class Merchant extends Eloquent
{
    // use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'merchants';
    
    protected $fillable = [
        'shopname', 'email', 'mobile'
    ];


    public function branches()
    {
       return $this->hasMany('App\Models\Branch', 'merchant_id', 'id');
    }
}
