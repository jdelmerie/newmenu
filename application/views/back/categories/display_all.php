<div class="border bg-light p-3 mb-3">
    <h2>Catégories de produits</h2>
</div>

<div class="border bg-light p-4">

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col" class="text-center">ORDRE D'AFFICHAGE</th>
            <th scope="col">CATÉGORIES DE PRODUITS</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <?foreach ($categories as $category) {?>
        <tbody>
            <tr>
                <td class="text-center"><?=$category->rank?></td>
                <td><a href=""><?=ucfirst($category->name)?></a></td>
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
<?} ?>



</div>

<a class="mt-5 btn btn-primary" href="/back/add_category">Créer une catégorie de produits</a>




<!-- TODOS : 
<br>Nombres de produits (à voir après)<br>Achiffer si cette cat a des qty -->