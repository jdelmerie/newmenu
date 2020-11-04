<?if ($this->session->flashdata('sucess')) {?>
<div class="alert alert-success" role="alert">
  <?echo $this->session->flashdata('sucess') ?>
</div>
<?} else if ($this->session->flashdata('error')) {?>
<div class="alert alert-warning" role="alert">
<?echo $this->session->flashdata('error') ?>
</div>
<?}?>