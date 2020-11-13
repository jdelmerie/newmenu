<div class="container">
    <div class="text-center m-3">
        <h2>Créer votre établissement</h2>
    </div>
    <hr>
    <div class="bg-success p-2 text-white small mb-3">
        Ce formulaire vous permet de créer votre établissement avant d'accéder au tableau de bord et personnabliser votre carte.
    </div>

    <form action="<?echo base_url('/back/add_etabs') ?>" method="POST">
        <div class="row">
            <div class="col-6">

            <label class="font-weight-bold">Nom de l'établissement *</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-store-alt"></i></span></div>
                    <input type="text" name="nom" class="form-control" placeholder="Nom de l'établissement" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="col-6">

            <label class="font-weight-bold">Adresse web d'accès à votre carte *</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile-alt"> </i>&nbsp;<?echo base_url('/carte/') ?></span></div>
                    <input type="text" name="url" class="form-control" placeholder="Adresse web d'accès à votre carte" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
            <label class="font-weight-bold">Numéro et nom de la rue *</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span></div>
                    <input type="text" name="adresse" class="form-control" placeholder="Numéro et nom de la rue" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="col-3">
                <label class="font-weight-bold">Code Postale *</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span></div>
                    <input type="text" name="code_postale" class="form-control" placeholder="Code Postale" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="col-3">

            <label class="font-weight-bold">Ville *</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-city"></i></span></div>
                    <input type="text" name="ville" class="form-control" placeholder="Ville" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <label class="font-weight-bold">Téléphone</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span></div>
                    <input type="text" name="telephone" class="form-control" placeholder="Téléphone" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="col-6">
            <label class="font-weight-bold">Site web</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-wifi"></i></span></div>
                    <input type="text" name="site" class="form-control" placeholder="Site web" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Créer l'établissement</button>
    </form>
<?if ($this->session->flashdata('error')) {?>
<div class="alert alert-success" role="alert">
  <?echo $this->session->flashdata('error') ?>
</div>
<?}?>
</div>

