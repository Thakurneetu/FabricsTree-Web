<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
  use HasFactory, HasApiTokens;

  protected $guard = 'customer';

  protected $fillable = ['name' ,'email', 'phone', 'address','password','pincode', 'otp','user_type','firm_name', 'gst_number', 'store_contact','store_logo'];

  protected $hidden = ['password', 'otp'];

  protected $casts = ['password' => 'hashed'];

  public function carts()
  {
      return $this->hasMany(Cart::class);
  }

  public function enquiry()
  {
      return $this->hasMany(Enquiry::class);
  }
}
