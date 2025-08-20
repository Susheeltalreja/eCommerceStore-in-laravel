<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userInfo extends Model
{
    protected $table = 'user_info';
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_name', 'email', 'address', 'city'];
    public function carts()
    {
        return $this->hasMany(UserCart::class, 'userId', 'user_id');
    }
}
