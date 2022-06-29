<p class="fs-4">Ajouter une agence</p>
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
        <label for="txtNomAgence" class="form-label">Nom</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtNomAgence" value="<?= set_value('txtNomAgence') ?>">
        <?php if($validation->getError('txtNomAgence')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('txtNomAgence'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtNomAgenceNorm" class="form-label">Nom (normalisé)</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtNomAgenceNorm" value="<?= set_value('txtNomAgenceNorm') ?>">
        <?php if($validation->getError('txtNomAgenceNorm')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('txtNomAgenceNorm'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtEmailAgence" class="form-label">E-Mail</label><span style="color:red">*</span>
        <div class="input-group has-validation">
            <span class="input-group-text">@</span>
        <input type="text" class="form-control" name="txtEmailAgence" value="<?= set_value('txtEmailAgence') ?>">
        </div>
        <?php if($validation->getError('txtEmailAgence')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('txtEmailAgence'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtNumAgence" class="form-label">Numéro</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtNumAgence" value="<?= set_value('txtNumAgence') ?>">
        <?php if($validation->getError('txtNumAgence')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('txtNumAgence'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtSigleAgence" class="form-label">Sigle</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtSigleAgence" value="<?= set_value('txtSigleAgence') ?>">
        <?php if($validation->getError('txtSigleAgence')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('txtSigleAgence'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtVilleAgence" class="form-label">Ville</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtVilleAgence" value="<?= set_value('txtVilleAgence') ?>">
        <?php if($validation->getError('txtVilleAgence')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('txtVilleAgence'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtAdresse1Agence" class="form-label">Adresse 1</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtAdresse1Agence" value="<?= set_value('txtAdresse1Agence') ?>">
        <?php if($validation->getError('txtAdresse1Agence')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('txtAdresse1Agence'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtAdresse2Agence" class="form-label">Adresse 2</label>
    <input type="text" class="form-control" name="txtAdresse2Agence" value="<?= set_value('txtAdresse2Agence') ?>">
        <?php if($validation->getError('txtAdresse2Agence')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('txtAdresse2Agence'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtCPAgence" class="form-label">Code postal</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtCPAgence" value="<?= set_value('txtCPAgence') ?>">
        <?php if($validation->getError('txtCPAgence')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('txtCPAgence'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-9">
        <label for="txtHoraireAgence" class="form-label">Horaire</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtHoraireAgence" value="<?= set_value('txtHoraireAgence') ?>">
        <?php if($validation->getError('txtHoraireAgence')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('txtHoraireAgence'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-12">
        <div class="form-check">
        <input class="form-check-input" name="txtActiviteAgence" type="checkbox">
        <label class="form-check-label" for="invalidCheck3">
            En activité
        </label>
        </div>
    </div>

    <label><span style="color:red">*</span> champs obligatoires</label>
    <div class="col-12">
        <button class="btn btn-primary" style="background-color: #043e6b;" type="submit">Ajouter</button>
    </div>
    </form>