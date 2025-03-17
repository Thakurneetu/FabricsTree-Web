<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id' ,'invoice_no', 'status','qutation','enquiry_id','track_link'];

    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
