<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9e7f9ad57b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<? echo base_url('/assets/css/')?>style_back.css">
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
    <title><?=$title?></title>
  </head>
  <body>

  <div class="main">
    <div class="row">
        <div class="col-xl-3 bg-dark">
          <div class="container-fluid">
            <h1 class="text-center text-white">NEW MENU</h1>
                <ul class="nav flex-column my-5">
                    <?foreach ($nav_list as $route => $nav_item) {?>
                      <a class="btn btn-primary m-3" href="<?=$route?>"><?=$nav_item?></a>
                    <?}?>
                </ul>
            </div>
        </div>

        <div class="col-xl-9">
          <div class="container-fluid"><?=$contents?></div>
            <footer class="text-center m-5">
                <p>&copy; Delmerie JOHN ROSE - <? echo date('Y')?></p>
           </footer>
        </div>
      </div>
</div>
</div>
</body>
</html>