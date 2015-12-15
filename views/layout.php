<!DOCTYPE html>
<html lang="es">

<head>
<meta name="author" content="Rafael Castillo Alcaraz">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Click-A-Pîncho</title>
<link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/component.css" />
<link rel="stylesheet" href="css/flickity.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/scrollIt.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flipshow.js"></script>
<script src="js/flickity.pkgd.min.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/md5.js"></script>
<script src="js/script.js"></script>
</head>

<body onload='alertas(<?php echo json_encode($_SESSION['mensajes']); unset($_SESSION['mensajes']);?>)'>
 
   <?php require_once('routes.php'); ?>

  <footer>
    <p class="text-right">Copyright © 2015 - ABP Grupo21  | <a href="folleto/folleto.pdf" id="linkFolleto">Folleto 2015</a></p>
  </footer>
</body>

</html>
