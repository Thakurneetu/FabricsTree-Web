<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnquiryItems extends Model
{
  protected $fillable = ['enquery_id','product_id','quantity','title','category_id','subcategory_id','width',
                        'subtitle','color_code','description','key_features','disclaimer','requirement_id',
                        'warp','weft','count','reed','pick'];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function subcategory()
  {
    return $this->belongsTo(Subcategory::class);
  }
  public function requirement()
  {
    return $this->belongsTo(Requirement::class);
  }
}
