<div class="border bg-light p-3 mb-3">
    <h2>Liste de produits</h2>
</div>

<div class="border bg-light p-4">

    <ul class="nav nav-tabs">
        <?foreach ($categories as $categorie) {?>
            <li class="nav-item">
                <a class="nav-link active" href="/back/display_products/<?=$categorie->id?>"><?=ucfirst($categorie->name)?></a>
            </li>
        <?}?>
    </ul>

    <div>
        <? echo $display_produits ?>
    </div>

<?if ($this->session->flashdata('error')) {?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<?echo $this->session->flashdata('error'); ?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?} else if ($this->session->flashdata('success_edit')) {?>
<div class="alert alert-success" role="alert">
<?echo $this->session->flashdata('success_edit') ?>
</div>
<?} else if ($this->session->flashdata('succes_del')) {?>
<div class="alert alert-success" role="alert">
<?echo $this->session->flashdata('succes_del') ?>
</div>
<?}?>
</div>

<a class="mt-5 btn btn-primary" href="/back/add_product">Ajouter un nouveau produit</a>