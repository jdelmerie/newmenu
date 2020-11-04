<div class="border bg-light p-3 mb-3">
    <h2>Etablissement</h2>
</div>

<div class="border bg-light p-4">


<div class="bg-success p-2 text-white small mb-3">
    Ce formulaire correspond aux informations de base de votre établissement telles que son nom, son adresse, etc... L'adresse web d'accès à votre carte est très importante.
</div>

<? if ($this->session->flashdata('success_update')) { ?>
    <hr>
    <div class="alert alert-success" role="alert">
        <? echo $this->session->flashdata('success_update'); ?>
    </div>
<?}?>

<form action="<?echo base_url('/back/edit_etabs') ?>" method="POST">
    <div class="row">
        <div class="col-5">
            <label class="font-weight-bold">Nom de l'établissement *</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-store-alt"></i></span></div>
                <input type="text" name="nom" class="form-control" placeholder="Nom de l'établissement" aria-label="" value="<?echo html_escape($etab->name)?>" aria-describedby="basic-addon1">
            </div>
        </div>

        <div class="col-5">
            <label class="font-weight-bold">Adresse web d'accès à votre carte *</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile-alt"> </i>&nbsp;<?echo base_url() ?></span></div>
                <input type="text" name="url" class="form-control" placeholder="votreetablissement" aria-label="" value="<?echo html_escape($etab->url)?>" aria-describedby="basic-addon1">
            </div>
        </div>   
    </div>

    <div class="row">
        <div class="col-5">
            <label class="font-weight-bold">Numéro et nom de la rue *</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span></div>
                <input type="text" name="adresse" class="form-control" placeholder="Numéro et nom de la rue" aria-label="" value="<?echo html_escape($etab->adress)?>" aria-describedby="basic-addon1">
            </div>
        </div>

        <div class="col-3">
            <label class="font-weight-bold">Code Postale *</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span></div>
                <input type="text" name="code_postale" class="form-control" placeholder="Code Postale" aria-label="" value="<?echo html_escape($etab->postal_code)?>" aria-describedby="basic-addon1">
            </div>
        </div>

        <div class="col-3">
            <label class="font-weight-bold">Ville *</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-city"></i></span></div>
                <input type="text" name="ville" class="form-control" placeholder="Ville" aria-label="" aria-describedby="basic-addon1" value="<?echo html_escape($etab->city)?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-5">
        <label class="font-weight-bold">Téléphone *</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span></div>
                <input type="text" name="telephone" class="form-control" placeholder="Téléphone" aria-label="" aria-describedby="basic-addon1" value="<?echo html_escape($etab->phone)?>">
            </div>
        </div>

        <div class="col-5">
        <label class="font-weight-bold">Site web *</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-wifi"></i></span></div>
                <input type="text" name="site" class="form-control" placeholder="Site web" aria-label="" aria-describedby="basic-addon1" value="<?echo html_escape($etab->web_site)?>">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer les informations de l'établissement</button>
</form>
<?if ($this->session->flashdata('error')) {?>
<div class="alert alert-success" role="alert">
  <?echo $this->session->flashdata('error') ?>
</div>
<?}?>

</div>
