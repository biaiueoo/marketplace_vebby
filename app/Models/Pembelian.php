<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    
    protected $table = 'pembelian';
    protected $fillable = [
        'kantor_id',
        'menu_id',
        'jumlah_porsi',
        'tanggal_pengiriman',
        'total_harga'
    ];

    public function kantor()
    {
        return $this->belongsTo(Kantor::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
