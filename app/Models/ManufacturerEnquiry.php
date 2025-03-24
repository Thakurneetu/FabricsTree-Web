<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManufacturerEnquiry extends Model
{
  protected $fillable = ['enquery_id' ,'customer_id', 'qutation'];

  protected $appends = ['file_path'];
  protected $hidden = ['updated_at','customer_id','enquery'];

  public function customer()
  {
      return $this->belongsTo(Customer::class);
  }
  public function getFilePathAttribute()
  {
    if($this->qutation != ''){
      return asset($this->qutation);
    }else{
      return null;
    }
  }
  public function enquery()
  {
      return $this->belongsTo(Enquiry::class);
  }
}
