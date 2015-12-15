<?php

require_once('core/PDOConnection.php');

require_once (__DIR__ . "/Juradopopular.php");

/**
 * Class Juradopopularmapper
 *
 * Interfaz para el acceso a la base de dato de las entidades de Juradopopular
 *
 * @author Edgar Figueiras Gómez
 */
class Juradopopularmapper {
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
	 * Recupera un juradopopular
	 *
	 * @param Juradopopular $jurado El jurado con id que se quiere recuperar de la base de datos
	 * @throws PDOException si existe un error con la base de datos
	 * @return JuradoPopular El miembro del jurado popular recuperado de la base de datos. Devuelve null si se ha producido un error.
	 */
	public function recuperarJuradoPopular($idJurado) {
		$stmt = $this->db->prepare ( "SELECT * FROM juradopopular WHERE idjuradopopular=?" );
		$stmt->execute ( array (
				$idJurado 
		) );
		$juradoPopular = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($juradoPopular != null) {
			return new JuradoPopular ( $juradoPopular ["idjuradopopular"], $juradoPopular ["usuario"], $juradoPopular ["email"], $juradoPopular["password"] );
		} else {
			return NULL;
		}
	}

	/**
	 * Recupera la id de un juradopopular
	 *
	 * @param String $login El login del jurado del que se quiere recuperar la id
	 * @throws PDOException si existe un error con la base de datos
	 * @return Integer Devuelve la id asociada al login introducido. Devuelve null si se ha producido un error.
	 */
	public function recuperarIdPopular($login) {
		$stmt = $this->db->prepare ( "SELECT * FROM juradopopular WHERE usuario=?" );
		$stmt->execute ( array (
				$login 
		) );
		$juradoPopular = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($juradoPopular != null) {
			return $juradoPopular["idjuradopopular"];
		} else {
			return NULL;
		}
	}


	/**
	 * Actualiza un miembro del juradopopular
	 *
	 * @param Juradopopular $jurado jurado con la id y los datos que se desean actualizar
	 * @param int $idConcurso identificador del concurso asociado al jurado
	 * @throws PDOException si existe un error con la base de datos	 
	 * @throws Exception si se actualiza mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la actualizacion, false (0) en caso contrario
	 */
	public function actualizarJuradoPopular($jurado, $idConcurso) {
		$stmt = $this->db->prepare ( "UPDATE juradopopular SET usuario=?,email=?,password=?,concurso_idconcurso=? WHERE idjuradopopular=?" );
		$stmt->execute ( array (
				$jurado->getLogin (),
				$jurado->getEmail (),
				$jurado->getPassword (),
				$idConcurso,
				$jurado->getId () 
		) );
		$count = $stmt->rowCount ();
		#echo $count;
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				return true;
				break;
			default :
				//throw new Exception ( "Error al realizar la actualizacion en la BD del jurado popular" );
				return false;
				break;
		}
	}
	
	/**
	 * Elimina un miembro del juradopopular
	 *
	 * @param Juradopopular $jurado jurado con la id que se desea eliminar
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se elimina mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la eliminacion, false (0) en caso contrario
	 */
	public function borrarJuradoPopular($idJurado) {
		$stmt = $this->db->prepare ( "DELETE from juradopopular WHERE idjuradopopular=?" );
		$stmt->execute ( array (
				$idJurado 
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
				//throw new Exception ( "Error al realizar la eliminación en la BD del jurado popular" );
				return false;
				break;
		}
	}
	/**
	 * Inserta un nuevo miembro del juradopopular
	 *
	 * @param Juradopopular $jurado jurado con la id y los datos que se desean insertar
	 * @param int $idConcurso identificador del concurso asociado al jurado
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarJuradoPopular($jurado, $idConcurso) {
		$stmt = $this->db->prepare ( "INSERT INTO juradopopular(idjuradopopular, usuario, email, password, concurso_idconcurso) values (?,?,?,?,?)" );
		$stmt->execute ( array (
				$jurado->getId (),
				$jurado->getLogin (),
				$jurado->getEmail (),
				$jurado->getPassword(),
				$idConcurso
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
				//throw new Exception ( "Error al realizar la insercion en la BD del jurado popular" );
				return false;
				break;
		}
	}

	/**
	 * Valida el login del juradoPopular
	 *
	 * @param Login $login login con el usuario que se va a loguear
	 * @param string $pass contraseña del juradoPopular que se loguea 
	 * @throws PDOException si existe un error con la base de datos
	 */
	public function validarLogin($login,$pass){
		$sentencia = $this->db->prepare ("SELECT * from juradopopular WHERE usuario=? and password=?");
		$sentencia->execute( array(
				$login,
				$pass
		) );
	
		$count = $sentencia->rowCount ();
		echo $count;
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				return true;
				break;
			default :
				//throw new Exception ( "Error al realizar la actualizacion en la BD" );
				return false;
				break;
		}
	}
}
	
?>
