<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passager extends Model
{
    use HasFactory;

    Protected $guarded = [];

    // public function reservations()
    // {
    //     return $this->hasMany(Reservation::class);
    // }

    // public function voitures()
    // {
    //     return $this->hasMany(Voiture::class);
    // }
}
