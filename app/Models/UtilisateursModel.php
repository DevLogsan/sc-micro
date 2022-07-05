<?php

namespace App\Models;
use CodeIgniter\Model;

class UtilisateursModel extends Model
{
    protected $table = 'utilisateurs'; //définition de la table principale
    protected $primaryKey = 'utilisateur_id';
    protected $returnType = 'object';
    protected $uneSoftDeletes = false;
    protected $allowedFields = [
        'agence_id',
        'utilisateur_login',
        'utilisateur_pseudo',
        'utilisateur_email',
        'utilisateur_pass_hash',
        'utilisateur_pass_modules_externes',
        'utilisateur_uid_connexion_cookie',
        'utilisateur_token_mfa',
        'utilisateur_token_mfa_datetime_generation',
        'utilisateur_tel1',
        'utilisateur_tel2',
        'utilisateur_date_derniere_activite',
        'utilisateur_statut_blocage',
        'utilisateur_niveau_acces'
    ];
    
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function retournerUtilisateurs()
    {
        $builder = $this->db->table('utilisateurs');
        $builder->join('agences', 'utilisateurs.agence_id = agences.agence_id');
        $query = $builder->get();
        return $query->getResult();
    }

    public function retournerParametreUtilisateur($UtilisateurID)
    {
        $builder = $this->db->table('utilisateurs');
        $builder->join('agences', 'utilisateurs.agence_id = agences.agence_id');
        $builder->where('utilisateur_id', $UtilisateurID);
        $query = $builder->get();
        return $query->getResult();
    }
}