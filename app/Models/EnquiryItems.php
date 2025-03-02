<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnquiryItems extends Model
{
  protected $fillable = ['id','enquery_id','product_id','enquery_type','customer_id','category_id','subcategory_id','width',
                        'warp','weft','count','reed','pick','status','invoke_reason'];
}
