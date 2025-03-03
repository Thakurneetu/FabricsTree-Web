<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
  protected $fillable = ['enquery_type','customer_id','category_id','subcategory_id','width',
                        'warp','weft','count','reed','pick','status','invoke_reason'];

  public function items()
  {
      return $this->hasMany(EnquiryItems::class, 'enquery_id');
  }                      
}
