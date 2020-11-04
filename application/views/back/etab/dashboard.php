<div class="border bg-light p-3 mb-3">
    <h2>Tableau de bord</h2>
</div>

<div class="row">
    <div class="col-4">
        <a href="/dashboard/editstyle">
            <div class="border p-3 mb-3 text-center"><i class="fas fa-store-alt"></i></div>
        </a>

        <h5><?=ucfirst($etab->name)?></h5>

        <address><i class="fas fa-map-marker-alt"></i> Adresse : <?=$etab->adress?> <br> <?=$etab->postal_code?> <?=strtoupper($etab->city)?></address>

        <p><i class="fas fa-phone-alt"></i> Téléphone : <?=$etab->phone?></p>

        <p><i class="fas fa-wifi"></i> Site web : <?=$etab->web_site?></p>
    </div>

    <div class="col-6">

        <h4 class="text-center">Profil de votre établissement</h4>
        <hr>
        <div class="p-3">
            <h5><i class="fas fa-store-alt"></i>&nbsp;<?=ucfirst($etab->name)?></h5>
            <span><a href="/back/establishments/">Modifier le nom de votre établissement</a></span>
        </div>
        
        <div class="p-3">
            <h5>Catégories de produits</h5>
            <p>Votre carte contient <??> catégories.</p>
            <span><a href="/dashboard/new_category/<?=$etab->id?>">Créer une nouvelle catégorie</a></span>
        </div>
        
        <div class="p-3">
            <h5>Produits</h5>
            <p>Votre carte contient <??> produits.</p>
            <span><a href="/dashboard/add_product/<?=$etab->id?>">Créer un nouveau produit</a></span>
        </div>
    </div>
</div>