<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SuccessCheckout;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'telp',
        'province',
        'city',
        'courier',
        'cost',
        'origin'
    ];

    public function successCheckout() {
        return $this->hasOne(SuccessCheckout::class, 'id', 'checkout_id');
    }
}
