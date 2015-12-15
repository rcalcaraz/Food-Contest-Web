<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        require_once('models/Establecimientomapper.php');
        require_once('models/Pinchomapper.php');
        require_once('models/Juradoprofesionalmapper.php');
        $controller = new PagesController();
      break;
      case 'admin':
      if(isset($_SESSION['admin'])){
          require_once('models/Concursomapper.php');
          require_once('models/Establecimientomapper.php');
          require_once('models/Pinchomapper.php');
          require_once('models/Juradoprofesionalmapper.php');
          $controller = new AdminController();
      }
      else{
          $mensajes[] = "<strong>Lo siento!</strong> estas intentando entrar en una zona no permitida. Logueate primero";
          $_SESSION['mensajes'] = $mensajes;
          header("Location: ?controller=pages&action=home");
      }
      break;
      case 'juradoprofesional':
        if(isset($_SESSION['profesional'])){
          require_once('models/Votacionmapper.php');
          require_once('models/Pinchomapper.php');
          $controller = new JuradoProfesionalController();
        }
        else{
          $mensajes[] = "<strong>Lo siento!</strong> estas intentando entrar en una zona no permitida. Logueate primero";
          $_SESSION['mensajes'] = $mensajes;
          header("Location: ?controller=pages&action=home");
        }
      break;
      case 'juradopopular':
      if(isset($_SESSION['popular'])){
        require_once('models/Establecimientomapper.php');
        require_once('models/Votacionmapper.php');
        require_once('models/Pinchomapper.php');
        require_once('models/Juradoprofesionalmapper.php');
        $controller = new JuradoPopularController();
      }
      else{
          $mensajes[] = "<strong>Lo siento!</strong> estas intentando entrar en una zona no permitida. Logueate primero";
          $_SESSION['mensajes'] = $mensajes;
          header("Location: ?controller=pages&action=home");
      }
      break;
      case 'establecimiento':
      if(isset($_SESSION['establecimiento'])){
        require_once('models/Establecimientomapper.php');
        require_once('models/Pinchomapper.php');
        $controller = new EstablecimientoController();
      }
      else{
          $mensajes[] = "<strong>Lo siento!</strong> estas intentando entrar en una zona no permitida. Logueate primero";
          $_SESSION['mensajes'] = $mensajes;
          header("Location: ?controller=pages&action=home");
      }
      break;
      case 'registro':
        require_once('models/Establecimientomapper.php');
        require_once('models/Juradopopularmapper.php');
        //require_once('models/IngredienteAlergenomapper.php');
        //require_once('models/Enlacemapper.php');
        require_once('models/Pinchomapper.php');
        $controller = new RegistroController();
      break;
      case 'login':
        require_once('models/Establecimientomapper.php');
        require_once('models/Administradormapper.php');
        require_once('models/Juradoprofesionalmapper.php');
        require_once('models/Juradopopularmapper.php');
        $controller = new LoginController();
      break;

    }

    $controller->{ $action }();
  }

  $controllers = array('pages' => ['home', 'error'],
                       'admin' => ['index','aceptarSolicitud','denegarSolicitud','eliminarEstablecimiento','actualizarFolleto','actualizarConcurso','registrarJurado','eliminarJurado','elegirFinalistas','repartirPinchos'],
                       'juradoprofesional' => ['index','votarProfesional'],
                       'juradopopular' => ['index','votar'],
                       'establecimiento' => ['index','generarCodigos','actualizarEstablecimiento'],
                       'registro' => ['index','validarRegistro','validarRegistroEstablecimientos'],
                       'login' => ['validarLogin','cerrarSesion']
                       );

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
