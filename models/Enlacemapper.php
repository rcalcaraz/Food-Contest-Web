<?php
require_once('core/PDOConnection.php');

require_once (__DIR__ . "/Enlace.php");

//require_once (__DIR__ . "/Establecimiento.php");

/**
 * Class Enlacemapper
 *
 * Interfaz para el acceso a la base de datos de las entidades de Enlace
 *
 * @author Miguel Esmoris Lopez
 */
class Enlacemapper {
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
	 * Recupera un Enlace
	 *
	 * @param $idEnlace La id del enlace que se quiere recuperar de la base de datos
	 * @throws PDOException si existe un error con la base de datos
	 * @return $Enlace El enlace recuperado de la base de datos. Devuelve null si se ha producido un error.
	 */
	public function recuperarEnlace($idEnlace) {
		$stmt = $this->db->prepare ( "SELECT * FROM enlace WHERE idenlace=?" );
		$stmt->execute ( array (
				$idEnlace
		) );
		$Enlace = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($Enlace != null) {
			return new Enlace ( $Enlace ["idenlace"], $Enlace ["url"], $Enlace["establecimiento_idestablecimiento"] );
		} else {
			return NULL;
		}
	}
	
	

	/**
	* Recupera todos los enlaces
	*
	* @param $idEstablecimiento Establecimiento al que pertenecen los enlaces
	* @throws PDOException si existe error con la base de datos
	* @return $enlaces El array de enlaces recuperados de la base de datos asignados a un establecimiento específico
	*/

	public function recuperarTodosLosEnlaces($idEstablecimiento){
		$stmt = $this->db->prepare ( "SELECT idenlace FROM enlace WHERE establecimiento_idestablecimiento=?");
		$stmt->execute ( array (
				$idEstablecimiento
		) );
		$enlacesRecuperados = $stmt->fetchAll();
		$enlaces = array();
		foreach ($enlacesRecuperados as $idEnlace) {
			$enlaces[] = $this->recuperarEnlace($idEnlace[0]);
		}
		return $enlaces;
	}
	

	/**
	 * Actualiza un Enlace 
	 *
	 * @param Enlace $idEnlace id del enlace que se desea actualizar
	 * @param Enlace $direccionURL direccion con el texto del enlace actualizado
	 * @throws PDOException si existe un error con la base de datos	 
	 * @throws Exception si se actualiza mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la actualizacion, false (0) en caso contrario
	 */
	public function actualizarEnlace($idEnlace, $direccionURL) {
		$stmt = $this->db->prepare ( "UPDATE enlace SET url=? WHERE idenlace=?" );
		$stmt->execute ( array (
				$direccionURL,
				$idEnlace  
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
			//	throw new Exception ( "Error al realizar la actualizacion en la BD" );
				return false;
				break;
		}
	}
	
	/**
	 * Elimina un Enlace
	 *
	 * @param  $idEnlace id del enlace que se desea eliminar
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se elimina mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la eliminacion, false (0) en caso contrario
	 */
	public function borrarEnlace($idEnlace) {
		$stmt = $this->db->prepare ( "DELETE from enlace WHERE idenlace=?" );
		$stmt->execute ( array (
				$idEnlace
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
			//	throw new Exception ( "Error al realizar la eliminación en la BD" );
				return false;
				break;
		}
	}
	
	
	/**
	 * Inserta un nuevo Enlace
	 *
	 * @param Enlace $Enlace enlace con los datos que se desean insertar
	 * @param int $idEstablecimiento identificador del establecimiento al que pertenece el enlace
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarEnlace($enlace, $idEstablecimiento) {
		$stmt = $this->db->prepare ( "INSERT INTO enlace(url, establecimiento_idestablecimiento) values (?,?)" );
		$stmt->execute ( array (
				$enlace->getUrl(),
				$idEstablecimiento
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
			//	throw new Exception ( "Error al realizar la insercion en la BD" );
				return false;
				break;
		}
	}

	
}

	
?>