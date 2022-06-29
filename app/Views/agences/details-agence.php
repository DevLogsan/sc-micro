<?php // icon du lien de redirection
$infos ='<div class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
          </svg> Retourner à la liste des agences</div>'
?>

<p class="fs-4">Information sur l'agence : <?php echo $uneAgence['agence_nom'] ?></p>
<hr class="mx-auto mx-lg-0 my-5">

<?php
echo '<p> Nom normalisé : '. $uneAgence['agence_nom_normalise'] .'</p><p> Sigle : '. $uneAgence['agence_sigle'].'</p><p> Numéro : '. $uneAgence['agence_tel'] .'</p><p> E-Mail : '. $uneAgence['agence_email'] .'</p><p> Première adresse : '. $uneAgence['agence_adresse1'] .'</p>';
echo '<p> Seconde adresse : '. $uneAgence['agence_adresse2'].'</p><p> Code Postal : '. $uneAgence['agence_code_postal'] .'</p><p> Ville : '. $uneAgence['agence_ville'] .'</p><p> Horaires : '. $uneAgence['agence_horaires'] .'</p>';
echo '<hr class="mx-auto mx-lg-0 my-5">';
echo anchor('Agences/liste_des_agences', $infos);
?>