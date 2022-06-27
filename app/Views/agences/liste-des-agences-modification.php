<div position: absolute;>
    <nav>
        <ul>
            <p>Agences à modifier:</p>
            <?php
                foreach ($lesAgences as $uneAgence) :
                    echo '<h5>' . anchor('Agences/modifier_une_agence/' . $uneAgence["agence_id"], $uneAgence["agence_nom"]) . '</h5>';
                endforeach
            ?>
        </ul>
    </nav>
</div>