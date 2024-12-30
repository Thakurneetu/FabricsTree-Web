<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  protected $fillable = ['product_id','customer_id','quantity','color_code'];

  public function product()
  {
      return $this->belongsTo(Product::class);
  }
}
