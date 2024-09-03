<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengeluaran extends Model
{


    protected $table = 'pengeluaran';
    protected $fillable = [
        'nama_user', 'nama_barang', 'qt', 'harga'
    ];

    public function userFK(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'name');
    }

    public function barangFK(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id', 'nama', 'qt', 'harga');
    }
}
