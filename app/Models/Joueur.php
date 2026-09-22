<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'numero_licence',
        'position',
        'certificat_medical_valide',
        'nom_responsable',
        'telephone_responsable',
        'email_responsable',
    ];
}