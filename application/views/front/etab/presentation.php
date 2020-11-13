<div class="border p-4 text-center">
    <?
    if (isset($etab_perso)){
        echo $etab_perso->presentation;
    } else if ($etab_perso->presentation == ''){
        echo "<i>Présentation non renseignée pour l'instant</i>";
    }
    ?>
</div>