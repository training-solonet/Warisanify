<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessCheckout extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkout_id',
        'product_id',
        'qty',
        'price_per_item'

    ];
}
