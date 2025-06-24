<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'raysha_pets';

    protected $fillable = ['owner_id', 'name', 'species', 'breed', 'age'];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
