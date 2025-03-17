<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
  protected $fillable = ['enquery_type','customer_id','category_id','subcategory_id','width','qutation',
                        'warp','weft','count','reed','pick','status','invoke_reason','revoked_at'];

  public function items()
  {
      return $this->hasMany(EnquiryItems::class, 'enquery_id');
  }
  public function customer()
  {
      return $this->belongsTo(Customer::class);
  }
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function subcategory()
  {
    return $this->belongsTo(Subcategory::class);
  }
  public function manufacturers()
    {
        return $this->hasMany(ManufacturerEnquiry::class, 'enquery_id');
    }
}
