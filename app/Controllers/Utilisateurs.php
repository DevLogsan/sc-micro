<?php

namespace App\Controllers; //Namespace pour utiliser fct contrôleur
use CodeIgniter\Controller;
use App\Models\UtilisateursModel; //Namespace pour utiliser fct Modèle (new UtilisateursModel)
use App\Models\AgencesModel;
helper(['url', 'assets', 'form']); //pour utiliser le helper dans tout le controller

class Utilisateurs extends BaseController
{
    function __construct()
    {
        $this->modelUtilisateurs = new UtilisateursModel(); // instanciation du modèle
        $this->modelAgences = new AgencesModel(); // instanciation du modèle
    }

    public function ajouter_un_utilisateur()
    {
        $data['Titre'] = 'Ajouter un utilisateur';
        $data['validation'] = ['validation' => \Config\Services::validation()];

        $input = $this->validate = ([ //les champs obligatoires
            'txtNomAgence' => 'required',
            'txtNomAgenceNorm' => 'required',
            'txtSigleAgence' => 'required|max_length[3]',
            'txtNumAgence' => 'required|regex_match[/^[0-9]{10}$/]',
            'txtAdresse1Agence' => 'required', // la 2eme adresse n'est pas obligatoire
            'txtEmailAgence' => 'required|valid_email',
            'txtVilleAgence' => 'required|max_length[15]',
            'txtCPAgence' => 'required|regex_match[/^[0-9]{5}$/]',
            'txtHoraireAgence' => 'required',
            ]);

        $messages = [ //message à renvoyer en cas de non-respect des règles de validation
            'txtNomAgence' => [
            'required' => "Veuillez renseigner le nom",
            ],
            'txtNomAgenceNorm' => [
            'required' => "Veuillez renseigner le nom (normalisé)",
            ],
            'txtSigleAgence' => [
            'required' => "Veuillez renseigner le sigle (3 char. max)",
            ],
            'txtNumAgence' => [
                'required' => "Veuillez renseigner le numéro",
            ],
            'txtAdresse1Agence' => [
                'required' => "Veuillez renseigner l'adresse",
            ],
            'txtEmailAgence' => [
                'valid_email' => "Veuillez renseigner une adresse mail valide",
            ],
            'txtVilleAgence' => [
                'required' => "Veuillez renseigner la ville",
            ],
            'txtCPAgence' => [
                'required' => "Veuillez renseigner le CP",
            ],
            'txtHoraireAgence' => [
                'required' => "Veuillez renseigner les horaires",
            ],
        ];

        if (!$this->validate($input, $messages))// formulaire non validé, on renvoie le formulaire
        {
            if($_POST) $data['Titre'] = "Ajouter un utilisateur | Erreur"; // le titre change si le formulaire est incorrect.
                                                                            // Dans la view, si le titre change alors on affiche les messages d'erreurs. cela évite d'avoir à afficher directement les messages d'erreurs.
            $data['lesUtilisateurs'] = $this->modelUtilisateurs->retournerUtilisateurs(); // on retourne les utilisateurs
            $data['lesAgences'] = $this->modelAgences->retournerAgences();
            echo view('templates/header');
            echo view('utilisateurs/ajout-utilisateur', $data);
        }
        else
        {
            $etat = $this->request->getVar('txtActiviteAgence'); // le checkbox est un bool

            if ($etat === null) { // si la case est décoché, cela retourne null
                $retourne = 0; // on retourne 0 si c'est le cas
            }
            else
            {
                $retourne = 1; // sinon on retourne 1
            }

            $data = array( // données à insérer
                'agence_nom' => $this->request->getPost('txtNomAgence'),
                'agence_nom_normalise' => $this->request->getPost('txtNomAgenceNorm'),
                'agence_sigle' => $this->request->getPost('txtSigleAgence'),
                'agence_tel' => $this->request->getPost('txtNumAgence'),
                'agence_email' => $this->request->getPost('txtEmailAgence'),
                'agence_adresse1' => $this->request->getPost('txtAdresse1Agence'),
                'agence_adresse2' => $this->request->getPost('txtAdresse2Agence'),
                'agence_code_postal' => $this->request->getPost('txtCPAgence'),
                'agence_ville' => $this->request->getPost('txtVilleAgence'),
                'agence_horaires' => $this->request->getPost('txtHoraireAgence'),
                'agence_etat' => $retourne,
            );
            $model->save($data);

            return redirect()->to('Agences/ajouter_une_agence')->with('status', "L'agence a bien été ajoutée");; // redirection si l'insertion a fonctionné
        }
    }

    public function liste_des_utilisateurs()
    {
        $modelUtilisateurs = new UtilisateursModel();
        $data['lesUtilisateurs'] = $modelUtilisateurs->retournerUtilisateurs();

        echo view('templates/header');
        echo view('utilisateurs/liste-des-utilisateurs', $data);
    }

    public function details_utilisateur($UtilisateurID = NULL)
    {
        $modelUtilisateurs = new UtilisateursModel();
        $data['unUtilisateur'] = $modelUtilisateurs->retournerParametreUtilisateur($UtilisateurID); // récup une agence depuis le modèle

        if(empty($data['unUtilisateur'])) // si pas d'agence
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        echo view('templates/header');
        echo view('utilisateurs/details-utilisateur', $data);
    }
}