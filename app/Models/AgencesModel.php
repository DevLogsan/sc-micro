<?php

namespace App\Models;
use CodeIgniter\Model;

class AgencesModel extends Model
{
    protected $table = 'agences'; //définition de la table principale
    protected $primaryKey = 'agence_id';
    protected $allowedFields = [
        'agence_nom',
        'agence_nom_normalise',
        'agence_sigle',
        'agence_tel',
        'agence_email',
        'agence_adresse1',
        'agence_adresse2',
        'agence_code_postal',
        'agence_ville',
        'agence_horaires',
        'agence_etat',
    ];

    public function retournerAgences($AgenceID = false)
    {
        if ($AgenceID === false) // pas de n° d'agences en paramètre, on retourne toutes les agences
        {
            return $this->findAll(); // SELECT * FROM agences
        }
        return $this->where(['agence_id' => $AgenceID])->first(); // 'SELECT * FROM agences WHERE agence_id = '.$pAgenceID
    }

    public function retournerParametreAgence($AgenceID)
    {
        return $this->where(['agence_id' => $AgenceID])->first();
    }
}