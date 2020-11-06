<label class="font-weight-bold">Prix</label>
<? foreach($catprice as $cat) {?>
<div class="input-group">
    <span style="width: 25%" class="input-group-text"><?=ucfirst($cat->name)?></span>
    <input name="price[<?$cat->id?>]" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="<? ?>">
    <div class="input-group-append"><span class="input-group-text"><i class="fas fa-dollar-sign"></i></span></div>
</div>
<?}?>
