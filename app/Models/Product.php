<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'short_desc',
        'description',
        'regular_price',
        'sale_price',
        'width',
        'height',
        'stock_status',
        'featured',
        'quantity',
        'image',
        'images',
        'category_id'
    ];

    protected $table = 'products';

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
