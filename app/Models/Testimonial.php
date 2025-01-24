<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
  protected $appends = ['image_url'];
  
  protected $fillable = ['name' ,'designation', 'comment', 'rating', 'image'];

  public function getImageUrlAttribute()
    {
      if($this->image != ''){
        return asset($this->image);
      }else{
        return '';
      }
    }
}
