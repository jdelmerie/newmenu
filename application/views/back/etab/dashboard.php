<div class="border bg-light p-3 mb-3">
    <h2>Tableau de bord</h2>
</div>

<div class="border bg-light p-4">

<div class="row">
    <div class="col-4">
        <div class="p-4">
            <a href="/back/customize">
                <? if (isset($logo)){?>
                    <div class="text-center"><img src="<?php  echo base_url("/uploads/logos/$logo->logo") ?>" width="250px" height="250px"/></div>
                <?}?>
            </a>

            <h4 class="border p-3 text-center bg-info text-white"><?=ucfirst($etab->name)?></h4>

            <address><i class="fas fa-map-marker-alt"></i> Adresse : <?=$etab->adress?> <br> <?=$etab->postal_code?> <?=strtoupper($etab->city)?></address>

            <p><i class="fas fa-phone-alt"></i> Téléphone : <?=$etab->phone?></p>

            <p><i class="fas fa-wifi"></i> Site web : <?=$etab->web_site?></p>

            <span><a href="/back/establishments/">Modifier les informations de contact</a></span>
        </div>
    </div>

    <div class="col-6">

        <h4 class="text-center">Profil de votre établissement</h4>
        <hr>
        <div class="p-3">
            <h5><i class="fas fa-store-alt"></i>&nbsp;<?=ucfirst($etab->name)?></h5>
            <span><a href="/back/establishments/">Modifier le nom de votre établissement</a></span>
        </div>
        
        <div class="p-3">
            <h5><i class="fas fa-folder-plus"></i>&nbsp;Catégories de produits</h5>
            <p>Votre carte contient <?=$count_cat?> catégories.</p>
            <span><a href="/back/newcategory/">Créer une nouvelle catégorie</a></span>
        </div>
        
        <div class="p-3">
            <h5><i class="fas fa-pizza-slice"></i>&nbsp;Produits</h5>
            <p>Votre carte contient <?=$count_prod?> produits.</p>
            <span><a href="/back/add_product/<?=$etab->id?>">Créer un nouveau produit</a></span>
        </div>
    </div>
</div>

</div>