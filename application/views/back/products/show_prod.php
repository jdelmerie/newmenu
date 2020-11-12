<div class="mt-3">
    <h3>Produits > <?=ucfirst($category->name)?></h3>
</div>


<table class="table mt-5">
    <thead class="thead-light">
        <tr>
            <th scope="col"></th>
            <th scope="col">ORDRE</th>
            <th scope="col">NOM DU PRODUITS</th>
            <th scope="col">COMPOSITIONS</th>
            <th scope="col">PRIX</th>
            <th scope="col"></th>
        </tr>
    </thead>

    <?foreach ($produits as $produit) {?>
    <tbody>
        <tr>
            <td><img src="<? echo base_url('/assets/img/icons/4-plate.png')?>" width="50px"></td>
            <td><?=$produit->rank?></td>
            <td><?=ucfirst($produit->name)?></td>
            <td><?=$produit->composition?></td>
            <td>
                <!-- PRIX PAR TYPE -->
                <?if (isset($prod_prices)) {?>

                    <? foreach($prod_prices as $prod_price) {?>
                        <li style="list-style: none;">
                            <?if ($prod_price->linkprodid == $produit->id) {?>
                                <?=ucfirst($prod_price->pricename)?> : <?=$prod_price->price?> €
                            <?}?>
                        </li>
                    <?}?>
                <?} else {?>
                    
                <!-- PRIX UNIQUE -->
                    <span><?=$produit->price?> €</span>
                <?}?>
            </td>
            <td>
                <a class="btn btn-primary" href="/back/edit_product/<?=$produit->id?>">Modifier</a>
                <a class="btn btn-warning" href="/back/delete_product/<?=$produit->id?>">Supprimer</a>
            </td>
        </tr>
    </tbody>
    <?}?>
</table>
