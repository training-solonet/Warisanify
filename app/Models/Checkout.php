<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SuccessCheckout;

class Checkout extends Model
{
    use HasFactory;

    // protected $table = "checkouts";

    protected $fillable = [
        'username',
        'telp',
        'province',
        'city',
        'courier',
        'cost',
        'origin',
        'sell_code'
    ];

    public function successCheckout()
    {
        return $this->hasOne(SuccessCheckout::class, 'id', 'checkout_id');
    }
}
