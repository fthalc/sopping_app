<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepet extends Model
{
    function getProduct(){
        return $this->hasOne('App\Models\Product','id','urun_id');
    }

    use HasFactory;
}
