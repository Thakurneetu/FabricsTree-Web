<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManufacturerProduct extends Model
{
  protected $appends = ['image_list'];
  protected $hidden = ['images'];

  protected $fillable = ['title','subtitle','description','key_features','disclaimer','wrap','weft',
                         'category_id','requirement_id','subcategory_id','width','count','reed',
                         'pick','customer_id','product_id','quantity','color_code'];

  public function category()
  {
      return $this->belongsTo(Category::class);
  }
  public function subcategory()
  {
      return $this->belongsTo(Subcategory::class);
  }
  public function product()
  {
      return $this->belongsTo(Product::class);
  }
  public function images()
  {
      return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
  }
  public function getImageListAttribute()
  {
      return $this->images->pluck('path')->toArray();
  }
}
