<div class="container">
    <div class="m-5">
        <h3>Nouveau mot de passe</h3>
        <h5>Pour réinitialiser votre mot de passe, veuillez saisir votre email puis le nouveau mot de passe.</h5>
        <br>
        <div>
            <form action="<?echo base_url('/welcome/new_password'); ?>" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Votre email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
            </form>
            <hr>
            <a href="<? echo base_url('/welcome/login')?>">Revenir à la page de connexion</a>
            <?if ($this->session->flashdata('error')) {?>
                <div class="alert alert-danger" role="alert">
                    <?echo $this->session->flashdata('error')?>
                </div>
            <?}?>
        </div>
    </div>
</div>
