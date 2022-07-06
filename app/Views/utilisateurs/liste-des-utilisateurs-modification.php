<?php // icon du lien de redirection
$infos ='<div style="background-color: #043e6b;" class="btn btn-primary"> Modifier <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
  </svg></div>';
$infos2 ='<div class="btn btn-danger"> Supprimer <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></div>';
?>
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
<p class="fs-4"><?php echo $Titre ?></p>
<hr class="mx-auto mx-lg-0 my-5">
<table class="table table-active table-striped text-center align-middle">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Agence</th>
            <th scope="col">E-mail</th>
            <th scope="col">Action</th>
        </tr>
    <thead>
    <tbody>
        <?php
            foreach($lesUtilisateurs as $unUtilisateur => $value) :
                echo '<tr><th scop="row">'.$value->utilisateur_id.'</th><td>'.$value->utilisateur_pseudo.'</td><td>'.$value->agence_nom.'</td><td>'.$value->utilisateur_email.'</td>';
                echo '<td>'. anchor('Utilisateurs/modifier_un_profil_utilisateur/'. $value->utilisateur_id, $infos).' '. anchor('Utilisateurs/supprimer_un_utilisateur/'. $value->utilisateur_id, $infos2) .'</td></tr>';
            endforeach
            ?>
    </tbody>
</table>