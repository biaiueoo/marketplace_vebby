<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\TableExtension;

class Merchant extends Model
{
    use HasFactory;
    protected $table = 'merchant';
    protected $fillable = ['nama_merchant', 'alamat_merchant', 'kontak', 'deskripsi'];
}
