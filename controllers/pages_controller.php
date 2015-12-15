<?php
  class PagesController {
    public function home() {
      $pinchoMapper = new Pinchomapper();
      $juradoprofesionalmapper = new Juradoprofesionalmapper();
      $establecimientomapper = new Establecimientomapper();
      $establecimientos = $establecimientomapper->recuperarConfirmados();
      $pinchos = $pinchoMapper->recuperarPinchosAsociados($establecimientos);  
      $jurados = $juradoprofesionalmapper->recuperarTodosLosJurados();
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>
