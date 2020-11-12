<div class="border bg-light p-4">
    <?
    if (isset($etab_perso)){
        echo $etab_perso->presentation;
    } else {
        echo "<i>Présentation non renseignée pour l'instant</i>";
    }
    ?>
</div>