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
<form method="post" action="<?php echo site_url('Agences/ajouter_une_agence')?>" class="row g-3">

    <div class="col-md-3">
        <label for="txtNomAgence" class="form-label">Login</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtNomAgence" value="<?= set_value('txtNomAgence') ?>">
        <?php if ($Titre == 'Ajouter une agence | Erreur') {?>
            <?= $error = $validation->getError('txtNomAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtNomAgenceNorm" class="form-label">Pseudo</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtNomAgenceNorm" value="<?= set_value('txtNomAgenceNorm') ?>">
        <?php if ($Titre == 'Ajouter une agence | Erreur') {?>
            <?= $error = $validation->getError('txtNomAgenceNorm'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtNomAgenceNorm" class="form-label">Agence</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtNomAgenceNorm" value="<?= set_value('txtNomAgenceNorm') ?>">
        <?php if ($Titre == 'Ajouter une agence | Erreur') {?>
            <?= $error = $validation->getError('txtNomAgenceNorm'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtEmailAgence" class="form-label">E-Mail</label><span style="color:red">*</span>
        <div class="input-group has-validation">
            <span class="input-group-text">@</span>
        <input type="text" class="form-control" name="txtEmailAgence" value="<?= set_value('txtEmailAgence') ?>">
        </div>
        <?php if ($Titre == 'Ajouter une agence | Erreur') {?>
            <?= $error = $validation->getError('txtEmailAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtNumAgence" class="form-label">Mot de passe</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtNumAgence" value="<?= set_value('txtNumAgence') ?>">
        <?php if ($Titre == 'Ajouter une agence | Erreur') {?>
            <?= $error = $validation->getError('txtNumAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtSigleAgence" class="form-label">Numéro de téléphone 1</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtSigleAgence" value="<?= set_value('txtSigleAgence') ?>">
        <?php if ($Titre == 'Ajouter une agence | Erreur') {?>
            <?= $error = $validation->getError('txtSigleAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtVilleAgence" class="form-label">Numéro de téléphone 2</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtVilleAgence" value="<?= set_value('txtVilleAgence') ?>">
        <?php if ($Titre == 'Ajouter une agence | Erreur') {?>
            <?= $error = $validation->getError('txtVilleAgence'); ?>
        <?php } ?>
    </div>

    <label><span style="color:red">*</span> champs obligatoires</label>
    <div class="col-12">
        <button class="btn btn-primary" style="background-color: #043e6b;" type="submit">Ajouter</button>
    </div>
</form>