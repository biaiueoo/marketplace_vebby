<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'kantor_id',
        'invoice_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Kantor::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
