<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    protected $table = 'user_cart';
    protected $primaryKey = 'cartId';
    protected $fillable = ['userId', 'product_name', 'quantity', 'price', 'total', 'image'];
    public function user()
    {
        return $this->belongsTo(UserInfo::class, 'userId', 'user_id');
    }
}
