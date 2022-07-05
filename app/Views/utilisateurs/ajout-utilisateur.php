<p class="fs-4"><?php echo $Titre ?></p>
<?php
    if (session()->getFlashdata('status')) // si l'insertion a bien fonctionné, on affiche un message
    {
        ?>
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Information : </strong> <?= session()->getFlashdata('status') ?>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Fermer'></button>
            </div>
        <?php
    }
?>
<hr class="mx-auto mx-lg-0 my-5">
<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo site_url('Utilisateurs/ajouter_un_utilisateur')?>" class="row g-3">

    <div class="col-md-4">
        <label for="txtLoginUtilisateur" class="form-label">Login</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtLoginUtilisateur" value="<?= set_value('txtLoginUtilisateur') ?>">
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtLoginUtilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-4">
        <label for="txtPseudoUtilisateur" class="form-label">Pseudo</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtPseudoUtilisateur" value="<?= set_value('txtPseudoUtilisateur') ?>">
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtPseudoUtilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-4">
    <label for="txtAgence" class="form-label">Agence</label><span style="color:red">*</span>
        <?php
        $choix = [];
        foreach($lesAgences as $uneAgence)
        {
            $choix[$uneAgence['agence_id']] = $uneAgence['agence_nom'];  // on boucle tant qu'on a des agences
        }

        echo form_dropdown('txtAgence', $choix, '', 'class="form-select"'); //dropdown CI4
        ?>
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtEmailUtilisateur" class="form-label">E-Mail</label><span style="color:red">*</span>
        <div class="input-group has-validation">
            <span class="input-group-text">@</span>
        <input type="text" class="form-control" name="txtEmailUtilisateur" value="<?= set_value('txtEmailUtilisateur') ?>">
        </div>
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtEmailUtilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtMotdepasseUtilisateur" class="form-label">Mot de passe</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtMotdepasseUtilisateur" value="<?= set_value('txtMotdepasseUtilisateur') ?>">
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtMotdepasseUtilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtNum1Utilisateur" class="form-label">Numéro de téléphone 1</label>
    <input type="text" class="form-control" name="txtNum1Utilisateur" value="<?= set_value('txtNum1Utilisateur') ?>">
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtNum1Utilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtNum2Utilisateur" class="form-label">Numéro de téléphone 2</label>
    <input type="text" class="form-control" name="txtNum2Utilisateur" value="<?= set_value('txtNum2Utilisateur') ?>">
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtNum2Utilisateur'); ?>
        <?php } ?>
    </div>

    <label><span style="color:red">*</span> champs obligatoires</label>
    <div class="col-12">
        <button class="btn btn-primary" style="background-color: #043e6b;" type="submit">Ajouter</button>
    </div>
</form>