<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function specs() {
        return $this->hasOne('App\Spec');
    }
}
