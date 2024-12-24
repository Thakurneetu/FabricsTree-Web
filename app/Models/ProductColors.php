<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColors extends Model
{
  protected $fillable = ['product_id', 'code'];
}
