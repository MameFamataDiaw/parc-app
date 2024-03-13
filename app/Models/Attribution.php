<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'conducteur_id',
        'voiture_id',
        'lieu_depart',
        'lieu_arrivee',
        'heure_depart',
        'heure_arrivee',
    ];

    public static function countAttributions()
    {
        return self::count();
    }

    public function conducteur()
    {
        return $this->belongsTo(Conducteur::class);
    }

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }
}
