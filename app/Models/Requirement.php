<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
  protected $fillable = ['name', 'category_id'];
}
