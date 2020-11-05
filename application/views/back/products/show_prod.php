<div class="mt-3">
    <h3>Produits > <?=$category->name?></h3>
</div>


<table class="table text-center mt-5">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID <i>(à changer après)</i></th>
            <th scope="col">NOM DU PRODUITS</th>
            <th scope="col">DESCRIPTION</th>
            <th scope="col">PRIX</th>
            <th scope="col"></th>
        </tr>
    </thead>

    <?foreach ($produits as $produit) {?>
    <tbody>
        <tr>
            <td><?=$produit->id?></td>
            <td><?=$produit->name?></td>
            <td><?=$produit->composition?></td>
            <td><?=$produit->price?> €</td>
            <td>
                <a class="btn btn-primary" href="/back/edit_product/<?=$produit->id?>">Modifier</a>
                <a class="btn btn-warning" href="/back/delete_product/<?=$produit->id?>">Supprimer</a>
            </td>
        </tr>
    </tbody>
    <?}?>
</table>