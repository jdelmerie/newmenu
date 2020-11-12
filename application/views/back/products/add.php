<div class="border bg-light p-3 mb-3">
    <h2>Ajouter un produit</h2>
</div>
<div class="bg-success p-2 text-white small mb-3">
    Cette page vous permet d'ajouter un produit à votre carte. N'oubliez pas de l'associer à une de vos catégories.  
</div>

<div class="border bg-light p-4">

    <form action="<? echo base_url('/back/add_product_done') ?>" method="POST">
    
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
                    <input type="text" name="nom" class="form-control" placeholder="Nom du produits" aria-label="" aria-describedby="basic-addon1" value="<? ?>">
                </div>
            </div>

            <div class="col-6">
            <label class="font-weight-bold">Description</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-info-circle"></i></span></div>
                    <input type="text" name="description" class="form-control" placeholder="La composition ou la description du produit" aria-label="" aria-describedby="basic-addon1" value="<? ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
            <label class="font-weight-bold">Prix</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span></div>
                    <input type="text" name="prix" class="form-control" placeholder="0" aria-label="" aria-describedby="basic-addon1" value="<? ?>">
                </div>
            </div>

            <div class="col-6">
            <label class="font-weight-bold">Ordre</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-random"></i></span></div>
                    <input type="text" name="rang" class="form-control" placeholder="Ordre d'affichage" aria-label="" aria-describedby="basic-addon1" value="<? ?>">
                </div>
            </div>
        </div>
        <hr>

        <!-- <div class="row">
            <div class="col-6">
            <label class="font-weight-bold">Image du produit</label>
                <div class="input-group mb-3">
                    <input type="file" name="photo">
                </div>
                <i class="text-danger font-weight-bold">Votre image doit faire moins de 8Mo.</i><br>
            </div>
        </div> -->
        
        <br>
        <button type="submit" class="btn btn-primary">Ajouter ce produit</button>
    </form> 

</div>
