<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsProperty extends Model
{
    protected $fillable=['pro_id','size','color','p_price'];
}
