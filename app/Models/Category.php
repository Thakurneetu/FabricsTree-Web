<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $appends = ['image_url'];

    protected $fillable = ['name','image'];

    public function getImageUrlAttribute()
    {
      if($this->image != ''){
        return asset($this->image);
      }else{
        return '';
      }
    }
}
