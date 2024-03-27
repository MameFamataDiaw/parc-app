<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function passager()
    {
        return $this->belongsTo(Passager::class);
    }

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }
}
