<hr>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th></th>
            <th scope="col">ORDRE D'AFFICHAGE</th>
            <th scope="col">NOM</th>
        </tr>
    </thead>
    <?foreach ($quantites as $quantity) {?>
    <tbody>
        <tr>
            <td></td>
            <td><?=$quantity->rank?></td>
            <td><?=ucfirst($quantity->name)?></td>
        </tr>
    </tbody>
    <?}?>
</table>
