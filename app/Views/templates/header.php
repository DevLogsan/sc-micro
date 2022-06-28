<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accueil | SC MICRO / RTW</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>
<body>
<header class="navbar navbar-expand-lg navbar-dark bd-navbar sticky-top" style="background-color: #043e6b;">
    <nav class="container-xxl bd-gutter flex-wrap flex-lg-nowrap">
        <a class="navbar-brand p-0 me-0 me-lg-2" href="<?php echo site_url('Agences/accueil') ?>">
            <img alt="sc-micro" height="50" src="<?php echo img_url('sc-micro.jpg')?>">
        </a>
        <div class="offcanvas-lg offcanvas-end flex-grow-1">
            <div class="offcanvas-body p-4 pt-0 p-lg-0">
                <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2" href="<?php echo site_url('Agences/ajouter_une_agence') ?>">Ajouter une agence</a>
                    </li>
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2" href="<?php echo site_url('Agences/modifier_une_agence') ?>">Modifier une agence</a>
                    </li>
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2 " href="<?php echo site_url('Agences/liste_des_agences') ?>">Liste des agences</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<br>