<?php // icon du lien de redirection
$infos ='<div style="background-color: #043e6b;" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
          </svg> Retourner à la liste des agences</div>'
?>

<?php foreach($unUtilisateur as $uneInformation => $value): // le foreach permet d'afficher les données ?>

<?php if ($value->utilisateur_statut_blocage == 0) { // retourne oui ou non selon si l'utilisateur est bloqué ou pas
    $status = 'Non';
} else{
    $status = 'Oui';
}; ?>

<p class="fs-4">Information sur l'agence : <?= $value->utilisateur_pseudo ?></p>
<hr class="mx-auto mx-lg-0 my-5"> <!-- séparation par un trait -->

<p>Pseudo : <?= $value->utilisateur_pseudo ?></p>
<p>Agence : <?= $value->agence_nom ?></p>
<p>Login : <?= $value->utilisateur_login ?></p>
<p>E-Mail : <?= $value->utilisateur_email ?></p>
<p>Téléphone 1 : <?= $value->utilisateur_tel1 ?></p>
<p>Téléphone 2 : <?= $value->utilisateur_tel2 ?></p>
<p>Dernière connexion : <?= $value->utilisateur_date_derniere_activite ?></p>
<p>Compte bloqué : <?= $status ?></p>

<hr class="mx-auto mx-lg-0 my-5"> <!-- séparation par un trait -->
<?php echo anchor('Utilisateurs/liste_des_utilisateurs', $infos); endforeach // retour à la liste des utilisateurs ?>