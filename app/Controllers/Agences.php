<?php

namespace App\Controllers; //Namespace pour utiliser fct contrôleur
use CodeIgniter\Controller;
use App\Models\AgencesModel; //Namespace pour utiliser fct Modèle (new AgencesModel)
helper(['url', 'assets', 'form']); //pour utiliser le helper dans tout le controller

class Agences extends BaseController
{
    public function accueil()
    {
        echo view('templates/header');
        echo view('accueil');
    }

    public function ajouter_une_agence()
    {
        $data['Titre'] = 'Ajouter une agence';
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
            if($_POST) $data['Titre'] = "Ajouter une agence | Erreur"; // le titre change si le formulaire est incorrect.
            echo view('templates/header');                             // Dans la view, si le titre change alors on affiche les messages d'erreurs. cela évite d'avoir à afficher directement les messages d'erreurs.
            echo view('agences/ajout-agence', $data);
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

            $model = new AgencesModel(); // instanciation du modèle
            $model->save($data); // on envoie dans la base de donnée

            return redirect()->to('Agences/ajouter_une_agence')->with('status', "L'agence a bien été ajoutée");; // redirection si l'insertion a fonctionné
        }
    }

    public function liste_des_agences()
    {
        $model = new AgencesModel(); // instanciation du modèle
        $data['lesAgences'] = $model->retournerAgences(); // on retourne toutes les agences

        echo view('templates/header');
        echo view('agences/liste-des-agences', $data);
    }

    public function details_agence($AgenceID = NULL)
    {
        $model = new AgencesModel(); // instanciation du modèle
        $data['uneAgence'] = $model->retournerAgences($AgenceID); // récup une agence depuis le modèle

        if(empty($data['uneAgence'])) // si pas d'agence (ex: http://localhost/index.php/Agences/details_agence/9999)
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); // on affichera le mesage d'erreur de codeigniter
        }
        echo view('templates/header');
        echo view('agences/details-agence', $data);
    }

    public function modifier_une_agence($AgenceID = NULL)
    {
        $data['Titre'] = 'Liste des agences modifiables';
        $data['validation'] = ['validation' => \Config\Services::validation()];

        echo view('templates/header');

        $input = [ // les champs obligatoires
            'txtNomAgence' => 'required',
            'txtNomAgenceNorm' => 'required',
            'txtSigleAgence' => 'required|max_length[3]',
            'txtNumAgence' => 'required|max_length[14]',
            'txtAdresse1Agence' => 'required', // la 2eme adresse n'est pas obligatoire
            'txtEmailAgence' => 'required|valid_email',
            'txtVilleAgence' => 'required|max_length[15]',
            'txtCPAgence' => 'required|max_length[5]',
            'txtHoraireAgence' => 'required',
            ];

        $messages = [ // message à renvoyer en cas de non-respect des règles de validation
            'txtNomAgence' => [
            'required' => "Veuillez renseigner le nom de l'agence",
            ],
            'txtNomAgenceNorm' => [
            'required' => "Veuillez renseigner le nom (normalisé) de l'agence",
            ],
            'txtSigleAgence' => [
                'required' => "Veuillez renseigner le sigle",
            ],
            'txtNumAgence' => [
                'required' => "Veuillez renseigner le numéro",
            ],
            'txtAdresse1Agence' => [
                'required' => "Veuillez renseigner l'adresse",
            ],
            'txtEmailAgence' => [
                'required' => "Veuillez renseigner l'e-mail",
            ],
            'txtVilleAgence' => [
                'required' => "Veuillez renseigner la ville",
            ],
            'txtCPAgence' => [
                'required' => "Veuillez renseigner le code postal",
            ],
            'txtHoraireAgence' => [
                'required' => "Veuillez renseigner les horaires",
            ],
        ];

        $model = new AgencesModel(); // instanciation du modèle
        $data['lesAgences'] = $model->retournerAgences(); // retourne les agences pour la faire fonctionner la liste des agences

        if (!$this->validate($input, $messages)) // formulaire non validé, on renvoie le formulaire
        {
            if ($AgenceID === null) // pas d'agence choisi, on affiche uniquement la liste des agences
            {
                echo view('agences/liste-des-agences-modification', $data);
            }
            else // une agence est choisi, mais on affiche toujours la liste des agences
            {
                $data['uneAgence'] = $model->retournerAgences($AgenceID); // retourne les infos de l'agence choisie
                
                if($_POST) $data['Titre'] = "Liste des agences modifiables | Erreur";   // le titre change si le formulaire est incorrect.
                                                                                        // Dans la view, si le titre change alors on affiche les messages d'erreurs. cela évite d'avoir à afficher directement les messages d'erreurs.
                echo view('agences/liste-des-agences-modification', $data);
                echo view('agences/modification-agence', $data);
            }
        }
        else // le formulaire est correct
        {
            $etat = $this->request->getPost('txtActiviteAgence'); // le checkbox est un bool

            if ($etat === null) { // si la case est décoché, cela retourne null
                $retourne = 0; // on retourne 0 si c'est le cas
            }
            else
            {
                $retourne = 1; // sinon on retourne 1
            }
    
            $data = array( // données à mettre à jour
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
            
            $model->update($AgenceID, $data);
            return redirect()->to('Agences/modifier_une_agence')->with('status', "Modification de l'agence réussite"); // redirection si l'insertion a fonctionné
        }
    }

    public function supprimer_une_agence($AgenceID = NULL)
    {
        $model = new AgencesModel(); // instanciation du modèle
        $model->delete(['agence_id' => $AgenceID]); // on supprime la ligne dont l'id est égal à celui sélectionné dans la vue
        return redirect()->to('Agences/modifier_une_agence')->with('status', "L'agence a bien été supprimé"); // redirection + affichage d'un message de confirmation
    }
}