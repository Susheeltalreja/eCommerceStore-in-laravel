<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
        protected $table = 'cart';
        protected $primaryKey = 'cart_id';
        protected $fillable = ['product_id', 'user_id','name', 'quantity', 'price', 'total', 'image'];
}
