<?php
echo '<h3>'.$Titre.'</h3>';
echo $uneAgence['agence_nom_normalise'] .'<br>'. $uneAgence['agence_sigle'].'<br>'. $uneAgence['agence_tel'] .'<br>'. $uneAgence['agence_email'] .'<br>'. $uneAgence['agence_adresse1'];
echo $uneAgence['agence_adresse2'].'<br>'. $uneAgence['agence_code_postal'] .'<br>'. $uneAgence['agence_ville'] .'<br>'. $uneAgence['agence_horaires'] .'<br>';
echo '<p>'.anchor('Agences/liste_des_agences','Retour à la liste des agences').'</p>';
?>