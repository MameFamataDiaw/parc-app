<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function car()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    protected static function boot()
{
    parent::boot();

    static::created(function ($tarification) {
        $location = $tarification->location;
        $conducteur = $location->conducteur;
        $voiture = $location->voiture;

        $content = "Facture pour la location de la voiture :\n";
        $content .= "Nom du conducteur : " . $conducteur->nom . " " . $conducteur->prenom . "\n";
        $content .= "Voiture louée : " . $voiture->matricule . "\n";
        $content .= "Montant : " . $tarification->montant . "\n";
        $content .= "Date : " . $tarification->datePaiement . "\n";

        $filename = "facture_" . $conducteur->nom . "_" . $voiture->matricule . ".txt";
        file_put_contents(public_path('factures/' . $filename), $content);

        $tarification->update(['nomFichierFacture' => $filename]);
    });
}
}
