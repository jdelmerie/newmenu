<div class="border bg-light p-3 mb-3">
    <h2>Quantités</h2>
</div>

<div class="bg-success p-2 text-white small mb-3">
    Pour ajouter des quantités, cliquez sur une catégorie.
</div>

<div class="border bg-light p-4">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col"></th>
                <th scope="col">CATÉGORIES DE PRODUITS</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <?foreach ($categories as $category) {?>
            <tbody>
                <tr>
                    <td></td>
                    <td>
                        <a href="/back/add_quantity/<?=$category->id?>"><?=ucfirst($category->name)?></a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-primary" href="/back/edit_quantity/<?=$category->id?>">Modifier</a>
                    </td>
                </tr>
            </tbody>
            <?}?>
    </table>
</div>
<br>
<?if ($this->session->flashdata('no_qty')) {?>
<div class="alert alert-warning" role="alert">
<?echo $this->session->flashdata('no_qty') ?>
</div>
<?} else if ($this->session->flashdata('succes_del')) {?>
<div class="alert alert-danger" role="alert">
<?echo $this->session->flashdata('succes_del') ?>
</div>
<?}?>