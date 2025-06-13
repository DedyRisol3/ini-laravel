<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'invoice', 'total_harga'];

    public function detail()
    {
        return $this->hasMany(DetailPesanan::class);
    }
    
    public function detailPesanans()
    {
        return $this->hasMany(DetailPesanan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}