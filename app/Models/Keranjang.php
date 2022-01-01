<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang',
        'id_user',
        'jumlah_barang'
    ];

    public function barang() {
        return $this->hasMany(Barang::class, 'id_barang');
    }
    public function user() {
        return $this->hasMany(User::class, 'id_user');
    }

}
