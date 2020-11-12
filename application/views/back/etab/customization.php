<div class="border bg-light p-3 mb-3">
    <h2>Personnalisation</h2>
</div>

<div class="border bg-light p-4">

    <div class="bg-success p-2 text-white small mb-3">
        La fonction "Aperçu de votre carte" vous permet d'avoir un rendu sur différents supports.
    </div>

    <div class="pt-3 pb-3">
        <label class="font-weight-bold">Aperçu de votre carte</label><br>
        <a class="btn btn-info" href="<? echo base_url("/etab/display/$etab_id") ?>" target='_blank'>Aperçu sur votre écran</a>
        <a class="btn btn-info disabled" href="">Aperçu smartphone</a>
        <a class="btn btn-info disabled" href="">Aperçu tablette</a>
    </div>

    <hr>

    <div class="bg-success p-2 text-white small mb-3">
        Téléchargez votre logo, il s'affichera automatiquement dans différents endroits de votre carte.
    </div>

    <div class="pt-3 pb-3">
        <label class="font-weight-bold">Logo de votre établissement</label><br>
        <div class="row">

            <div class="col-6">
                <?if (!isset($etab_perso->logo)) {?>
                <i>Aucun logo défini.</i><br><br>
                <?} else {?>
                <img src="<?php echo base_url("/uploads/logos/" . $etab_perso->logo); ?>" width="250px" height="250px"/><br><br>
                <?}?>
            </div>

            <div class="col-6">

                <form action="<?echo base_url('back/upload_logo') ?>" method="POST" enctype="multipart/form-data">
                    <input type="file" name="logo" size="5" /><br><br>
                    <input type="submit" value="Changer" /><br><br>
                    <i class="text-danger font-weight-bold">Votre image doit faire moins de 5Mo.</i><br>
                </form>

                <?if ($this->session->flashdata('error_upload')) {?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?echo $this->session->flashdata('error_upload'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?}?>
            </div>
        </div>
    </div>
    <hr>
    
    <div class="bg-success p-2 text-white small mb-3">
        Décrivez votre établissement, donnez les informations telles que les horaires d'ouverture, ce qui vous démarque des autres,... Cette présentation sera la page d'accueil de votre carte.
    </div>
    
    <div class="pt-3 pb-3">
        <label class="font-weight-bold">Présentation de votre établissement</label><br>
        <form action="<? echo base_url('back/presentation_etab') ?>" method="post">
            <textarea name="presentation" id="" cols="130" rows="10">
                <? if (isset($etab_perso)){
                        echo html_escape($etab_perso->presentation);
                    } else {
                        echo "";
                    }?>
            </textarea><br><br>
            <input class="btn btn-primary" type="submit" value="Enregistrer">
        </form>
    </div>

    <hr>

    <!-- <div class="bg-success p-2 text-white small mb-3">
        Modifier l'image de fond de votre carte pour mieux refléter l'image de votre établissement. Notez que ces images sont des motifs qui sont répétés pour remplir entièrement les dimensions de l'écran.
    </div>
    <label class="font-weight-bold">Présentation de votre établissement</label><br>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">Ne pas utiliser d'image (le fond de votre carte sera blanc par défaut).</label>
        </div>
        <br>
        <div>
            <form action="" method="POST">
                <a href=""><img src="<? /*echo base_url("/assets/img/background/bck-1.jpg")*/ ?>" width="150px" height="150px"></a>
                <a href=""><img src="<? /*echo base_url("/assets/img/background/bck-2.jpg") */ ?>" width="150px" height="150px"></a>
                <a href=""><img src="<? /*echo base_url("/assets/img/background/bck-3.jpg") */ ?>" width="150px" height="150px"></a>
            </form>
        </div> -->
</div>
