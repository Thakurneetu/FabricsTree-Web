<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
  protected $fillable = ['enquery_type','customer_id','product_id','quantity','color_code','category_id',
                        'subcategory_id','width','warp','weft','count','reed','pick','status','invoke_reason'];
}
