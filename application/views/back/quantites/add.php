<div class="border bg-light p-3 mb-3">
    <h2>Quantités > <?=ucfirst($categorie->name)?></h2>
</div>

<div class="bg-success p-2 text-white small mb-3">
    Les quantités permettent de proposer des produits sous différentes formes. Pour une catégorie Vins, les quantités pourraient être Verre, Pichet et Bouteille.
</div>

<div class="border bg-light p-4">
    <form action="/back/add_quantity_done/<?=$categorie->id?>" method="POST">
        <div class="row">
            <div class="col-6">
                <label class="font-weight-bold">Ajouter une quantité *</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-list-ul"></i></span></div>
                    <input type="text" name="nom" class="form-control" placeholder="ex : Au verre" aria-label="" aria-describedby="basic-addon1" value="<? ?>">
                </div>
            </div>

            <div class="col-6">
                <label class="font-weight-bold">Rang</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-random"></i></span></div>
                    <input type="text" name="rang" class="form-control" placeholder="Ordre d'affichage souhaité" aria-label="" aria-describedby="basic-addon1" value="<? ?>">
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Ajouter cette quantité">
    </form>
 

    <? echo $displayqte?>
</div>

<a class="mt-5 btn btn-primary" href="/back/quantity/">Revenir sur la page des quantités</a>