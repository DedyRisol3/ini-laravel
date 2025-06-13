<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi secara massal
     */
    protected $fillable = [
        'user_id',
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'kategori',
        'status', // tambahkan jika kamu menyimpan status seperti "Tersedia"
    ];

    /**
     * Relasi: Menu dimiliki oleh satu User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
