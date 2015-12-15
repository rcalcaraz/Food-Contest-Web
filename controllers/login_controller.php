<?php
  class LoginController {
    public function validarLogin() {
      // Se cargan los mappers
      $juradoMapper = new Juradopopularmapper();
      $juradoprofesionalMapper = new Juradoprofesionalmapper();
      $adminMapper = new Administradormapper();
      $establecimientoMapper = new Establecimientomapper();
      // Se recuperan los valores del formulario
      $login = $_POST["inputLoginRegistrado"];
      $password = $_POST["inputPasswordRegistrado"];
      $passCifrada = md5($password);

      if($adminMapper->validarLogin($login,$passCifrada)){
        // Se ha logueado el admin
        session_destroy();
        session_start();
        $_SESSION['login']= $login;
        $_SESSION['id']= $adminMapper->recuperarIdAdministrador($login);
        $_SESSION['admin']="admin";
        $mensajes[] = "Bienvenido a la administracion de <strong>Clickapincho!</strong>";
        $_SESSION['mensajes'] = $mensajes;
        header("Location: ?controller=admin&action=index");
      }
      elseif($juradoprofesionalMapper->validarLogin($login,$passCifrada)){
        // Se ha logueado un jurado profesional
        session_destroy();
        session_start();
        $_SESSION['profesional']="profesional";
        $_SESSION['login']= $login;
        $_SESSION['id']= $juradoprofesionalMapper->recuperarIdProfesional($login);
        $mensajes[] = "Bienvenido a <strong>Clickapincho!</strong>";
        $_SESSION['mensajes'] = $mensajes;
        header("Location: ?controller=juradoprofesional&action=index");
      }
      elseif($establecimientoMapper->validarLogin($login,$passCifrada)){
        // Se ha logeado un establecimiento
        session_destroy();
        session_start();
        $_SESSION['establecimiento']="establecimiento";
        $_SESSION['login']= $login;
        $_SESSION['id']= $establecimientoMapper->recuperarIdEstablecimiento($login);
        $mensajes[] = "Bienvenido a <strong>Clickapincho!</strong>";
        $_SESSION['mensajes'] = $mensajes;
        header("Location: ?controller=establecimiento&action=index");
      }
      elseif($juradoMapper->validarLogin($login,$passCifrada)){
        // Se ha logeado un jurado popular
        session_destroy();
        session_start();
        $_SESSION['popular']="popular";
        $_SESSION['login']= $login;
        $_SESSION['id']= $juradoMapper->recuperarIdPopular($login);
        $mensajes[] = "Bienvenido a <strong>Clickapincho!</strong>";
        $_SESSION['mensajes'] = $mensajes;
        header("Location: ?controller=juradopopular&action=index");
      }
      else{
        $mensajes[] = "Login y contraseña <strong>incorrectos</strong>";
        $_SESSION['mensajes'] = $mensajes;
        header("Location: ?controller=pages&action=home");
      }
    }

	function cerrarSesion(){

		session_destroy();
		header("Location: index.php");

		}
  }
?>
