<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnquiryItems extends Model
{
  protected $fillable = ['enquery_id','product_id','quantity','title','category_id','subcategory_id','width',
                        'subtitle','color_code','description','key_features','disclaimer','requirement_id',
                        'warp','weft','count','reed','pick'];
}
