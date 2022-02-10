<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use App\Models\SuccessCheckout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'qty'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'product_id');
    }

    public function successCheckout()
    {
        return $this->hasOne(SuccessCheckout::class, 'checkout_id', 'id');
    }
}
