<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $guarded = [];

    protected $fillable = [
        'nama',
        'jmlbarang',
        'harga',
    ];

    public function cashFK(): HasMany
    {
        return $this->hasMany(Cash::class, 'id', 'nama', 'jmlmasuk', 'harga');
    }

    public function luarFK(): HasMany
    {
        return $this->hasMany(Pengeluaran::class, 'id', 'nama', 'jmlbarang', 'harga');
    }
}