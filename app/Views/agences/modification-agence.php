<h3><?php echo $Titre ?></h3>
<?php

if ($uneAgence['agence_etat'] == 1) { // vérification de l'etat de l'entreprise
    $etat = true;
}
else
{
    $etat = false;
}
//if ($Titre == 'Corriger votre agence')....
                                         echo service('validation')->listErrors(); // mise en place de la validation
echo form_open('Agences/modifier_une_agence/'.$uneAgence['agence_id']);
echo csrf_field(); // protection contre le CSRF (cross-site request forgery)

echo form_label("Nom : ", "txtNomAgence");
echo form_input('txtNomAgence', $uneAgence['agence_nom']);
echo '<br>';

echo form_label("Nom (normalisé) : ", "txtNomAgenceNorm");
echo form_input('txtNomAgenceNorm', $uneAgence['agence_nom_normalise']);
echo '<br>';

echo form_label("Sigle : ", "txtSigleAgence");
echo form_input('txtSigleAgence', $uneAgence['agence_sigle']);
echo '<br>';

echo form_label("Numéro (fixe): ", "txtNumAgence");
echo form_input('txtNumAgence', $uneAgence['agence_tel']);
echo '<br>';

echo form_label("Adresse 1 : ", "txtAdresse1Agence");
echo form_input('txtAdresse1Agence', $uneAgence['agence_adresse1']);
echo '<br>';

echo form_label("Adresse 2 : ", "txtAdresse2Agence");
echo form_input('txtAdresse2Agence', $uneAgence['agence_adresse2']);
echo '<br>';

echo form_label("E-mail : ", "txtEmailAgence");
echo form_input('txtEmailAgence', $uneAgence['agence_email']);
echo '<br>';

echo form_label("Ville : ", "txtVilleAgence");
echo form_input('txtVilleAgence', $uneAgence['agence_ville']);
echo '<br>';

echo form_label("Code postal : ", "txtCPAgence");
echo form_input('txtCPAgence', $uneAgence['agence_code_postal']);
echo '<br>';

echo form_label("Horaire : ", "txtHoraireAgence");
echo form_textarea('txtHoraireAgence', $uneAgence['agence_horaires']);
echo '<br>';
echo form_label("(exemple : Lundi-vendredi 9h-12h 14h-18h30. Samedi 10h-12h 14h-17h)", "");
echo '<br>';

echo form_checkbox('txtActiviteAgence', '', $etat);
echo form_label("En activité", "txtActiviteAgence");
echo '<br>';

echo form_submit('submit', 'Modifier');
echo form_close();
?>