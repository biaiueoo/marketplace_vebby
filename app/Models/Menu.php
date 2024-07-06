<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $fillable = [
        'nama_menu',
        'deskripsi_menu',
        'harga_menu',
        'foto',
        'merchant_id', // Tambahkan merchant_id ke dalam $fillable
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}

