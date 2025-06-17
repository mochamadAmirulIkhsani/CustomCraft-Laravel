<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Banner extends Model
{
    protected $fillable = [
        'image',
        'image2',
        'image3',
        'image4',
    ];

}
