<div>
    <p class="text-center font-weight-bold text-white bg-info lead p-3"><?=ucfirst($category->name)?></p>
</div>

<? if (isset($produits)) {?>
<ul class="list-group list-group-flush">
    <? foreach($produits as $produit) {?>
        <a href="<? echo base_url("etab/product/$produit->id?etab_id=$etab->id") ?>">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-2">
                        <? if ($produit->image == 0) {?>
                            <img src="<? echo base_url('/assets/img/icons/4-plate.png')?>" width="50px">
                        <?}?>
                    </div>
                    
                    <div class="col-10">
                        <strong><?=ucfirst($produit->name)?>
                            <? if ($produit->prices_categories == 0) {
                                echo "> $produit->price €";
                                } else {
                                echo "";
                            }?>
                        </strong><br>
                        <i>
                            <? if ($produit->composition == '') {
                                echo "";
                                } else {?>
                                <?=ucfirst($produit->composition)?>
                            <?}?>
                        </i>
                    </div>
                </div>
            </li>
        </a>
    <?}?>
</ul>
<? } else {
    echo "<i>Aucun produits renseignés pour l'instant</i>";
} ?>