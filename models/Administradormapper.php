<?php
require_once('core/PDOConnection.php');

require_once (__DIR__ . "/Administrador.php");

/**
 * Class Administradormapper
 *
 * Interfaz para el acceso a la base de dato de las entidades de administrador
 *
 * @author Miguel Esmoris Lopez
 */

class Administradormapper {
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
	 * Recupera un administrador
	 *
	 * @param idAdministrador $administrador El administrador con id que se quiere recuperar de la base de datos
	 * @throws PDOException si existe un error con la base de datos
	 * @return Administrador El administrador recuperado de la base de datos. Devuelve null si se ha producido un error.
	 */
	public function recuperarAdministrador($idAdministrador) {
		$stmt = $this->db->prepare ( "SELECT * FROM administrador WHERE idadministrador=?" );
		$stmt->execute ( array (
				$idAdministrador 
		) );
		$administrador = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($administrador != null) {
			return new Administrador ( $administrador ["idadministrador"], $administrador ["login"], $administrador ["password"]);
		} else {
			return NULL;
		}
	}

	/**
	 * Actualiza un administrador
	 *
	 * @param administrador $administrador con la id y los datos que se desean actualizar
	 * @param int $idConcurso identificador del concurso asociado al administrador
	 * @param int $idEstablecimiento identificador del establecimiento asociado al administrador
	 * @param int $idjuradoprofesional identificador del juradoProfesional asociado al administrador
	 * @throws PDOException si existe un error con la base de datos	 
	 * @throws Exception si se actualiza mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la actualizacion, false (0 
	 */
	public function actualizarAdministrador($administrador, $idConcurso, $idEstablecimiento,$idJuradoprofesional) {
		$stmt = $this->db->prepare ( "UPDATE administrador SET login=?,password=?,concurso_idconcurso=?,establecimiento_idestablecimiento=?,juradoprofesional_idjuradoprofesional WHERE idadministrador=?" );
		$stmt->execute ( array (
				$administrador->get_login (),
				$administrador->get_password (),
				$idConcurso,
				$idEstablecimiento,
				$idJuradoprofesional,
				$administrador->get_id () 
		) );
		$count = $stmt->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				return true;
				break;
			default :
				// new Exception ( "Error al realizar la actualizacion en la BD" );
				return false;
				break;
		}
	}
	
	/**
	 * Elimina un administrador
	 *
	 * @param Administrador $administrador administrador con la id que se desea eliminar
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se elimina mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la eliminacion, false (0) en caso contrario
	 */
	public function borrarAdministrador($idAdministrador) {
		$stmt = $this->db->prepare ( "DELETE from administrador WHERE idadministrador=?" );
		$stmt->execute ( array (
				$idAdministrador
		) );
		$count = $stmt->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				return true;
				break;
			default :
				//throw new Exception ( "Error al realizar la eliminación en la BD" );
				return false;
				break;
		}
	}
	/**
	 * Inserta un nuevo jurado profesional
	 *
	 * @param Administrador $administrador administrador con la id y los datos que se desean insertar
	 * @param int $idConcurso identificador del concurso asociado al administrador
	 * @param int $idEstablecimiento identificador del establecimiento asociado al administrador
	 * @param int $idjuradoprofesional identificador del juradoProfesional asociado al administrador
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarJuradoProfesional($administrador, $idConcurso, $idEstablecimiento, $idJuradoprofesional) {
		$stmt = $this->db->prepare ( "INSERT INTO administrador(login, password, concurso_idconcurso, establecimiento_idestablecimiento=?,juradoprofesional_idjuradoprofesional=?) values (?,?,?,?,?,?)" );
		$stmt->execute ( array (
				$administrador->get_login (),
				$administrador->get_password (),
				$idConcurso,
				$idEstablecimiento,
				$idJuradoprofesional
		) );
		$count = $stmt->rowCount ();
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

	public function validarLogin($login,$password) {
		$stmt = $this->db->prepare ( "SELECT * FROM administrador WHERE login=? AND password=?" );
		$stmt->execute ( array (
				$login,
				$password 
		) );
		$count = $stmt->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				return true;
				break;
			default :
				//throw new Exception ( "Error al recuperar usuario y contraseña" );
				return false;
				break;
		}
	}	

	/**
	 * Recupera la id de un administrador a traves de su login
	 *
	 * @param String $login El login del administrador del que se quiere recuperar la id
	 * @throws PDOException si existe un error con la base de datos
	 * @return $idAdministrador Devuelve la id asociada al login del administrador introducido. Devuelve null si se ha producido un error.
	 */
	public function recuperarIdAdministrador($login) {
		$stmt = $this->db->prepare ( "SELECT idadministrador FROM administrador WHERE login=?" );
		$stmt->execute ( array (
				$login
		) );
		$idAdministrador = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($idAdministrador != null) {
			return $idAdministrador["idadministrador"];
		} else {
			return NULL;
		}
	}
}
?>
