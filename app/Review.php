<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'product_id',
        'rating',
        'author',
        'body',
    ];

    public function products() {
        return $this->belongsTo('App\Product');
    }
}
