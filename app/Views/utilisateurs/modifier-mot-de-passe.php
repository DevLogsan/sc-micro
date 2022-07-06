<?php
$infos ='<div style="background-color: #043e6b;" class="btn btn-primary"> Voir plus <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
        </svg></div>';
?>
<p class="fs-4"><?php echo $Titre ?></p>
<?php foreach($unUtilisateur as $uneInformation => $value): // le foreach permet d'afficher les données ?>
<hr class="mx-auto mx-lg-0 my-5">
<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo site_url('Utilisateurs/modifier_mot_de_passe/'.$value->utilisateur_id)?>" class="row g-3">

    <div class="col-md-4 text-center">
        <label for="txtMotdepasseUtilisateur" class="form-label">Mot de passe actuel</label><span style="color:red">*</span>
    <input type="password" class="form-control" id="myInput" name="txtMotdepasseUtilisateur">
        <?php if ($Titre == 'Modifier le mot de passe | Erreur') {?>
            <?= $error = $validation->getError('txtMotdepasseUtilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-4 text-center">
        <label for="txtNouveauMotdepasseUtilisateur" class="form-label">Nouveau mot de passe</label><span style="color:red">*</span>
    <input type="password" class="form-control" name="txtNouveauMotdepasseUtilisateur" id="myInput" value="<?= set_value('txtNouveauMotdepasseUtilisateur') ?>">
        <?php if ($Titre == 'Modifier le mot de passe | Erreur') {?>
            <?= $error = $validation->getError('txtNouveauMotdepasseUtilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-4 text-center">
        <label for="txtNouveauMotdepasseConfirmationUtilisateur" class="form-label">Confirmation</label><span style="color:red">*</span>
    <input type="password" class="form-control" id="myInput" name="txtNouveauMotdepasseConfirmationUtilisateur">
        <?php if ($Titre == 'Modifier le mot de passe | Erreur') {?>
            <?= $error = $validation->getError('txtNouveauMotdepasseConfirmationUtilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" name="txtActiviteAgence" type="checkbox" checked onclick="myFunction()">
        <label class="form-check-label">
            Cacher
        </label>
        </div>
    </div>

    <label><span style="color:red">*</span> champs obligatoires</label>
    <div class="col-12">
        <button class="btn btn-primary" style="background-color: #043e6b;" type="submit">Modifier</button>
    </div>
</form>
<?php endforeach ?>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>