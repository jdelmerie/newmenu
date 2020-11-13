<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/9e7f9ad57b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<? echo base_url('/assets/css/')?>style_front.css">
        <title><?=ucfirst($title)?></title>
    </head>

    <body style="background-color : <?=$background_color?> ">

    <header class="header" style="background-color : <?=$header_color?> ">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 flex">
                    <? if (isset($etab_perso)) {?>
                        <img class="rounded-circle" src="<? echo base_url("/uploads/logos/$etab_perso->logo") ?>" width="75px"height="75px">
                    <?} else {?>
                        <div class="text-center"><i class="fas fa-store-alt"></i></div>
                    <?}?>
                </div>

                <div class="col-xl-8">
                    <h1 class="display-4" ><?=ucfirst($etab->name)?></h1>
                    <? echo "$etab->adress, $etab->postal_code " .ucfirst($etab->city) ?>
                    <!-- Mettre num + site -->
                </div>
            </div>
        </div>
    </header>

    <div class="mt-3">
        <p class="text-center flex lead">CARTE</p>
    </div>

    <div class="container mt-3 border">
        <ul class="nav nav-pills flex-column flex-sm-row flex">
            <li class="nav-item">
                <a class="flex-sm-fill text-sm-center nav-link" href="<? echo base_url("etab/display/$etab->id") ?>">Présentation</a>
            </li>
        <? if (count($categories) > 0) {?>
                <?foreach ($categories as $k => $categorie) {?>
                    <li class="nav-item">
                        <a class="flex-sm-fill text-sm-center nav-link" href="<? echo base_url("etab/category/$categorie->id?etab_id=$etab->id") ?>"><?=ucfirst($categorie->name)?></a>
                    </li>
                <?}?>
            <?} else {?>
                <i>Vous n'avez aucune catégorie renseignée.</i>
            <?}?>   
        </ul>
    </div>

    <div class="container mt-5">
        <?=$contents?>
    </div>

    <footer class="container small text-center mt-5">
        <hr>
        <p>&copy; Delmerie JOHN ROSE - <? echo date('Y')?></p>
    </footer>
</body>
</html>