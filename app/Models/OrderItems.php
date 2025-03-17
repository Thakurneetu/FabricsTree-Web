<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = ['order_id' ,'customer_id', 'product_id', 'quantity','color_code',
                           'category_id','requirement_id' ,'subcategory_id','title', 'subtitle',
                           'description','key_features' ,'disclaimer','width', 'warp','weft',
                           'count','reed' ,'pick','category','subcategory'];
}
