<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9e7f9ad57b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css"/>
    <title><?=$title?></title>
  </head>

  <body>

  <div class="main">
    <div class="row">
        <div class="col-2 bg-dark">
            <h1 class="text-center text-white display-4">NEW MENU</h1>
            <ul class="nav flex-column mt-5 mb-5 text-center">
                <?foreach ($nav_list as $route => $nav_item) {?>
                  <a class="btn btn-primary btn-sm m-2" href="<?=$route?>"><?=$nav_item?></a>
                <?}?>
            </ul>
        </div>

        <div class="col-10">
          <div class="container"><?=$contents?></div>
        </div>
      </div>

      <footer class="text-center m-5">
          &copy; Delmerie JOHN ROSE - 2020
      </footer>
  </div>
</body>

</html>