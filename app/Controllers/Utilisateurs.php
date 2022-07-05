<?php

namespace App\Controllers; //Namespace pour utiliser fct contrôleur
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
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
        $MotDePasse = 'test'; // le mot de passe est récupéré lors de la confirmation du formulaire
        $hash = password_hash($MotDePasse, PASSWORD_DEFAULT);
        var_dump($hash);

        $data['Titre'] = 'Ajouter un utilisateur';
        $data['validation'] = ['validation' => \Config\Services::validation()];

        $input = $this->validate = ([ //les champs obligatoires
            'txtLoginUtilisateur' => 'required|max_length[40]',
            'txtPseudoUtilisateur' => 'required',
            'txtAgence' => 'required',
            'txtEmailUtilisateur' => 'required|valid_email',
            'txtMotdepasseUtilisateur' => 'required', // la 2eme adresse n'est pas obligatoire
            ]);

        $messages = [ //message à renvoyer en cas de non-respect des règles de validation
            'txtLoginUtilisateur' => [
            'required' => "Veuillez renseigner le login",
            ],
            'txtPseudoUtilisateur' => [
            'required' => "Veuillez renseigner le pseudo",
            ],
            'txtAgence' => [
            'required' => "Veuillez choisir l'agence",
            ],
            'txtEmailUtilisateur' => [
                'required' => "Veuillez renseigner une adresse mail valide",
            ],
            'txtMotdepasseUtilisateur' => [
                'required' => "Veuillez renseigner le mot de passe",
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
            // GENERATION MDP
            $MotDePasse = $this->request->getPost('txtMotdepasseUtilisateur'); // le mot de passe est récupéré lors de la confirmation du formulaire
            $hash = password_hash($MotDePasse, PASSWORD_DEFAULT); // on le hash, un salt est généré automatiquement par la fonction password_hash
            $rest = substr($hash, 7);

            // DERNIERE ACTIVITE
            $date_derniere_activite = date('Y-m-d H:i:s');

            $data = array( // données à insérer
                'agence_id' => $this->request->getPost('txtAgence'),
                'utilisateur_login' => $this->request->getPost('txtLoginUtilisateur'),
                'utilisateur_pseudo' => $this->request->getPost('txtPseudoUtilisateur'),
                'utilisateur_email' => $this->request->getPost('txtEmailUtilisateur'),
                'utilisateur_pass_hash' => $hash,
                //'utilisateur_pass_modules_externes' => ,
                //'utilisateur_uid_connexion_cookie' => ,
                'utilisateur_token_mfa' => $token,
                'utilisateur_token_mfa_datetime_generation' => $heure,
                'utilisateur_tel1' => $this->request->getPost('txtNum1Utilisateur'),
                'utilisateur_tel2' => $this->request->getPost('txtNum2Utilisateur'),
                'utilisateur_date_derniere_activite' => $date_derniere_activite,
                'utilisateur_statut_blocage' => '0',
                'utilisateur_niveau_acces' => '2',
            );
            $modelUtilisateurs->save($data);

            return redirect()->to('Utilisateurs/ajouter_un_utilisateur')->with('status', "L'utilisateur a bien été ajouté");; // redirection si l'insertion a fonctionné
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

    public function se_connecter()
    {
        // GENERATION TOKEN
        $token = rand (100000, 999999);

        // TOKEN MFA VALIDATION
        $date = new Time('now', 'Europe/Paris');
        $date = $date->addMinutes(15);

        // envoie 
        $email = \Config\Services::email();

        $email->setFrom('technique.tpnas@gmail.com', 'SC Micro');
        $email->setTo('loganlegallou22@gmail.com');

        $email->setSubject('Code de validation');
        $email->setMessage('Votre code de validation est : '. $token);

        if ($email->send()) {
            echo $token;
            echo $date;
        }
        else
        {
            echo 'fail';
        }
    }
}