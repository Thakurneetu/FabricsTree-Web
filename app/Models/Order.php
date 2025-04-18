<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id' ,'invoice_no', 'status','qutation','enquiry_id','track_link',
                            'revoke_reason', 'revoked_at','manufacturer_id'];

    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class)->withTrashed();
    }
    public function manufacturer()
    {
        return $this->belongsTo(Customer::class, 'manufacturer_id');
    }
}
