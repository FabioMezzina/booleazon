<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    public $timestamps = false;

    public function products() {
        return $this->belongsTo('App\Product');
    }

    protected $fillable = [
        'category',
        'genre',
        'handlebar',
        'saddle',
        'wheels',
        'tires',
        'fenders',
        'light',
        'electrical',
        'brakes',
        'gear'
     ];
}
