<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function conducteur()
    {
        return $this->belongsTo(Conducteur::class);
    }

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public static function countContrats()
    {
        return self::count();
    }
}
