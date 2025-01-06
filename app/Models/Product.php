<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use SoftDeletes; 

  protected $appends = ['color_list','image_list'];
  protected $hidden = ['colors', 'images'];

  protected $fillable = ['title','subtitle','description','key_features','disclaimer','wrap','weft',
                         'category_id','requirement_id','subcategory_id','width','count','reed',
                         'pick','total_ratings','customers_rated'];

  public function tags()
  {
      return $this->belongsToMany(Tag::class, 'product_tag');
  }
  public function images()
  {
      return $this->hasMany(ProductImage::class);
  }
  public function colors()
  {
      return $this->hasMany(ProductColors::class);
  }
  public function getColorListAttribute()
  {
      return $this->colors->pluck('code')->toArray();
  }
  public function getImageListAttribute()
  {
      return $this->images->pluck('path')->toArray();
  }
}
