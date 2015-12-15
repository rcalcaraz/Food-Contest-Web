<?php
  class JuradoPopularController {
    public function index() {
      $pinchoMapper = new Pinchomapper();
      $juradoprofesionalmapper = new Juradoprofesionalmapper();
      $establecimientomapper = new Establecimientomapper();
      $establecimientos = $establecimientomapper->recuperarConfirmados();
      $pinchos = $pinchoMapper->recuperarPinchosAsociados($establecimientos);
      $jurados = $juradoprofesionalmapper->recuperarTodosLosJurados();
      require_once('views/juradopopular/index.php');
    }

    public function votar() {
      $pinchoMapper = new Pinchomapper();
      $votacionMapper = new Votacionmapper();
      // Se recupera la id del usuario
      $id = $_SESSION['id'];
      // Se recuperan los codigos del formulario
      $codigo1 = $_POST['inputVoto1'];
      $codigo2 = $_POST['inputVoto2'];
      $codigo3 = $_POST['inputVoto3'];
      // Se recuperan las ids de los pinchos correspondientes a esos codigos
      $idpincho1 = $pinchoMapper->recuperaPinchodeCodigo($codigo1);
      $idpincho2 = $pinchoMapper->recuperaPinchodeCodigo($codigo2);
      $idpincho3 = $pinchoMapper->recuperaPinchodeCodigo($codigo3);
      // Se vota por los pinchos
      $operacionCorrecta = $votacionMapper->insertarTripleVotacionPopular($id, $idpincho1, $codigo1, 1, $idpincho2, $codigo2, 0, $idpincho3, $codigo3, 0);
      if($operacionCorrecta){
        $mensajes[] = "<strong>Votacion correcta.</strong> Gracias!";
        $_SESSION['mensajes'] = $mensajes;
        header("Location: ?controller=juradopopular&action=index");
      }
      else{
        $mensajes[] = "<strong>Error!</strong> no se ha podido votar";
        $_SESSION['mensajes'] = $mensajes;
        header("Location: ?controller=juradopopular&action=index");
      }
    }
  }
?>
