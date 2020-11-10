<div class="border bg-light p-3 mb-3">
    <h2>Catégories de produits > <?=ucfirst($category->name)?></h2>
</div>
<div class="bg-success p-2 text-white small mb-3">
    Les catégories de produits vous permettent de classer vos produits par groupe (ex : Entrées, Plats, Desserts, etc...).  
</div>

<div class="border bg-light p-4">
    <form action="<? echo base_url("/back/edit_category_done/$category->id") ?>" method="POST">   
        <div class="row">
            <div class="col-4">
                <label class="font-weight-bold">Nom de la catégorie *</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-folder-plus"></i></span></div>
                    <input type="text" name="nom" class="form-control" placeholder="ex : Nos plats" aria-label="" aria-describedby="basic-addon1" value="<? echo html_escape($category->name) ?>">
                </div>
            </div>

            <div class="col-8">
                <label class="font-weight-bold">Description</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-info-circle"></i></span></div>
                    <input type="text" name="description" class="form-control" placeholder="ex : Tous les plats sont servis avec des frites" aria-label="" aria-describedby="basic-addon1" value="<? echo html_escape($category->description) ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <label class="font-weight-bold">Ordre</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-random"></i></span></div>
                <input type="text" name="rang" class="form-control" placeholder="Ordre d'affichage souhaité" aria-label="" aria-describedby="basic-addon1" value="<? echo html_escape($category->rank)  ?>">
                </div>
            </div>
        </div>
        <hr>

        <input type="submit" class="btn btn-primary" value="Modifier cette catégorie de produits">
        <a class="btn btn-warning" href="">Supprimer cette catégorie de produits</a>
    </form>
</div>