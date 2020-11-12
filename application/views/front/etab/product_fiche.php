<div class="font-weight-bold text-white bg-info p-2 flex retour">
    <div><a class="retour" href="<? echo base_url("etab/category/$category->id?etab_id=$etab->id") ?>"><i class="fas fa-arrow-left"></i></a></div>
    <h1 class="text-center"><?=ucfirst($produit->name)?></h1>
</div>

<div class="flex fiche">
    <div class="p-5 text-center product-card">
        <? if ($produit->image == 0) {?>
            <img src="<? echo base_url('/assets/img/icons/4-plate.png')?>">
        <?}?>
        <p><strong><?=ucfirst($category->name)?> > <?=ucfirst($produit->name)?></strong></p>
        <p><?=$produit->composition?></p>
        <? if ($produit->prices_categories == 0) {?>
            <p><strong><?=$produit->price?> €</strong></p>
        <?} else {?>
            <ul class="list-group list-group-flush">
            <? foreach($prod_prices as $prod_price) {?>
                <li class="list-group-item">
                    <?=ucfirst($prod_price->pricename) ?> : <?=$prod_price->price?> €
                </li>
                <?}?>
            </ul>
        <?}?>    
    </div>
</div>
