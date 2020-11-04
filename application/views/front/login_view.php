<div class="container">
    <div class="m-5">
        <h3>Connexion</h3>
        <h4>Connectez-vous à votre interface admin</h4>
        <br>
        <div>
            <form action="<?echo base_url('/welcome/connexion'); ?>" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Votre email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Votre mot de Passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <a href="/welcome/forgotten_password">Mot de passe oublié ?</a><br>
            <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
            <hr>
<?if ($this->session->flashdata('success_valid')) {?>
<div class="alert alert-success" role="alert">
  <?echo $this->session->flashdata('success_valid') ?>
</div>
<?} else if ($this->session->flashdata('success_signin')) {?>
<div class="alert alert-success" role="alert">
<?echo $this->session->flashdata('success_signin') ?>
</div>
<?} else if ($this->session->flashdata('success_new_pwd')) {?>
<div class="alert alert-success" role="alert">
<?echo $this->session->flashdata('success_new_pwd') ?>
</div>
<?}?>
            <a href="/welcome/signin">Vous n'avez pas encore de compte ? Inscrivez vous ici.</a>
        </div>
    </div>
</div>
