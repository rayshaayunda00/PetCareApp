<?php

// app/Models/Owner.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $table = 'raysha_owners';
    protected $fillable = ['name', 'phone', 'address'];
}
