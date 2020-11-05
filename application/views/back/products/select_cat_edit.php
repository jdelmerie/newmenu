<select class="custom-select" name="categorie">
    <option selected>Choisir une catégorie</option>
    <?foreach ($categories as $categorie) {?>
        <option <?if($categorie->id == $produit->cat_id){ echo 'selected="selected"'; } ?> value="<?=$categorie->id?>">
            <?=$categorie->name?>
        </option>
    <?}?>
</select>