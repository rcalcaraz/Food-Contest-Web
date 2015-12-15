<?php
  require_once('core/PDOConnection.php');

  if( !session_id() )
  {
      session_start();
      $mensajes = array();
  }


  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }

  require_once('views/layout.php');
?>