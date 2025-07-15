<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'payment_status',     // e.g., 'paid', 'pending', 'failed'
        'order_status',       // e.g., 'processing', 'shipped', 'delivered'
        'shipping_address',
        'billing_address',
        'shipping_method',
        'payment_method',
        'notes',              // optional user notes
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
