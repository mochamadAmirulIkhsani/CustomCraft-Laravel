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

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/' . $image), );
    }

    protected function image2(): Attribute
    {
        return Attribute::make(
            get: fn ($image2) => url('/storage/' . $image2), );
    }

    protected function image3(): Attribute
    {
        return Attribute::make(
            get: fn ($image3) => url('/storage/' . $image3), );
    }

    protected function image4(): Attribute
    {
        return Attribute::make(
            get: fn ($image4) => url('/storage/' . $image4), );
    }
}
