<div position: absolute;>
    <nav>
        <ul>
            <p>Agences :</p>
            <?php
                foreach ($lesAgences as $uneAgence) :
                    echo '<h5>' . anchor('Agences/details_agence/' . $uneAgence["agence_id"], $uneAgence["agence_nom"]) . '</h5>';
                endforeach
            ?>
        </ul>
    </nav>
</div>