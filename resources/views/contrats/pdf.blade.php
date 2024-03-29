<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat PDF</title>
    <style>
        /* Styles CSS pour le formatage du contenu */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 20px;
        }
        h1, h2, h3 {
            margin-bottom: 10px;
        }
        /* Ajoutez d'autres styles selon vos besoins */
    </style>
</head>
<body>
    <!-- Contenu de votre contrat PDF -->
    <h1>Détails du contrat</h1>
    <p>Numéro de contrat : {{ $contrat->numero }}</p>
    <p>Date de début : {{ $contrat->date_debut }}</p>
    <p>Date de fin : {{ $contrat->date_fin }}</p>
    <p>Conducteur : {{ $contrat->conducteur->prenom }} {{ $contrat->conducteur->nom }}</p>
        <p>Conducteur : {{ $contrat->voiture->marque }} {{ $contrat->voiture->modele }}</p>
        <p>Duree : {{ $contrat->dureeContrat }} </p>
        <p>Conditions : {{ $contrat->coditions }} </p>
        <p>Salaire : {{ $contrat->salaire }} </p>
</body>
</html>
