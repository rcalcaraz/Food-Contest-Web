<?php
require_once('core/PDOConnection.php');

require_once (__DIR__ . "/Pincho.php");

require_once (__DIR__ . "/Ingrediente.php");

require_once (__DIR__ . "/Alergeno.php");


/**
 * Class IngredienteAlergenomapper
 *
 * Interfaz para el acceso a la base de dato de las entidades de Ingrediente y Alergeno
 *
 * @author Edgar Figueiras Gómez
 */
class IngredienteAlergenomapper {
	/**
	 * Referencia a la conexion PDO
	 * 
	 * @var PDO
	 */
	private $db;
	
	public function __construct() {
		$this->db = PDOConnection::getInstance ();
	}

	/* ----------------INGREDIENTE-------------------*/
	/**
	 * Recupera un Ingrediente
	 *
	 * @param $idIngrediente La id del ingrediente que se quiere recuperar de la base de datos
	 * @throws PDOException si existe un error con la base de datos
	 * @return $Ingrediente El ingrediente recuperado de la base de datos. Devuelve null si se ha producido un error.
	 */
	public function recuperarIngrediente($idIngrediente) {
		$stmt = $this->db->prepare ( "SELECT * FROM ingrediente WHERE idingrediente=?" );
		$stmt->execute ( array (
				$idIngrediente 
		) );
		$Ingrediente = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($Ingrediente != null) {
			return new Ingrediente ( $Ingrediente ["idingrediente"], $Ingrediente ["nombre"]);
		} else {
			return NULL;
		}
	}
	

	/**
	 * Actualiza un ingrediente 
	 *
	 * @param Ingrediente $idIngrediente id del ingrediente a actualizar
	 * @param int $nombreIngrediente nuevo nombre del ingrediente
	 * @throws PDOException si existe un error con la base de datos	 
	 * @throws Exception si se actualiza mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la actualizacion, false (0) en caso contrario
	 */
	public function actualizarIngrediente($idIngrediente, $nombreIngrediente) {
		$stmt = $this->db->prepare ( "UPDATE ingrediente SET nombre=? WHERE idingrediente=?" );
		$stmt->execute ( array (
				$nombreIngrediente,
				$idIngrediente
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
			//	throw new Exception ( "Error al realizar la actualizacion en la BD" );
				return false;
				break;
		}
	}
	
	/**
	 * Elimina un ingrediente
	 *
	 * @param  $idIngrediente id del ingrediente que se desea eliminar
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se elimina mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la eliminacion, false (0) en caso contrario
	 */
	public function borrarIngrediente($idIngrediente) {
		$stmt = $this->db->prepare ( "DELETE from ingrediente WHERE idIngrediente=?" );
		$stmt->execute ( array (
				$idIngrediente 
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
	 * Recupera la id del ingrediente a partir de su nombre
	 *
	 * @param $nombreIngrediente Nombre del ingrediente del que se quiere recuperar la id
	 * @throws PDOException si existe un error con la base de datos
	 * @return $idIngrediente id del Ingrediente recuperado
	 */
	public function recuperaIdIngredientePorNombre($nombreIngrediente) {
		$stmt = $this->db->prepare ( "SELECT idingrediente FROM ingrediente WHERE nombre=?" );
		$stmt->execute ( array (
				$nombreIngrediente,
		) );
		$idIngrediente = $stmt->fetchColumn(0);
		if ($idIngrediente != null) {
			return $idIngrediente	;
		} else {
			return 0;
		}
	}
	
	/**
	 * Inserta un nuevo ingrediente
	 * 
	 *
	 * @param $nombreIngrediente nombre del ingrediente que se va a insertar
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarIngrediente($nombreIngrediente) {
		$stmt = $this->db->prepare ( "INSERT INTO ingrediente(nombre) values (?)" );
		$stmt->execute ( array (
				$nombreIngrediente
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

	
	/* ----------------ALERGENO-------------------*/
	
	/**
	 * Recupera un Alergeno
	 *
	 * @param $idAlergeno La id del alergeno que se quiere recuperar de la base de datos
	 * @throws PDOException si existe un error con la base de datos
	 * @return $Alergeno El alergeno recuperado de la base de datos. Devuelve null si se ha producido un error.
	 */
	public function recuperarAlergeno($idAlergeno) {
		$stmt = $this->db->prepare ( "SELECT * FROM alergeno WHERE idalergeno=?" );
		$stmt->execute ( array (
				$idAlergeno
		) );
		$Alergeno = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($Alergeno != null) {
			return new Alergeno ( $Alergeno ["idalergeno"], $Alergeno ["nombre"]);
		} else {
			return NULL;
		}
	}
	
	

	/**
	 * Actualiza un alergeno
	 *
	 * @param $idAlergeno id del alergeno a actualizar
	 * @param int $nombreAlergeno nuevo nombre del alergeno
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se actualiza mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la actualizacion, false (0) en caso contrario
	 */
	public function actualizarAlergeno($idAlergeno, $nombreAlergeno) {
		$stmt = $this->db->prepare ( "UPDATE alergeno SET nombre=? WHERE idalergeno=?" );
		$stmt->execute ( array (
				$nombreAlergeno,
				$idAlergeno
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
				//throw new Exception ( "Error al realizar la actualizacion en la BD" );
				return false;
				break;
		}
	}
	
	/**
	 * Elimina un alergeno
	 *
	 * @param  $idAlergeno id del alergeno que se desea eliminar
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se elimina mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la eliminacion, false (0) en caso contrario
	 */
	public function borrarAlergeno($idAlergeno) {
		$stmt = $this->db->prepare ( "DELETE from alergeno WHERE idalergeno=?" );
		$stmt->execute ( array (
				$idAlergeno
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
	 * Recupera la id del alergeno a partir de su nombre
	 *
	 * @param $nombreAlergeno Nombre del alergeno del que se quiere recuperar la id
	 * @throws PDOException si existe un error con la base de datos
	 * @return $idAlergeno id del Alergeno recuperado
	 */
	public function recuperaIdAlergenoPorNombre($nombreAlergeno) {
		$stmt = $this->db->prepare ( "SELECT idalergeno FROM alergeno WHERE nombre=?" );
		$stmt->execute ( array (
				$nombreAlergeno,
		) );
		$idAlergeno = $stmt->fetchColumn(0);
		if ($idAlergeno != null) {
			return $idAlergeno	;
		} else {
			return 0;
		}
	}
	

	/**
	 * Inserta un nuevo alergeno
	 *
	 *
	 * @param $nombreAlergeno nombre del alergeno que se va a insertar
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarAlergeno($nombreAlergeno) {
		$stmt = $this->db->prepare ( "INSERT INTO alergeno(nombre) values (?)" );
		$stmt->execute ( array (
				$nombreAlergeno
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

	/* ----------------INGREDIENTE TIENE ALERGENO-------------------*/
	
	/**
	 * Inserta una relacion en la tabla ingrediente_has_alergeno formada por un ingrediente y un alergeno
	 *
	 * @param $idIngrediente id del ingrediente que se va a insertar
	 * @param $idAlergeno id del alergeno que se va a insertar
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarIngredienteTieneAlergeno($idIngrediente,$idAlergeno) {
		$stmt = $this->db->prepare ( "INSERT INTO ingrediente_has_alergeno(ingrediente_idingrediente,alergeno_idalergeno)
										values (?,?)" );
		$stmt->execute ( array (
				$idIngrediente,
				$idAlergeno
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
	
	/**
	 * Elimina una relacion de la tabla ingrediente_has_alergeno formada por un ingrediente y un alergeno
	 *
	 * @param $idIngrediente id del ingrediente que forma la relacion
	 * @param $idAlergeno id del alergeno que forma la relacion
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se elimina mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la eliminacion, false (0) en caso contrario
	 */
	public function borrarIngredienteConAlergeno($idIngrediente, $idAlergeno) {
		$stmt = $this->db->prepare ( "DELETE from ingrediente_has_alergeno WHERE ingrediente_idingrediente=? AND alergeno_idalergeno=?" );
		$stmt->execute ( array (
				$idIngrediente,
				$idAlergeno
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
	 * Recupera todos los alergenos asociados a un ingrediente
	 *
	 * @param $idIngrediente id del ingrediente del que van a recuperarse los alergenos
	 * @throws PDOException si existe error con la base de datos
	 * @return $alergenos El array de alergenos recuperados de la base de datos
	 */
	
	public function recuperarAlergenosDeIngrediente($idIngrediente){
		$stmt = $this->db->prepare ( "SELECT alergeno_idalergeno FROM ingrediente_has_alergeno WHERE ingrediente_idingrediente=?");
		$stmt->execute ( array (
				$idIngrediente
		) );
		$idAlergenosRecuperados = $stmt->fetchAll();
		$alergenos= array();
		foreach ($idAlergenosRecuperados as $idAlergeno) {
			$alergenos[] = $this->recuperarAlergeno($idAlergeno[0]);
		}
		return $alergenos;
	}
	
	/**
	 * Recupera todos los ingredientes asociados a un alergeno
	 *
	 * @param $idAlergeno id del alergeno del que van a recuperarse los ingredientes que lo contienen
	 * @throws PDOException si existe error con la base de datos
	 * @return $ingredientes El array de ingredientes recuperados de la base de datos
	 */
	
	public function recuperarIngredientesPorAlergeno($idAlergeno){
		$stmt = $this->db->prepare ( "SELECT ingrediente_idingrediente FROM ingrediente_has_alergeno WHERE alergeno_idalergeno=?");
		$stmt->execute ( array (
				$idAlergeno
		) );
		$idIngredientesRecuperados = $stmt->fetchAll();
		$ingredientes= array();
		foreach ($idIngredientesRecuperados as $idIngrediente) {
			$ingredientes[] = $this->recuperarIngrediente($idIngrediente[0]);
		}
		print_r($ingredientes);
		return $ingredientes;
	}
	
	
/* ----------------PINCHO TIENE INGREDIENTE-------------------*/
	
	/**
	 * Inserta una relacion en la tabla pincho_has_ingrediente formada por un ingrediente y un pincho
	 *
	 * @param $idIngrediente id del ingrediente que se va a insertar
	 * @param $idPincho id del pincho que se va a insertar
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarIngredienteDePincho($idIngrediente,$idPincho) {
		$stmt = $this->db->prepare ( "INSERT INTO pincho_has_ingrediente(ingrediente_idingrediente,pincho_idpincho)
										values (?,?)" );
		$stmt->execute ( array (
				$idIngrediente,
				$idPincho
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
	
	/**
	 * Elimina una relacion de la tabla pincho_has_ingrediente formada por un ingrediente y un pincho
	 *
	 * @param $idIngrediente id del ingrediente que forma la relacion
	 * @param $idPincho id del pincho que forma la relacion
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se elimina mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la eliminacion, false (0) en caso contrario
	 */
	public function borrarIngredienteDePincho($idIngrediente, $idPincho) {
		$stmt = $this->db->prepare ( "DELETE from pincho_has_ingrediente WHERE ingrediente_idingrediente=? AND pincho_idpincho=?" );
		$stmt->execute ( array (
				$idIngrediente,
				$idPincho
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
	 * Recupera todos los pinchos asociados a un ingrediente
	 *
	 * @param $idIngrediente id del ingrediente del que van a recuperarse los pinchos en los que aparece
	 * @throws PDOException si existe error con la base de datos
	 * @return $pinchos El array de pinchos recuperados de la base de datos
	 */
	
	public function recuperarPinchosConIngrediente($idIngrediente){
		$mapPinchos = new Pinchomapper();
		$stmt = $this->db->prepare ( "SELECT pincho_idpincho FROM pincho_has_ingrediente WHERE ingrediente_idingrediente=?");
		$stmt->execute ( array (
				$idIngrediente
		) );
		$idPinchosRecuperados = $stmt->fetchAll();
		$pinchos= array();
		//Linea añadida para mejorar el funcionamiento de recuperarPinchosConAlergeno() ya que hay muchos ingredientes que 
		//no están en ningún pincho
		if($idPinchosRecuperados == NULL) return NULL;
		foreach ($idPinchosRecuperados as $idPincho) {
			$pinchos[] = $mapPinchos->recuperarPincho($idPincho[0]);
		}
		//print_r($pinchos[]);		
		return $pinchos;
	}
	
	/**
	 * Recupera todos los ingredientes asociados a un pincho
	 *
	 * @param $idPincho id del pincho del que van a recuperarse los ingredientes
	 * @throws PDOException si existe error con la base de datos
	 * @return $ingredientes El array de ingredientes recuperados de la base de datos
	 */
	
	public function recuperarIngredientesDePincho($idPincho){
		$stmt = $this->db->prepare ( "SELECT ingrediente_idingrediente FROM pincho_has_ingrediente WHERE pincho_idpincho=?");
		$stmt->execute ( array (
				$idPincho
		) );
		$idIngredientesRecuperados = $stmt->fetchAll();
		$ingredientes= array();
		foreach ($idIngredientesRecuperados as $idIngrediente) {
			$ingredientes[] = $this->recuperarIngrediente($idIngrediente[0]);
		}
		print_r($ingredientes);		
		return $ingredientes;
	}
	
	/* ----------------PINCHO TIENE INGREDIENTES QUE TIENE ALERGENOS-------------------*/
	
	/**
	 * Recupera todos los alergenos asociados a un pincho
	 *
	 * @param $idPincho id del pincho del que van a recuperarse los alergenos
	 * @throws PDOException si existe error con la base de datos
	 * @return $alergenos El array de alergenos recuperados de la base de datos
	 */
	
	public function recuperarAlergenosDePincho($idPincho){
		$stmt = $this->db->prepare ( "SELECT ingrediente_idingrediente FROM pincho_has_ingrediente WHERE pincho_idpincho=?");
		$stmt->execute ( array (
				$idPincho
		) );
		$idIngredientesRecuperados = $stmt->fetchAll();
		$alergenos= array();
		foreach ($idIngredientesRecuperados as $idIngrediente) {
			$alergenos[] = $this->recuperarAlergenosDeIngrediente($idIngrediente[0]);
		}
		//print_r($alergenos);
		return $alergenos;
	}
	
	/**
	 * Recupera todos los pinchos asociados a un alergeno
	 *
	 * @param $idAlergeno id del alergeno del que van a recuperarse los pinchos
	 * @throws PDOException si existe error con la base de datos
	 * @return $pinchos El array de pinchos recuperados de la base de datos
	 */
	
	public function recuperarPinchosConAlergeno($idAlergeno){
		$mapPincho = new Pinchomapper();
		$stmt = $this->db->prepare ( "SELECT ingrediente_idingrediente FROM ingrediente_has_alergeno WHERE alergeno_idalergeno=?");
		$stmt->execute ( array (
				$idAlergeno
		) );
		$idIngredientesRecuperados = $stmt->fetchAll();
		$alergenos= array();
		foreach ($idIngredientesRecuperados as $idIngrediente) {
				//Con este if compruebo que el ingrediente pertenece a algun pincho, evito asi que el vector
				//$pinchos se llene de nulls cuando el ingrediente no tiene pinchos asociados
				if($this->recuperarPinchosConIngrediente($idIngrediente[0]) != NULL)
				{
					$pinchos[] = $this->recuperarPinchosConIngrediente($idIngrediente[0]);
				}
		}
		print_r($pinchos);
		return $pinchos;
	}
	
}

	
?>
