<?php
require_once('core/PDOConnection.php');

require_once (__DIR__ . "/Juradoprofesional.php");
require_once (__DIR__ . "/Establecimientomapper.php");
require_once (__DIR__ . "/Concursomapper.php");
require_once (__DIR__ . "/Pinchomapper.php");
require_once (__DIR__ . "/Pincho.php");

/**
 * Class Juradoprofesionalmapper
 *
 * Interfaz para el acceso a la base de dato de las entidades de Juradoprofesional
 *
 * @author Rafael Castillo alcaraz
 */
class Juradoprofesionalmapper {
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
	 * Recupera un juradoprofesional
	 *
	 * @param Juradoprofesional $jurado El jurado con id que se quiere recuperar de la base de datos
	 * @throws PDOException si existe un error con la base de datos
	 * @return JuradoProfesional El miembro del jurado recuperado de la base de datos. Devuelve null si se ha producido un error.
	 */
	public function recuperarJuradoProfesional($idJurado) {
		$stmt = $this->db->prepare ( "SELECT * FROM juradoprofesional WHERE idjuradoprofesional=?" );
		$stmt->execute ( array (
			$idJurado
			) );
		$juradoProfesional = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($juradoProfesional != null) {
			return new Juradoprofesional ( $juradoProfesional ["idjuradoprofesional"], $juradoProfesional ["nombre"], $juradoProfesional ["usuario"], $juradoProfesional ["email"], $juradoProfesional ["password"], $juradoProfesional ["telefono"], $juradoProfesional ["foto"], $juradoProfesional ["descripcion"] );
		} else {
			return NULL;
		}
	}

	/**
	 * Recupera la id de un juradoProfesional
	 *
	 * @param String $login El login del jurado del que se quiere recuperar la id
	 * @throws PDOException si existe un error con la base de datos
	 * @return Integer Devuelve la id asociada al login introducido. Devuelve null si se ha producido un error.
	 */
	public function recuperarIdProfesional($login) {
		$stmt = $this->db->prepare ( "SELECT * FROM juradoprofesional WHERE usuario=?" );
		$stmt->execute ( array (
				$login
		) );
		$juradoProfesional = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($juradoProfesional != null) {
			return $juradoProfesional["idjuradoprofesional"];
		} else {
			return NULL;
		}
	}

	/**
	* Recupera todos los jurados profesionales
	*
	* @throws PDOException si existe error con la base de datos
	* @return $jurados El array de jurados recuperados de la base de datos
	*/

	public function recuperarTodosLosJurados(){
		$stmt = $this->db->prepare ( "SELECT * FROM juradoprofesional");
		$stmt->execute();
		$juradosRecuperados = $stmt->fetchAll();
		$jurados = array();
		foreach ($juradosRecuperados as $jurado) {
			$jurados[] = new Juradoprofesional ( $jurado ["idjuradoprofesional"], $jurado ["nombre"], $jurado ["usuario"], $jurado ["email"], $jurado ["password"], $jurado ["telefono"], $jurado ["foto"], $jurado ["descripcion"] );
		}
		return $jurados;
	}

	/**
	 * Actualiza un miembro del jurado
	 *
	 * @param Juradoprofesional $jurado jurado con la id y los datos que se desean actualizar
	 * @param int $idConcurso identificador del concurso asociado al jurado
	 * @param int $idAdministrador identificador del administrador asociado al jurado
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se actualiza mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la actualizacion, false (0
	 */
	public function actualizarJuradoProfesional($jurado, $idConcurso, $idAdministrador) {
		$stmt = $this->db->prepare ( "UPDATE juradoprofesional SET usuario=?,nombre=?,email=?,password=?,foto=?,descripcion=?,telefono=?,concurso_idconcurso=?,administrador_idadministrador=? WHERE idjuradoprofesional=?" );
		$stmt->execute ( array (
			$jurado->get_login (),
			$jurado->get_nombre (),
			$jurado->get_email (),
			$jurado->get_password (),
			$jurado->get_foto (),
			$jurado->get_descripcion (),
			$jurado->get_telefono (),
			$idConcurso,
			$idAdministrador,
			$jurado->get_id ()
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
	 * Elimina un miembro del jurado
	 *
	 * @param Integer $id id del jurado que se desea eliminar
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se elimina mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la eliminacion, false (0) en caso contrario
	 */
	public function borrarJuradoProfesional($id) {
		$stmt = $this->db->prepare ( "DELETE from juradoprofesional WHERE idjuradoprofesional=?" );
		$stmt->execute ( array (
			$id
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
			//throw new Exception ( "Error al realizar la eliminaci�n en la BD" );
			return false;
			break;
		}
	}
	/**
	 * Inserta un nuevo miembro del jurado
	 *
	 * @param Juradoprofesional $jurado jurado con la id y los datos que se desean insertar
	 * @param int $idConcurso identificador del concurso asociado al jurado
	 * @param int $idAdministrador identificador del administrador asociado al jurado
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarJuradoProfesional($jurado, $idConcurso, $idAdministrador) {
		$stmt = $this->db->prepare ( "INSERT INTO juradoprofesional(usuario, nombre, email, password, foto, descripcion, telefono, concurso_idconcurso, administrador_idadministrador) values (?,?,?,?,?,?,?,?,?)" );
		$stmt->execute ( array (
			$jurado->get_login(),
			$jurado->get_nombre(),
			$jurado->get_email(),
			$jurado->get_password(),
			$jurado->get_foto(),
			$jurado->get_descripcion(),
			$jurado->get_telefono(),
			$idConcurso,
			$idAdministrador
			) );
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
	 * Asigna cada pincho confirmado a 3 jurados profesionales
	 * 
	 * @throws PDOException si existe un error con la base de datos
	 * @return Boolean Devuelve true si los pinchos se han repartidos
	 */

	public function asignarPinchosJurados(){
		$establecimientoMapper = new Establecimientomapper();
		$pinchoMapper = new Pinchomapper();
		$juradoProfesionalMap = new Juradoprofesionalmapper();
		$concursoMapper = new Concursomapper();
		$establecimientosConfirmados = $establecimientoMapper->recuperarConfirmados();
		$pinchosConfirmados = $pinchoMapper->recuperarPinchosAsociados($establecimientosConfirmados);
		$jurados = $juradoProfesionalMap->recuperarTodosLosJurados();
		$numJurados = count($jurados);
		$i = 0;
		foreach ($pinchosConfirmados as $pincho) {
			// Se asigna cada pincho a tres jurados
			for($j=0;$j<3;$j++){
				$jurado = $jurados[$i];
				$juradoProfesionalMap->asignarPincho($jurado,$pincho);
				$i++;
				if($i>=$numJurados){
					$i=0;
				}
			}			
		}
		$concursoMapper->asignacionesCompletadas(1);	
	}


	/**
	* Devuelve el numero de jurados profesionales registrados
	* @return Integer. Numero de jurados registrados.
	**/
	public function contarJurados() {
		$stmt = $this->db->prepare ( "SELECT * FROM juradoprofesional" );
		$stmt->execute();
		$count = $stmt->rowCount ();
		return $count;
	}

	/**
	 * Asigna un pincho a un miembro del jurado
	 *
	 * @param Juradoprofesional $jurado jurado con la id al que se le debe asignar un pincho
	 * @param Pincho $pincho pincho con la id que se desea asignar a un jurado
	 * @param int $idAdministrador identificador del administrador asociado al jurado
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la asignacion, false (0) en caso contrario
	 */
	public function asignarPincho($jurado, $pincho) {
		$stmt = $this->db->prepare ( "INSERT INTO votacionprofesional(votacionfinalista, notavotoprofesional, pincho_idpincho, juradoprofesional_idjuradoprofesional) values (?,?,?,?)" );
		$stmt->execute ( array (
				0, // Para indicar que se trata de una votacion previa
				NULL, // Al realizar la asignacion, la nota otorgada se mantiene a null
				$pincho->getId (), 
				$jurado->get_id ()
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
	 * Valida el login del juradoProfesional
	 *
	 * @param Login $login login con el usuario que se va a loguear
	 * @param string $pass contrase�a del juradoProfesional que se loguea
	 * @throws PDOException si existe un error con la base de datos
	 */
	public function validarLogin($login,$pass){
		$sentencia = $this->db->prepare ("SELECT * from juradoprofesional WHERE usuario=? and password=?");
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
