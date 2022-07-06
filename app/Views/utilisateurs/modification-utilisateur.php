<?php
$infos ='<div style="background-color: #043e6b;" class="btn btn-primary"> Modifier le mot de passe
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fingerprint" viewBox="0 0 16 16">
                <path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z"/>
                <path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115V7Zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z"/>
                <path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z"/>
                <path d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z"/>
                <path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49Z"/>
            </svg>
        </div>';
?>
<?php foreach($unUtilisateur as $uneInformation => $value): // le foreach permet d'afficher les données ?>
<hr class="mx-auto mx-lg-0 my-5">
<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo site_url('Utilisateurs/modifier_un_profil_utilisateur/'.$value->utilisateur_id)?>" class="row g-3">

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

    <div class="col-md-4">
        <label for="txtEmailUtilisateur" class="form-label">E-Mail</label><span style="color:red">*</span>
        <div class="input-group has-validation">
            <span class="input-group-text">@</span>
        <input type="text" class="form-control" name="txtEmailUtilisateur" value="<?php echo $value->utilisateur_email ?>">
        </div>
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtEmailUtilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-4">
        <label for="txtNum1Utilisateur" class="form-label">Numéro de téléphone 1</label>
    <input type="text" class="form-control" name="txtNum1Utilisateur" value="<?php echo $value->utilisateur_tel1 ?>">
        <?php if ($Titre == 'Ajouter un utilisateur | Erreur') {?>
            <?= $error = $validation->getError('txtNum1Utilisateur'); ?>
        <?php } ?>
    </div>

    <div class="col-md-4">
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
    <div class="col-1">
        <button class="btn btn-primary" style="background-color: #043e6b;" type="submit">Modifier</button>
    </div>
    <div class="col-6">
    <?php echo anchor('Utilisateurs/modifier_mot_de_passe/'. $value->utilisateur_id, $infos); ?>
    </div>
</form>
<?php endforeach ?>