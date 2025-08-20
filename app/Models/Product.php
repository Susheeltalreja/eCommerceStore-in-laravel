<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'Product_id';
    protected $fillable = ['product_name', 'product_category', 'product_sku', 'product_price', 'product_desc', 'product_image'];
}
