<?php
  class JuradoProfesionalController {
    public function index() {
      // Cargar las variables necesarias desde el modelo
      $votacionMapper = new Votacionmapper();
      $pinchoMapper = new Pinchomapper();
      // Se recupera la id del usuario
      $id = $_SESSION['id'];
      // Recuperamos todos los pinchos asignados al jurado profesional actual
      $pinchosAsignados = $votacionMapper->recuperarPinchosAsignadosJuradoProfesional($id);
      // Recuperamos todos los establecimientos asociados a esos pinchos
      $establecimientosAsignados = $pinchoMapper->recuperarEstablecimientosAsociados($pinchosAsignados);
      require_once('views/juradoprofesional/index.php');
    }

    public function votarProfesional() {
      $votacionMapper = new Votacionmapper();
      $votoFinalista = 0; // 1 para el caso de una votacion en la final del concurso
      $nota = $_POST['votacion'];
      $idPincho = $_POST['idPincho'];
      $idJurado = $_SESSION['id'];    
      $operacionCorrecta =  $votacionMapper->modificaVotacionProfesional($votoFinalista, $nota, $idPincho, $idJurado); 
      if($operacionCorrecta){
            $mensajes[] = "Voto <strong>correcto!</strong>";
            $_SESSION['mensajes'] = $mensajes;
      }
      else{
            $mensajes[] = "<strong>Error!</strong> No se ha podido realizar el voto";
            $_SESSION['mensajes'] = $mensajes;
      }
      header("Location: ?controller=juradoprofesional&action=index");
    }
  }
?>
