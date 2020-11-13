<hr>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th style="width:10%;"></th>
            <th style="width:20%;"scope="col" class="text-center">ORDRE D'AFFICHAGE</th>
            <th style="width:50%;"scope="col">NOM</th>
        </tr>
    </thead>
    <?foreach ($quantites as $quantity) {?>
    <tbody>
        <tr>
            <td></td>
            <td class="text-center"><?=$quantity->rank?></td>
            <td><?=ucfirst($quantity->name)?></td>
        </tr>
    </tbody>
    <?}?>
</table>
