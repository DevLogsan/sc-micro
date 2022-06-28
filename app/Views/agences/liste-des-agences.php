<?php // icon du lien de redirection
$infos ='<div class="btn btn-success"> Voir plus <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
        </svg></div>';
?>
<p class="fs-4">Liste des agences</p>
<hr class="mx-auto mx-lg-0 my-5">
<table class="table table-active table-striped text-center align-middle">
    <thead class="">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Numéro</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
        </tr>
    <thead>
    <tbody>
        <?php
            foreach ($lesAgences as $uneAgence) :
                echo '<tr><th scope="row">'. $uneAgence["agence_id"] .'</th><td>'. $uneAgence["agence_nom"] .'</td><td>'. $uneAgence["agence_tel"] .'</td><td>'. $uneAgence["agence_email"] .'</td>';
                echo '<td>'. anchor('Agences/details_agence/'. $uneAgence["agence_id"], $infos) .'</td></tr>';
            endforeach
            ?>
    </tbody>
</table>