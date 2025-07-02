<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vaccination extends Model
{
     use HasFactory;

    protected $table = 'raysha_vaccinations';

    protected $fillable = [
    'pet_name',
    'vaccine_type',
    'vaccination_date',
    'notes',
    'doctor_name',
];

}
