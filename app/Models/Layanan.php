<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'raysha_layanan'; // Nama tabel sesuai prefix

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar'
    ];
}
