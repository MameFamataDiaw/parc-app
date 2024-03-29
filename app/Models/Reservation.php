<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'lieuDeDepart',
        'lieuDarrivee',
        'dateReservation',
        'passager_id',
        'voiture_id', // Assurez-vous que cet attribut est également inclus s'il n'est pas déjà ajouté
    ];


    public function passager()
    {
        return $this->belongsTo(User::class, 'passager_id');
    }

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }
}
