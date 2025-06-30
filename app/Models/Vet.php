<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    use HasFactory;

    protected $table = 'raysha_vets'; // Jika kamu pakai prefix tabel raysha_
    protected $fillable = ['name', 'specialization', 'phone', 'email','image']; // Sesuaikan field tabelmu
}
