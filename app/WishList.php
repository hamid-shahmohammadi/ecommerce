<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table='wishlist';
    protected $fillable=['user_id','pro_id'];
}
