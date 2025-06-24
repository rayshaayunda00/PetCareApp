<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterHewan extends Model
{
    use HasFactory;

    protected $table = 'raysha_vets'; // WAJIB sesuai nama tabel di migration
    protected $fillable = ['name', 'specialization', 'phone'];
}
