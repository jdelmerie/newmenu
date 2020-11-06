<hr>
<table class="table text-center">
    <thead class="thead-light">
        <tr>
            <th scope="col">ORDRE D'AFFICHAGE</th>
            <th scope="col">NOM</th>
            <th scope="col">PRIX ??????</th>
        </tr>
    </thead>
    <?foreach ($quantites as $quantity) {?>
    <tbody>
        <tr>
            <td><?=$quantity->rank?></td>
            <td><?=ucfirst($quantity->name)?></td>
            <td>????????????????</td>
        </tr>
    </tbody>
    <?}?>
</table>
