<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // protected $hidden = [
    //     'created_at',
    //     'updated_at'
    // ];

    protected $table = 'categories';

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
