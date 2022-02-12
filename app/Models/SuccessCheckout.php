<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessCheckout extends Model
{
    use HasFactory;

    protected $fillable = [
        'sell_code',
        'product_id',
        'qty',
        'price_per_item'
    ];

    public function product()
    {
        return $this->hasOne(product::class, 'id', 'product_id');
    }
}
