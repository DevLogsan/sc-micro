<hr class="mx-auto mx-lg-0 my-5">

<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo site_url('Agences/modifier_une_agence/'.$uneAgence['agence_id'])?>" class="row g-3">

    <div class="col-md-3">
        <label for="txtNomAgence" class="form-label">Nom</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtNomAgence" value="<?php echo $uneAgence['agence_nom'] ?>">
        <?php if ($Titre == 'Liste des agences modifiables | Erreur') {?>
            <?= $error = $validation->getError('txtNomAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtNomAgenceNorm" class="form-label">Nom (normalisé)</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtNomAgenceNorm" value="<?php echo $uneAgence['agence_nom_normalise'] ?>">
        <?php if ($Titre == 'Liste des agences modifiables | Erreur') {?>
            <?= $error = $validation->getError('txtNomAgenceNorm'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtEmailAgence" class="form-label">E-Mail</label><span style="color:red">*</span>
        <div class="input-group has-validation">
            <span class="input-group-text">@</span>
        <input type="text" class="form-control" name="txtEmailAgence" value="<?php echo $uneAgence['agence_email'] ?>">
        </div>
        <?php if ($Titre == 'Liste des agences modifiables | Erreur') {?>
            <?= $error = $validation->getError('txtEmailAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtNumAgence" class="form-label">Numéro</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtNumAgence" value="<?php echo $uneAgence['agence_tel'] ?>">
        <?php if ($Titre == 'Liste des agences modifiables | Erreur') {?>
            <?= $error = $validation->getError('txtNumAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtSigleAgence" class="form-label">Sigle</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtSigleAgence" value="<?php echo $uneAgence['agence_sigle'] ?>">
        <?php if ($Titre == 'Liste des agences modifiables | Erreur') {?>
            <?= $error = $validation->getError('txtSigleAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtVilleAgence" class="form-label">Ville</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtVilleAgence" value="<?php echo $uneAgence['agence_ville'] ?>">
        <?php if ($Titre == 'Liste des agences modifiables | Erreur') {?>
            <?= $error = $validation->getError('txtVilleAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtAdresse1Agence" class="form-label">Adresse 1</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtAdresse1Agence" value="<?php echo $uneAgence['agence_adresse1'] ?>">
        <?php if ($Titre == 'Liste des agences modifiables | Erreur') {?>
            <?= $error = $validation->getError('txtAdresse1Agence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtAdresse2Agence" class="form-label">Adresse 2</label>
    <input type="text" class="form-control" name="txtAdresse2Agence" value="<?php echo $uneAgence['agence_adresse2'] ?>">
    </div>

    <div class="col-md-3">
        <label for="txtCPAgence" class="form-label">Code postal</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtCPAgence" value="<?php echo $uneAgence['agence_code_postal'] ?>">
        <?php if ($Titre == 'Liste des agences modifiables | Erreur') {?>
            <?= $error = $validation->getError('txtCPAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-md-9">
        <label for="txtHoraireAgence" class="form-label">Horaire</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtHoraireAgence" value="<?php echo $uneAgence['agence_horaires'] ?>">
        <?php if ($Titre == 'Liste des agences modifiables | Erreur') {?>
            <?= $error = $validation->getError('txtHoraireAgence'); ?>
        <?php } ?>
    </div>

    <div class="col-12">
        <div class="form-check">
            <?php
                if ($uneAgence['agence_etat'] == 1) { // vérification de l'etat de l'entreprise
                    echo '<input class="form-check-input" name="txtActiviteAgence" type="checkbox" checked>';
                }
                else
                {
                    echo '<input class="form-check-input" name="txtActiviteAgence" type="checkbox">';
                }
            ?>
        <label class="form-check-label">
            En activité
        </label>
        </div>
    </div>

    <label><span style="color:red">*</span> champs obligatoires</label>
    <div class="col-12">
        <button class="btn btn-primary" style="background-color: #043e6b;" type="submit">Modifier</button>
    </div>
</form>