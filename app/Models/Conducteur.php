<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conducteur extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function countConducteurs()
    {
        return self::count();
    }

    public function voitures()
    {
        return $this->hasMany(Voiture::class);
    }

    public function attributions()
    {
        return $this->hasMany(Attribution::class);
    }

    // public function voitures()
    // {
    //     return $this->hasManyThrough(Voiture::class, Attribution::class);
    // }
    // Dans le modèle Conducteur
    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }
}
