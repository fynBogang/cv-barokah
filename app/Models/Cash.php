<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cash extends Model
{

    protected $table = 'cash';
    protected $fillable = [
        'nama_user',
        'nama_barang',
        'jmlmasuk',
        'harga',
        'waktu'
    ];

    public function userFK(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'name');
    }

    public function barangFK(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id', 'nama', 'jmlbarang', 'harga');
    }
}