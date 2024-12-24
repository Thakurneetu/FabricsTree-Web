<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use SoftDeletes; 

  protected $fillable = ['title','subtitle','description','key_features','disclaimer',
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
}
