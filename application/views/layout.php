<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Exemple page</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/site.css"/>
  </head>

  <body>
    
    <div class="row">
      <div class="col-2 border bg-dark">

          <h1 class="text-center text-white">NEW MENU</h1>
          <ul class="nav flex-column">
          <?foreach ($nav_list as $route => $nav_item) {?>
            <li class="nav-item">
              <a class="nav-link" href="<?=$route?>"><?=$nav_item?></a>
            </li>
          <?}?>
        </ul>
      </div>

      <div class="col-10">
        <div><?=$contents?></div>
      </div>
    </div>

    <footer class="text-center m-5">
	    &copy; Delmerie JOHN ROSE - 2020
    </footer>


    <!-- <div class="container-fluid"></div> -->


  </body>

</html>