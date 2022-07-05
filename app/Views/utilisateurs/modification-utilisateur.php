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
<?php foreach($unUtilisateur as $uneInformation => $value): // le foreach permet d'afficher les données ?>
<hr class="mx-auto mx-lg-0 my-5">
<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo site_url('Utilisateurs/modification-utilisateur')?>" class="row g-3">

    <div class="col-md-4">
        <label for="txtLoginUtilisateur" class="form-label">Login</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtLoginUtilisateur" value="<?php echo $value->utilisateur_login ?>">
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtLoginUtilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-4">
        <label for="txtPseudoUtilisateur" class="form-label">Pseudo</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtPseudoUtilisateur" value="<?php echo $value->utilisateur_pseudo ?>">
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
        <input type="text" class="form-control" name="txtEmailUtilisateur" value="<?php echo $value->utilisateur_email ?>">
        </div>
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtEmailUtilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtMotdepasseUtilisateur" class="form-label">Mot de passe</label><span style="color:red">*</span>
    <input type="text" class="form-control" name="txtMotdepasseUtilisateur" value="<?php // echo $value->utilisateur_pass_hash ?>">
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtMotdepasseUtilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtNum1Utilisateur" class="form-label">Numéro de téléphone 1</label>
    <input type="text" class="form-control" name="txtNum1Utilisateur" value="<?php echo $value->utilisateur_tel1 ?>">
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtNum1Utilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-3">
        <label for="txtNum2Utilisateur" class="form-label">Numéro de téléphone 2</label>
    <input type="text" class="form-control" name="txtNum2Utilisateur" value="<?php echo $value->utilisateur_tel2 ?>">
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtNum2Utilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-12">
        <div class="form-check">
            <?php
                if ($value->utilisateur_statut_blocage == 1) { // vérification de l'etat de l'entreprise
                    echo '<input class="form-check-input" name="txtUtilisateurStatutBlocage" type="checkbox" checked>';
                }
                else
                {
                    echo '<input class="form-check-input" name="txtUtilisateurStatutBlocage" type="checkbox">';
                }
            ?>
        <label class="form-check-label">
            Bloqué
        </label>
        </div>
    </div>

    <div class="col-12">
        <div class="form-check">
            <?php
                if ($value->utilisateur_niveau_acces == 1) { // vérification de l'etat de l'entreprise
                    echo '<input class="form-check-input" name="txtUtilisateurNiveauAcces" type="checkbox" checked>';
                }
                else
                {
                    echo '<input class="form-check-input" name="txtUtilisateurNiveauAcces" type="checkbox">';
                }
            ?>
        <label class="form-check-label">
            Administrateur
        </label>
        </div>
    </div>

    <label><span style="color:red">*</span> champs obligatoires</label>
    <div class="col-12">
        <button class="btn btn-primary" style="background-color: #043e6b;" type="submit">Ajouter</button>
    </div>
</form>
<?php endforeach ?>