<?php
require_once('core/PDOConnection.php');

require_once (__DIR__ . "/Establecimiento.php");

require_once (__DIR__ . "/Pinchomapper.php");

require_once (__DIR__ . "/Codigomapper.php");

require_once (__DIR__ . "/Pincho.php");


/**
 * ClassEstablecimientomapper
 *
 * Interfaz para el acceso a la base de dato de las entidades de Establecimiento
 *
 * @author Miguel Esmoris Lopez
 */
class Establecimientomapper {
	/**
	 * Referencia a la conexion PDO
	 *
	 * @var PDO
	 */
	private $db;

	public function __construct() {
		$this->db = PDOConnection::getInstance ();
	}

	/**
	 * Inserta un Establecimiento
	 *
	 * @param Establecimiento $establecimiento El establecimiento con id que se quiere introducir en la base de datos
	 * @param Integer $idAdministrador La id del administrador que gestiona el establecimiento
	 * @param Integer $idConcurso La id del concurso a la que pertenece el establecimiento
	 * @throws PDOException si existe un error con la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function creaEstablecimiento($establecimiento,$idAdministrador,$idConcurso) {
		$stmt = $this->db->prepare("INSERT INTO establecimiento (nombre, direccion, localizacion, confirmado, descripcion, login, password, concurso_idconcurso, administrador_idadministrador) values (?,?,?,?,?,?,?,?,?)");
		$stmt->execute ( array (
				$establecimiento->get_nombre(),
				$establecimiento->get_direccion(),
				$establecimiento->get_localizacion(),
				$establecimiento->get_confirmado(),
				$establecimiento->get_descripcion(),
				$establecimiento->get_login(),
				$establecimiento->get_password(),
				$idConcurso,
				$idAdministrador
		)	);
		$count = $stmt->rowCount();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				return true;
				break;
			default :
				//throw new Exception ( "Error al realizar la insercion en la BD" );
				return false;
				break;
		}
	}

	/**
	 * Elimina un Establecimiento
	 *
	 * @param Integer $idEstablecimiento La id del establecimiento que se desea eliminar
     * @return boolean. Devuelve true (1) si se ha producido la eliminacion, false (0) en caso contrario
	 */
	public function eliminarEstablecimiento($idEstablecimiento) {
		$stmt = $this->db->prepare("DELETE FROM establecimiento WHERE idestablecimiento=?");
		$stmt->execute ( array (
				$idEstablecimiento
		)	);
		$count = $stmt->rowCount();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				return true;
				break;
			default :
				//throw new Exception ( "Error al realizar la insercion en la BD" );
				return false;
				break;
		}
	}

	/**
	 * Recupera un Establecimiento
	 *
	 * @param  $idEstablecimiento La id del administrador que gestiona el establecimiento
	 * @throws PDOException si existe un error con la base de datos
	 * @return Establecimiento $establecimiento el establecimiento recuperado a a partir de su id
	 */
	public function recuperarEstablecimiento($idEstablecimiento) {
		$stmt= $this->db->prepare( "SELECT * FROM establecimiento WHERE idestablecimiento=?" );
		$stmt->execute( array (
				$idEstablecimiento
		)	) ;
		$establecimiento = $stmt-> fetch(PDO::FETCH_ASSOC);
		if ($establecimiento != null){
			return new Establecimiento ($establecimiento ["idestablecimiento"], $establecimiento ["nombre"], $establecimiento ["direccion"], $establecimiento ["localizacion"], $establecimiento["confirmado"], $establecimiento ["descripcion"], $establecimiento ["login"], $establecimiento["password"] );
		} else {
			return NULL;
		}
	}


	/**
	 * Modifica un Establecimiento
	 *
	 * @param  Establecimiento $establecimiento Establecimiento que se desea modificar
	 * @throws PDOException si existe un error con la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function modificarEstablecimiento($establecimiento){
		$stmt= $this->db->prepare("UPDATE establecimiento SET nombre=?, direccion=?, localizacion=?, descripcion=?  WHERE idestablecimiento=?");
		$stmt->execute( array (
			$establecimiento->get_nombre(),
			$establecimiento->get_direccion(),
			$establecimiento->get_localizacion(),
			$establecimiento->get_descripcion(),
			$establecimiento->get_id_establecimiento()
		)	);
		$count = $stmt->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				return true;
				break;
			default :
			//	throw new Exception ( "Error al realizar la actualizacion en la BD" );
				return false;
				break;
		}
	}

	/**
	 * Confirma un Establecimiento
	 *
	 * Genera además 100 codigos para este el pincho asociado a este establecimiento
	 *
	 * @param  $idEstablecimiento La id del establecimiento que se desea confirmar
	 * @throws PDOException si existe un error con la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la confirmacion, false (0) en caso contrario
	 */
	public function confirmarEstablecimiento($idEstablecimiento){;
		$pinchoMap = new Pinchomapper();
		//$pincho = new Pincho();
		$stmt= $this->db->prepare("UPDATE establecimiento SET confirmado=1 WHERE idestablecimiento=?");
		$stmt->execute( array (
				$idEstablecimiento
		)	);
		$count = $stmt->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				//Creo los codigos para el pincho relacionado a este establecimiento
			    $idPincho = $pinchoMap->recuperarIdPinchoAsociado($idEstablecimiento);
				$pinchoMap->crearNCodigos($idPincho, "100");
				return true;
				break;
			default :
			//	throw new Exception ( "Error al realizar la actualizacion en la BD" );
				return false;
				break;
		}
	}

	/**
	 * Marca una solicitud de establecimiento como denegada
	 *
	 * @param  $idEstablecimiento La id del establecimiento que se desea marcar como no aceptado
	 * @throws PDOException si existe un error con la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la actualizacion, false (0) en caso contrario
	 */
	public function denegarEstablecimiento($idEstablecimiento) {
		$stmt= $this->db->prepare("UPDATE establecimiento SET confirmado=2 WHERE idestablecimiento=?");
		$stmt->execute( array (
				$idEstablecimiento
		)	);
		$count = $stmt->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				$this->eliminarEstablecimiento($idEstablecimiento);
				return true;
				break;
			default :
				//throw new Exception ( "Error al realizar la actualizacion en la BD" );
				return false;
				break;
		}
	}

	/**
	 * Validar login
	 *
	 * @param  $login Login de establecimiento
	 * @param  $pass Password de establecimiento
	 * @throws PDOException si existe un error con la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido el borrado, false (0) en caso contrario
	 */
	public function validarLogin($login,$pass){
		$sentencia = $this->db->prepare ("SELECT * from establecimiento WHERE login=? and password=?");
		$sentencia->execute( array(
				$login,
				$pass
		) );

		$count = $sentencia->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				return true;
				break;
			default :
				//throw new Exception ( "Error al realizar la prueba en la BD" );
				return false;
				break;
		}
	}

	/**
	 * Recuperar solicitudes
	 *
	 * @param  void
	 * @throws PDOException si existe un error con la base de datos
	 * @return $establecimientos[] Establecimiento Recupera un vector con todos los establecimientos sin confirmar
	 */
	public function recuperarSolicitudes(){
		$stmt = $this->db->prepare ( "SELECT * FROM establecimiento WHERE confirmado=0");
		$stmt->execute();
		$establecimientosRecuperados = $stmt->fetchAll();
		$establecimientos = array();
		foreach ($establecimientosRecuperados as $establecimiento) {
			$establecimientos[] = new Establecimiento ($establecimiento["idestablecimiento"], $establecimiento["nombre"], $establecimiento["direccion"], $establecimiento["descripcion"], $establecimiento["localizacion"], $establecimiento["password"]);

		}
		return $establecimientos;
	}

	/**
	 * Recuperar confirmaciones
	 *
	 * @param  void
	 * @throws PDOException si existe un error con la base de datos
	 * @return $establecimientos[] Establecimiento Recupera un vector con todos los establecimientos confirmados
	 */
	public function recuperarConfirmados(){
		$stmt = $this->db->prepare ( "SELECT * FROM establecimiento WHERE confirmado=1");
		$stmt->execute();
		$establecimientosRecuperados = $stmt->fetchAll();
		$establecimientos = array();
		foreach ($establecimientosRecuperados as $establecimiento) {
			$establecimientos[] = new Establecimiento ($establecimiento["idestablecimiento"], $establecimiento["nombre"], $establecimiento["direccion"], $establecimiento["descripcion"], $establecimiento["localizacion"], $establecimiento["password"]);

		}
		return $establecimientos;
	}

	/**
	 * Recupera la id de un establecimiento a traves de su login
	 *
	 * @param String $login El login del establecimiento del que se quiere recuperar la id
	 * @throws PDOException si existe un error con la base de datos
	 * @return $idEstablecimiento Devuelve la id asociada al login del establecimiento introducido. Devuelve null si se ha producido un error.
	 */
	public function recuperarIdEstablecimiento($login) {
		$stmt = $this->db->prepare ( "SELECT idestablecimiento FROM establecimiento WHERE login=?" );
		$stmt->execute ( array (
				$login
		) );
		$idEstablecimiento = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($idEstablecimiento != null) {
			return $idEstablecimiento['idestablecimiento'];
		} else {
			return NULL;
		}
	}


	/**
	 * Recupera los codigos de un establecimiento a traves de su id
	 *
	 * @param Integer $idEstablecimiento El id del establecimiento del que se quieren recuperar los codigos
	 * @throws PDOException si existe un error con la base de datos
	 * @return $codigos Devuelve los codigos asociados al establecimiento. Devuelve null si se ha producido un error.
	 */
	public function recuperarCodigosEstablecimiento($idEstablecimiento) {
		$pinchoMapper = new Pinchomapper();
		$codigoMapper = new Codigomapper();
		$idPincho = $pinchoMapper->recuperarIdPinchoAsociado($idEstablecimiento);
		return $codigoMapper->recuperarCodigos($idPincho);
	}

}
