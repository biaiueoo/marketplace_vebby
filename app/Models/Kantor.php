<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
    use HasFactory;
    protected $table = 'kantor';
    protected $fillable = [
        'nama_kantor',
        'alamat_kantor',
        'telp_kantor',
    ];
}
