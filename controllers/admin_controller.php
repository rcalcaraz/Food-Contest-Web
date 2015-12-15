<?php
  class AdminController {
    public function index() {
        // Declaracion de mappers
      	$pinchoMapper = new Pinchomapper();
      	$juradoprofesionalmapper = new Juradoprofesionalmapper();
        $establecimientomapper = new Establecimientomapper();
        $concursomapper = new Concursomapper();
        $concursoactual = $concursomapper->recuperarConcurso(1);

        // Recuperacion de los datos
        $establecimientos = $establecimientomapper->recuperarSolicitudes();
        $jurados = $juradoprofesionalmapper->recuperarTodosLosJurados();
        $pinchos = $pinchoMapper->recuperarPinchosAsociados($establecimientos);
        $establecimientosConfirmados = $establecimientomapper->recuperarConfirmados();

        
        // Se recuperan los datos para comprobar los botones disponibles
        $repartirNoPulsable = $concursomapper->pinchosRepartidos();
        $finalistasNoPulsable = $concursomapper->faseFinalAlcancada();

        // Renderizado de la vista
        require_once("models/Juradoprofesional.php");
      	require_once("views/admin/index.php");
    }

    public function aceptarSolicitud() {
        $establecimientomapper = new Establecimientomapper();
        $idEstablecimiento = $_POST['idEstablecimiento'];
        $operacionCorrecta = $establecimientomapper->confirmarEstablecimiento($idEstablecimiento);
        if($operacionCorrecta){
              $mensajes[] = "Solicitud <strong>Aceptada!</strong>";
              $_SESSION['mensajes'] = $mensajes;
        }
        else{
              $mensajes[] = "<strong>Error!</strong> No se ha podido aceptar la solicitud";
              $_SESSION['mensajes'] = $mensajes;
        }
        header("Location: ?controller=admin&action=index#pinchos");
    }

    public function denegarSolicitud() {
        $establecimientomapper = new Establecimientomapper();
        $idEstablecimiento = $_POST['idEstablecimiento'];
        $operacionCorrecta = $establecimientomapper->denegarEstablecimiento($idEstablecimiento);
         if($operacionCorrecta){
              $mensajes[] = "Solicitud <strong>Denegada!</strong>";
              $_SESSION['mensajes'] = $mensajes;
        }
        else{
              $mensajes[] = "<strong>Error!</strong> No se ha podido denegar la solicitud";
              $_SESSION['mensajes'] = $mensajes;
        }
        header("Location: ?controller=admin&action=index#pinchos");
    }

   public function eliminarEstablecimiento() {
        $establecimientomapper = new Establecimientomapper();
        $idEstablecimiento = $_POST['idEstablecimiento'];
        $operacionCorrecta = $establecimientomapper->eliminarEstablecimiento($idEstablecimiento);
         if($operacionCorrecta){
              $mensajes[] = "Establecimiento <strong>Eliminado!</strong>";
              $_SESSION['mensajes'] = $mensajes;
        }
        else{
              $mensajes[] = "<strong>Error!</strong> No se ha podido eliminar el establecimiento";
              $_SESSION['mensajes'] = $mensajes;
        }
        header("Location: ?controller=admin&action=index");
    }

    public function actualizarFolleto() {
        $concursomapper = new Concursomapper();
        // Obtencion del folleto desde el formulario
        $destinoFolleto = "folleto/" . "folleto" . ".pdf" ;
        $nombreFolleto = $_FILES["inputFolleto"]["tmp_name"];
        move_uploaded_file($nombreFolleto, $destinoFolleto);
        // No es necesaria actualizacion en la base de datos ya que solo hay un folleto
        // $concursomapper->subirFolleto($nombreFolleto);
        // Faltan comprobaciones y validaciones
        $operacionCorrecta = true;
         if($operacionCorrecta){
              $mensajes[] = "Folleto <strong>Actualizado!</strong>";
              $_SESSION['mensajes'] = $mensajes;
        }
        else{
              $mensajes[] = "<strong>Error!</strong> No se ha podido actualizar el folleto";
              $_SESSION['mensajes'] = $mensajes;
        }
        header("Location: ?controller=admin&action=index");
    }

	  public function actualizarConcurso(){
      // Se carga el mapper
    	$concursomapper = new Concursomapper();
      // Se recupera el concurso
      $concursoactual = $concursomapper->recuperarConcurso(1);
      // Se recuperan los datos del formulario
    	$iniciovot = $_POST['inputIniciovotacion'];
    	$finalvotpop = $_POST['inputFinalvotacionpopular'];
    	$finalvotpro = $_POST['inputFinalvotacionprofesional'];
    	$iniciovotfin = $_POST['inputComienzovotacionfinalistas'];
    	$finalvotfin = $_POST['inputFinalvotacionfinalistas'];
      // Se actualiza el objeto concurso actual
      $concursoactual-> set_comienzo_vot_popular($iniciovot);
      $concursoactual-> set_final_vot_pop($finalvotpop);
      $concursoactual-> set_final_vot_pro($finalvotpro);
      $concursoactual-> set_comienzo_vot_finalistas($iniciovotfin);
      $concursoactual-> set_final_vot_finalistas($finalvotfin);
      // Se intenta modificar en la base de datos
    	$operacionCorrecta = $concursomapper->modificarConcursoActual($concursoactual);
    	if($operacionCorrecta){
                  $mensajes[] = "Concurso <strong>modificado</strong>";
                  $_SESSION['mensajes'] = $mensajes;
      }
      else{
                  $mensajes[] = "<strong>Error!</strong> No se ha podido modificar el concurso";
                  $_SESSION['mensajes'] = $mensajes;
      }
      header("Location: ?controller=admin&action=index");

    	}

    public function registrarJurado(){
      // Se carga el modelo      
      require_once("models/Juradoprofesional.php");

      // Se instancia el mapper
      $juradoProfesionalMapper = new Juradoprofesionalmapper();

      // Se recuperan los datos del formulario
      $inputNombreJurado = $_POST['inputNombreJurado'];
      $inputEmailJurado = $_POST['inputEmailJurado'];
      $inputLoginJurado = $_POST['inputLoginJurado'];
      $inputPasswordJurado = $_POST['inputPasswordJurado']; // Codificar md5
      $passCifrada = md5($inputPasswordJurado);
      $inputTelefonoJurado = $_POST['inputTelefonoJurado'];
      $inputDescripcionJurado = $_POST['inputDescripcionJurado'];
      // Obtencion de la foto desde el formulario
      $destinoFoto = "images/" . $inputLoginJurado . ".jpg";
      $nombreFoto = $_FILES["inputFotoJurado"]["tmp_name"];
      move_uploaded_file($nombreFoto, $destinoFoto);

      // Se crea el jurado con los datos recibidos
      $jurado = new Juradoprofesional(null,$inputNombreJurado,$inputLoginJurado,$inputEmailJurado,$passCifrada,$inputTelefonoJurado,$destinoFoto,$inputDescripcionJurado);
      
      // Se intenta insertar en la base de datos
      $operacionCorrecta = $juradoProfesionalMapper->insertarJuradoProfesional($jurado, 1, 1);
      if($operacionCorrecta){
                  $mensajes[] = "Nuevo jurado<strong> registrado</strong>";
                  $_SESSION['mensajes'] = $mensajes;
      }
      else{
                  $mensajes[] = "<strong>Error!</strong> No se ha podido registrar al jurado";
                  $_SESSION['mensajes'] = $mensajes;
      }     
      header("Location: ?controller=admin&action=index");
    }

    public function eliminarJurado(){
      // Se instancia el mapper
      $juradoProfesionalMapper = new Juradoprofesionalmapper();   
      $id=$_POST['idJurado'];
      $operacionCorrecta = $juradoProfesionalMapper->borrarJuradoProfesional($id);
      if($operacionCorrecta){
                  $mensajes[] = "Jurado<strong> eliminado</strong>";
                  $_SESSION['mensajes'] = $mensajes;
      }
      else{
                  $mensajes[] = "<strong>Error!</strong> No se ha podido eliminar al jurado";
                  $_SESSION['mensajes'] = $mensajes;
      }     
      header("Location: ?controller=admin&action=index");
    }

    public function elegirFinalistas(){
       $pinchoMapper = new Pinchomapper();
       $numeroFinalistas = 5;
       $pinchoMapper->calcularFinalistas(5);
       $mensajes[] = "Finalistas <strong> calculados</strong>";
       $_SESSION['mensajes'] = $mensajes;
       header("Location: ?controller=admin&action=index");
    }

    public function repartirPinchos(){
      // Se instancia el mapper
      $juradoProfesionalMapper = new Juradoprofesionalmapper();
      $juradoProfesionalMapper->asignarPinchosJurados();      
      $mensajes[] = "Pinchos <strong> repartidos</strong>";
      $_SESSION['mensajes'] = $mensajes;
      header("Location: ?controller=admin&action=index");
    }
  }
?>
