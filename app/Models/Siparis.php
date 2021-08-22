<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siparis extends Model
{
    function getSiparis(){
        return $this->hasOne('App\Models\Sepet','urun_id','urun_id');
    }
    function getProduct(){
        return $this->hasOne('App\Models\Product','id','urun_id');
    }

    use HasFactory;
}
