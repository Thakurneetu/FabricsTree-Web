<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manufacturer extends Authenticatable
{
  use HasFactory, HasApiTokens;

  protected $guard = 'manufacturer';

  protected $fillable = ['name' ,'email', 'phone', 'address','password','pincode', 'otp', 'store_name',
                         'gst' ,'store_contact','logo'];

  protected $hidden = ['password', 'otp'];

  protected $casts = ['password' => 'hashed'];
}
