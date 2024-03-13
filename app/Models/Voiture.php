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

    public function attributions()
    {
        return $this->hasMany(Attribution::class);
    }

    public function conducteurs()
    {
        return $this->hasManyThrough(Conducteur::class, Attribution::class);
    }

    // public function conducteur()
    // {
    //     return $this->belongsTo(Conducteur::class);
    // }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }
}
