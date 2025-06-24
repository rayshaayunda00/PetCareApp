<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    use HasFactory;

    protected $table = 'raysha_checkups';
    protected $fillable = ['pet_id', 'vet_id', 'date', 'diagnosis', 'treatment'];
}
