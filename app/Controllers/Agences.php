<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\AgencesModel;
helper(['url', 'assets', 'form']);

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
            echo view('templates/header');
            echo view('agences/ajout-agence', ['validation' => \Config\Services::validation()]);
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
            $model->save($data);

            return redirect()->to('Agences/accueil'); // redirection si l'insertion a fonctionné
        }
    }

    public function liste_des_agences()
    {
        $model = new AgencesModel();
        $data['lesAgences'] = $model->retournerAgences();

        echo view('templates/header');
        echo view('agences/liste-des-agences', $data);
    }

    public function details_agence($AgenceID = NULL)
    {
        $model = new AgencesModel();
        $data['uneAgence'] = $model->retournerAgences($AgenceID); // récup une agence depuis le modèle

        if(empty($data['uneAgence'])) // si pas d'agence
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data['Titre'] = $data['uneAgence']['agence_nom'];
        echo view('templates/header');
        echo view('agences/details-agence', $data);
    }

    public function modifier_une_agence($AgenceID = NULL)
    {
        echo view('templates/header');

        $rules = [ // les champs obligatoires
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

        $model = new AgencesModel();
        $data['lesAgences'] = $model->retournerAgences(); // retourne les agences pour la faire fonctionner la liste des agences

        if (!$this->validate($rules, $messages)) // formulaire non validé, on renvoie le formulaire
        {
            if ($AgenceID === null) // pas d'agence choisi, on affiche uniquement la liste des agences
            {
                echo view('agences/liste-des-agences-modification', $data);
            }
            else // une agence est choisi, mais on affiche toujours la liste des agences
            {
                $data['uneAgence'] = $model->retournerAgences($AgenceID); // retourne les infos de l'agence choisie
                
                echo view('agences/liste-des-agences-modification', $data);
                echo view('agences/modification-agence', $data);
            }
        }
    }

    public function appliquer_modification_agence($AgenceID = NULL)
    {
        $model = new AgencesModel();

        $etat = $this->request->getPost('txtActiviteAgence'); // le checkbox est un bool

        if ($etat === null) { // si la case est décoché, cela retourne null
            $retourne = 0; // on retourne 0 si c'est le cas
        }
        else
        {
            $retourne = 1; // sinon on retourne 1
        }

        $data = array( // données à remplacer
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