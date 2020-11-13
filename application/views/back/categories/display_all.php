<div class="border bg-light p-3 mb-3">
    <h2>Catégories de produits</h2>
</div>

<div class="border bg-light p-4">

<table class="table">
    <thead class="thead-light">
        <tr class="small">
            <th class="text-center" style="width:10%;" scope="col"></th>
            <th class="text-center" style="width:10%;" scope="col">ORDRE</th>
            <th style="width:50%;" scope="col">CATÉGORIES DE PRODUITS</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <?foreach ($categories as $category) {?>
        <tbody>
            <tr>
                <? if ($category->image == 0) {?>
                <td><img src="<? echo base_url('/assets/img/icons/4-plate.png')?>" width="50px"></td>
                <?}?>
                <td class="text-center"><?=$category->id?></td>
                <td>
                    <a href="/back/edit_category/<?=$category->id?>"><?=ucfirst($category->name)?></a>
                    <p><?=$category->description?></p>
                </td>
                <td class="text-center">
                    <a class="btn btn-primary" href="/back/edit_category/<?=$category->id?>">Modifier</a>
                    <a class="btn btn-warning" href="/back/delete_category/<?=$category->id?>">Supprimer</a>
                </td>
            </tr>
        </tbody>
        <?}?>
</table>

<?if ($this->session->flashdata('success_edit')) {?>
<div class="alert alert-success" role="alert">
  <?echo $this->session->flashdata('success_edit') ?>
</div>
<?} else if ($this->session->flashdata('error')) {?>
<div class="alert alert-danger" role="alert">
<?echo $this->session->flashdata('error') ?>
</div>
<?} else if ($this->session->flashdata('success_del')) {?>
<div class="alert alert-success" role="alert">
<?echo $this->session->flashdata('success_del') ?>
</div>
<?} else if ($this->session->flashdata('success_add')) {?>
<div class="alert alert-success" role="alert">
<?echo $this->session->flashdata('success_add') ?>
</div>
<?} else if ($this->session->flashdata('alert')) {?>
<div class="alert alert-warning" role="alert">
<?echo $this->session->flashdata('alert') ?>
</div>
<?} else if ($this->session->flashdata('succes_del')) {?>
<div class="alert alert-success" role="alert">
<?echo $this->session->flashdata('succes_del') ?>
</div>
<?}?>



</div>

<a class="mt-5 btn btn-primary" href="/back/add_category">Créer une catégorie de produits</a>
