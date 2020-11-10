<select class="custom-select" name="categorie">
    <option selected>Choisir une catégorie</option>
    <?foreach ($categories as $categorie) {?>
    <option value="<?=$categorie->id?>"><?=$categorie->name?></option>
    <?}?>
</select>