<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $enums = [
        'statut' => ['en panne', 'en marche', 'active', 'inactive']
    ];

    public static function countVoitures()
    {
        return self::count();
    }

    public function attribution()
    {
        return $this->belongsTo(Attribution::class);
    }

    public function conducteurs()
    {
        return $this->hasManyThrough(Conducteur::class, Attribution::class);
    }

    public function passager()
    {
        return $this->belongsTo(Passager::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }
}
