  <?php
    class RegistroController {
      public function index() {

      }

      public function validarRegistro() {
        $juradoMapper = new Juradopopularmapper();
        $idConcurso = 1; // Constante, definir en otro lugar
        $id = NULL; // Autoincremental
        $login = $_POST["inputLoginNuevoUsuario"];
        $email = $_POST["inputEmailNuevoUsuario"];
        $password = $_POST["inputPasswordNuevoUsuario"];
        $passCifrada = md5($password);
        $jurado = new Juradopopular($id,$login,$email,$passCifrada);
        if($juradoMapper->insertarJuradoPopular($jurado, $idConcurso)){
            $mensajes[] = "<strong>Usuario Registrado</strong> ya puedes hacer Login";
            $_SESSION['mensajes'] = $mensajes;
            header("Location: ?controller=pages&action=home");
        }
        else{
            $mensajes[] = "<strong>Error!</strong> Seguramente has usado un nombre de usuario o emails ya existentes";
            $_SESSION['mensajes'] = $mensajes;
            header("Location: ?controller=pages&action=home");
        }
      }

      public function validarRegistroEstablecimientos() {
              $establecimientoMapper = new Establecimientomapper();
              $pinchoMapper = new Pinchomapper();
              // Datos del establecimiento [AÑADIR TODAS LAS VALIDACIONES]
              $login = $_POST['inputLoginNuevoEstablecimiento'];
              $pass = $_POST['inputPasswordNuevoEstablecimiento'];
              $passCifrada = md5($pass);
              $nombre = $_POST['inputNombreNuevoEstablecimiento'];
              $direccion = $_POST['inputDireccionNuevoEstablecimiento'];
              $localizacion = $_POST['inputLocalizacionNuevoEstablecimiento'];
              $descripcion= $_POST['inputDescripcionNuevoEstablecimiento'];
              // Datos del pincho
              $nombrePincho = $_POST['inputNombreNuevoPincho'];
              $precioPincho = $_POST['inputPrecioNuevoPincho'];

              // Se crea el establecimiento y se inserta en la base de datos
              $establecimiento = new Establecimiento("",$nombre,$direccion,$localizacion,0,$descripcion,$login,$passCifrada);
              if($establecimientoMapper->creaEstablecimiento($establecimiento,"1","1")){
            		// Recuperar id del establecimiento
            		$idEstablecimiento = $establecimientoMapper->recuperarIdEstablecimiento($login);

                // Obtencion de la foto desde el formulario
                $destinoFoto = "images/" . $idEstablecimiento . ".jpg";
                $nombreFoto = $_FILES["inputFotoNuevoPincho"]["tmp_name"];
                move_uploaded_file($nombreFoto, $destinoFoto);

                // Se crea el pincho y se inserta en la base de datos
                $pincho = new Pincho("",$nombrePincho,$precioPincho);
                if($pinchoMapper->insertarPincho($pincho,$idEstablecimiento)){
                  $mensajes[] = "<strong>Establecimiento</strong> registrado. Espere en unos dias y vea si ha sido confirmado para el concurso";
                  $_SESSION['mensajes'] = $mensajes;
                }
                else{
                    $mensajes[] = "<strong>Error!</strong> Por favor cambie el nombre de su pincho";
                    $_SESSION['mensajes'] = $mensajes;
                }
              }
              else{
                    $mensajes[] = "<strong>Error!</strong> Por favor cambie el nombre y login de su establecimiento";
                    $_SESSION['mensajes'] = $mensajes;
              }

              header("Location: ?controller=pages&action=home");
      }
  }
