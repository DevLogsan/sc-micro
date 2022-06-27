<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accueil | SC MICRO / RTW</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo css_url('style_navbar') ?>" rel="stylesheet" type="text/css">
    </head>
<body> 
<div class="navbar">
    <?php echo anchor('Agences/accueil', 'Accueil') ?>
    <a href="<?php echo site_url('Agences/ajouter_une_agence') ?>">Ajouter une agence</a>
    <a href="<?php echo site_url('Agences/modifier_une_agence') ?>">Modifier une agence</a>
    <a href="<?php echo site_url('Agences/liste_des_agences') ?>">Liste des agences</a>
</div>
<br>