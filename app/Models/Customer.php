<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Authenticatable
{
  use HasFactory, HasApiTokens, SoftDeletes;

  protected $guard = 'customer';

  protected $fillable = ['name' ,'email', 'phone', 'address','password','pincode','otp', 'status',
                         'user_type','firm_name', 'gst_number', 'store_contact','store_logo'];

  protected $hidden = ['password', 'otp','deleted_at'];

  protected $casts = ['password' => 'hashed'];

  protected $dates = ['deleted_at'];

  protected $appends = ['logo_url'];

  public function carts()
  {
      return $this->hasMany(Cart::class);
  }

  public function enquiry()
  {
      return $this->hasMany(Enquiry::class);
  }

  public function manufacturerProduct()
  {
      return $this->hasMany(ManufacturerProduct::class);
  }
  public function orders()
  {
    return $this->hasMany(Order::class);
  }
  public function manufacturer_orders()
  {
    return $this->hasMany(Order::class, 'manufacturer_id');
  }
  public function getLogoUrlAttribute()
  {
    if($this->store_logo != ''){
      return asset($this->store_logo);
    }else{
      return null;
    }
  }
}
