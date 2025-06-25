<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penitipan extends Model
{
    protected $table = 'raysha_penitipans';

    protected $fillable = [
        'owner_id',
        'pet_id',
        'start_date',
        'end_date',
        'status',
        'notes'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}
