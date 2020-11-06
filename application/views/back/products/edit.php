<div class="border bg-light p-3 mb-3">
    <h2><?=ucfirst($category->name)?> > <?=ucfirst($produit->name)?></h2>
</div>
<div class="bg-success p-2 text-white small mb-3">
    Cette page vous permet de modifier les informations d'un produit.
</div>

<div class="border bg-light p-4">

    <form action="<? echo base_url("/back/edit_product_done/$produit->id") ?>" method="POST">

    <input type="hidden" name="prod_id" value="<?=$produit->id?>">
    <input type="hidden" name="cat_id" value="<?=$produit->cat_id?>">
    
        <div class="row">
            <div class="col-6">
                <div>
                    <p class="font-weight-bold">Catégorie de produits *</p>
                    <? echo $display_categories; ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
            <label class="font-weight-bold">Nom du produit *</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pizza-slice"></i></span></div>
                    <input type="text" name="nom" class="form-control" placeholder="Nom du produits" aria-label="" aria-describedby="basic-addon1" value="<? echo html_escape($produit->name) ?>">
                </div>
            </div>

            <div class="col-6">
            <label class="font-weight-bold">Description</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-info-circle"></i></span></div>
                    <input type="text" name="description" class="form-control" placeholder="La composition ou la description du produit" aria-label="" aria-describedby="basic-addon1" value="<? echo html_escape($produit->composition) ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <? echo $displayprice?>
            </div>

            <div class="col-6">
                <label class="font-weight-bold">Ordre</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-random"></i></span></div>
                    <input type="text" name="rang" class="form-control" placeholder="Ordre d'affichage" aria-label="" aria-describedby="basic-addon1" value="<? echo html_escape($produit->rank) ?>">
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-6">
            <label class="font-weight-bold">Image du produit</label>
                <div class="input-group mb-3">
                    <input type="file" name="photo">
                </div>
                <i class="text-danger font-weight-bold">Votre image doit faire moins de 8Mo.</i><br>
            </div>
        </div>

        <br>

        <strong>TODOS : penser à connecter les switch à la bdd</strong>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">Ne pas proposer ce produit à la carte</label>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch2">
            <label class="custom-control-label" for="customSwitch2">Produit en rupture de stock</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        <a class="btn btn-warning" href="/back/delete_product/<?=$produit->id?>">Supprimer ce produit</a>
    </form>

</div>
