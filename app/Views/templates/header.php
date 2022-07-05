<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accueil | SC MICRO • RTW</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>
<body>
<header class="navbar navbar-expand-lg navbar-dark bd-navbar sticky-top" style="background-color: #043e6b;">
    <nav class="container-xxl bd-gutter flex-wrap flex-lg-nowrap">
        <a class="navbar-brand p-0 me-0 me-lg-2" href="<?php echo site_url('Agences/accueil') ?>" title="SC Micro">
            <img alt="sc-micro" height="50" src="<?php echo img_url('sc-micro.jpg')?>">
        </a>
        <div class="offcanvas-lg offcanvas-end flex-grow-1">
            <div class="offcanvas-body p-4 pt-0 p-lg-0">
                <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
                    <li class="nav-item dropdown nav-item col-6 col-lg-auto">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Agences</a>
                        <ul class="dropdown-menu">
                            <li class="py-2 px-0 px-lg-2">
                                <a class="text-primary dropdown-item" href="<?php echo site_url('Agences/ajouter_une_agence') ?>">Ajouter une agence</a>
                            </li>
                            <li class="py-2 px-0 px-lg-2">
                                <a class="text-primary dropdown-item" href="<?php echo site_url('Agences/modifier_une_agence') ?>">Modifier une agence</a>
                            </li>
                            <li class="py-2 px-0 px-lg-2">
                                <a class="text-primary dropdown-item" href="<?php echo site_url('Agences/liste_des_agences') ?>">Liste des agences</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown nav-item col-6 col-lg-auto">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Utilisateurs</a>
                        <ul class="dropdown-menu">
                            <li class="py-2 px-0 px-lg-2">
                                <a class="text-primary dropdown-item" href="<?php echo site_url('Utilisateurs/ajouter_un_utilisateur') ?>">Ajouter un utilisateur</a>
                            </li>
                            <li class="py-2 px-0 px-lg-2">
                                <a class="text-primary dropdown-item" href="<?php echo site_url('Utilisateurs/modifier_un_profil_utilisateur') ?>">Modifier un utilisateur</a>
                            </li>
                            <li class="py-2 px-0 px-lg-2">
                                <a class="text-primary dropdown-item" href="<?php echo site_url('Utilisateurs/liste_des_utilisateurs') ?>">Liste des utilisateurs</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2" href="https://jaime.jlogiciels.fr">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                <title>jlogiciels</title>
                                <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="container">
<br>