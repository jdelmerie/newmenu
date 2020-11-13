<div class="container">
    <div class="m-5">
        <h3>Inscription</h3>
        <h4>Pour vous inscrire, il vous suffit de renseigner votre email et un mot de passe.</h4>
        <i>Vous recevrez un email d'activation à l'adresse e-mail que vous avez indiquée afin de confirmer votre inscription.</i>
        <br><br>
        <div class="col-6">
            <form action="<?echo base_url('/welcome/register'); ?>" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Votre email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Votre mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    <small id="emailHelp" class="form-text text-muted">Votre mot de passe doit compter au minimum 8 caractères.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirmation de votre mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="confirmpassword">
                </div>
                <button type="submit" class="btn btn-primary">Inscription</button>
            </form><br>
<?if ($this->session->flashdata('success')) {?>
<div class="alert alert-success" role="alert">
  <?echo $this->session->flashdata('success') ?>
</div>
<?} else if ($this->session->flashdata('error')) {?>
<div class="alert alert-warning" role="alert">
<?echo $this->session->flashdata('error') ?>
</div>
<?}?>
        <a href="<? echo base_url('/welcome/index')?>">Revenir à la page d'accueil</a>
    </div>
</div>
