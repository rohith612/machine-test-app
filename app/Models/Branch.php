<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Branch extends Eloquent
{
    // use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'branches';
    
    protected $fillable = [
        'location', 'merchant_id'
    ];

}
