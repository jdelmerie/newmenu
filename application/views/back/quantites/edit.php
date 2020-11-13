<div class="border bg-light p-3 mb-3">
    <h2>Quantités > <?=ucfirst($categorie->name)?></h2>
</div>

<div class="bg-success p-2 text-white small mb-3">
    Les quantités permettent de proposer des produits sous différentes formes. Pour une catégorie Vins, les quantités pourraient être Verre, Pichet et Bouteille.
</div>
<?if ($this->session->flashdata('succes_qty')) {?>
<div class="alert alert-success" role="alert">
<?echo $this->session->flashdata('succes_qty') ?>
</div>
<?} else if ($this->session->flashdata('error')) {?>
<div class="alert alert-danger" role="alert">
<?echo $this->session->flashdata('error') ?>
</div>
<?} else if ($this->session->flashdata('succes_del')) {?>
<div class="alert alert-danger" role="alert">
<?echo $this->session->flashdata('succes_del') ?>
</div>
<?}?>
<div class="border bg-light p-4">

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th class="text-center"style="width:20%;" scope="col">ORDRE D'AFFICHAGE</th>
                <th style="width:40%;" scope="col">NOM</th>
                <th style="width:10%;" scope="col">SUPPRIMER</th>
            </tr>
        </thead>
        <?foreach ($quantites as $quantity) {?>
        <tbody>
            <tr>
                <td class="text-center"><?=$quantity->rank?></td>
                <td>
                    <form action="<? echo base_url("/back/edit_single_quantity/$quantity->id") ?>" method="POST">
                        <div class="input-group mb-3">
                            <input type="hidden" name="cat_id" value="<?=$categorie->id?>">

                            <input type="text" class="form-control" value="<?=$quantity->name?>" name="qtyname" aria-describedby="button-edit">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-edit">Modifier</button>
                            </div>
                        </div>
                    </form>
                </td>
                <td><a class="btn btn-warning" href="/back/delete_quantity/<?=$quantity->id?>">Supprimer</a></td>
            </tr>
        </tbody>
        <?}?>
    </table>
</div>

<a class="mt-5 btn btn-primary" href="/back/quantity">Revenir en arrière</a>