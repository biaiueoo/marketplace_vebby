<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';
    protected $fillable = [
        'pembelian_id',
        'total_harga'
    ];

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }

    public function order()
    {
        return $this->hasOne(Daftarorder::class);
    }
}
