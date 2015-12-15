<?php
require_once('core/PDOConnection.php');

require_once (__DIR__ . "/Codigo.php");


/**
 * Class Codigomapper
 *
 * Interfaz para el acceso a la base de dato de las entidades de Codigo
 *
 * @author Miguel Esmoris Lopez
 */
class Codigomapper {
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
	 * Recupera los codigos de un pincho a traves de su id
	 *
	 * @param Integer $idPincho El id del pincho del que se quieren recuperar los codigos
	 * @throws PDOException si existe un error con la base de datos
	 * @return $codigos Devuelve los codigos asociados al establecimiento. Devuelve null si se ha producido un error.
	 */
	public function recuperarCodigos($idPincho) {
		$stmt = $this->db->prepare ( "SELECT * FROM codigo WHERE pincho_idpincho=?");
		$stmt->execute ( array (
				$idPincho 
		) );
		$codigosRecuperados = $stmt->fetchAll();
		$codigos = array();
		foreach ($codigosRecuperados as $codigo) {
			$codigos[] = new Codigo($codigo["idcodigo"]);
		}
		return $codigos;
	}
}
