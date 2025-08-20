<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'register';
    protected $primaryKey = 'user_id';
    protected $fillable = ['name',	'email', 'password', 'role'];
}
