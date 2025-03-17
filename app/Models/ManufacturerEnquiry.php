<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManufacturerEnquiry extends Model
{
  protected $fillable = ['enquery_id' ,'customer_id', 'qutation'];

  public function customer()
  {
      return $this->belongsTo(Customer::class);
  }
}
