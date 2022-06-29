<h3><?php echo $Titre ?></h3>
<?php
if ($Titre == 'Corriger votre agence') echo service('validation')->listErrors(); // mise en place de la validation
echo form_open('Agences/ajouter_une_agence');
echo csrf_field(); // protection contre le CSRF (cross-site request forgery)

echo form_label("Nom : ", "txtNomAgence");
echo form_input('txtNomAgence', '');
echo '<br>';

echo form_label("Nom (normalisé) : ", "txtNomAgenceNorm");
echo form_input('txtNomAgenceNorm', '');
echo '<br>';

echo form_label("Sigle : ", "txtSigleAgence");
echo form_input('txtSigleAgence', '');
echo '<br>';

echo form_label("Numéro (fixe): ", "txtNumAgence");
echo form_input('txtNumAgence', '');
echo '<br>';

echo form_label("Adresse 1 : ", "txtAdresse1Agence");
echo form_input('txtAdresse1Agence', '');
echo '<br>';

echo form_label("Adresse 2 : ", "txtAdresse2Agence");
echo form_input('txtAdresse2Agence', '');
echo '<br>';

echo form_label("E-mail : ", "txtEmailAgence");
echo form_input('txtEmailAgence', '');
echo '<br>';

echo form_label("Ville : ", "txtVilleAgence");
echo form_input('txtVilleAgence', '');
echo '<br>';

echo form_label("Code postal : ", "txtCPAgence");
echo form_input('txtCPAgence', '');
echo '<br>';

echo form_label("Horaire : ", "txtHoraireAgence");
echo form_textarea('txtHoraireAgence', '');
echo '<br>';
echo form_label("(exemple : Lundi-vendredi 9h-12h 14h-18h30. Samedi 10h-12h 14h-17h)", "");
echo '<br>';

echo form_checkbox('txtActiviteAgence');
echo form_label("En activité", "txtActiviteAgence");
echo '<br>';

echo form_submit('submit', 'Ajouter');
echo form_close();
?>