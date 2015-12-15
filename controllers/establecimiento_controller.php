<?php
  class EstablecimientoController {
    public function index() {
      // Se carga el mapper
      $establecimientoMapper = new Establecimientomapper();
      $codigoMapper = new Codigomapper();
      // Se recupera el establecimiento
      $idEstablecimiento = $_SESSION['id'];
      $establecimiento = $establecimientoMapper->recuperarEstablecimiento($idEstablecimiento);
      // Se recuperan los datos del establecimiento
      $nombre = $establecimiento->get_nombre();
      $direccion = $establecimiento->get_direccion();
      $localizacion = $establecimiento->get_localizacion();
      $descripcion = $establecimiento->get_descripcion();
      $codigos = $establecimientoMapper->recuperarCodigosEstablecimiento($idEstablecimiento);
      require_once('views/establecimiento/index.php');
    }

    public function generarCodigos() {
      $pinchoMapper = new Pinchomapper();
      $idEstablecimiento = $_SESSION['id'];
      // Se recupera la id del pincho asociado al establecimento
      $idPincho = $pinchoMapper->recuperarIdPinchoAsociado($idEstablecimiento);
      // Se intenta crear 100 nuevos codigos
      $operacionCorrecta = $pinchoMapper->crearNCodigos($idPincho, 100);
        if($operacionCorrecta){
          $mensajes[] = "Se han generado <strong>100</strong> nuevos codigos!";
          $_SESSION['mensajes'] = $mensajes;
          header("Location: ?controller=establecimiento&action=index");
        }
        else{
          $mensajes[] = "<strong>Error!</strong> No se han podido generar nuevos codigos";
          $_SESSION['mensajes'] = $mensajes;
          header("Location: ?controller=establecimiento&action=index");
        }
    }

    public function actualizarEstablecimiento() {
       // Se carga el mapper
      $establecimientoMapper = new Establecimientomapper();
      // Se recupera el establecimiento
      $idEstablecimiento = $_SESSION['id'];
      $establecimiento = $establecimientoMapper->recuperarEstablecimiento($idEstablecimiento);
      // Se recuperan los datos del formulario
      $nombre = $_POST['inputNombreNuevoEstablecimiento'];
      $direccion =  $_POST['inputDireccionNuevoEstablecimiento'];
      $localizacion = $_POST['inputLocalizacionNuevoEstablecimiento'];
      $descripcion = $_POST['inputDescripcionNuevoEstablecimiento'];
      // Se actualiza el objeto establecimiento
      $establecimiento->set_nombre($nombre);
      $establecimiento->set_direccion($direccion);
      $establecimiento->set_localizacion($localizacion);
      $establecimiento->set_descripcion($descripcion);
      // Se intenta actualizar en la base de datos
      $operacionCorrecta = $establecimientoMapper->modificarEstablecimiento($establecimiento);
        if($operacionCorrecta){
          $mensajes[] = "Se ha <strong>actualizado</strong> el establecimiento!";
          $_SESSION['mensajes'] = $mensajes;
          header("Location: ?controller=establecimiento&action=index");
        }
        else{
          $mensajes[] = "<strong>Error!</strong> No se han podido actualizar el establecimiento";
          $_SESSION['mensajes'] = $mensajes;
          header("Location: ?controller=establecimiento&action=index");
        }
    }
  }
?>
