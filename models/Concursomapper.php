<?php
require_once('core/PDOConnection.php');

require_once (__DIR__ . "/Concurso.php");

/**
 * ClassConcursomapper
 *
 * Interfaz para el acceso a la base de dato de las entidades de Concurso
 *
 * @author Daniel Rodr�guez Cacheiro
 */
class Concursomapper {
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
	 * Crea un concurso
	 *
	 * @param Concurso $concurso El concurso con id que se quiere crear el nuevo concurso
	 * @param Administrador $idAdministrador El administrador que llevara el concurso
	 * @throws PDOException si existe un error con la base de datos
	 * @return Concurso El concurso de la base de datos. Devuelve null si se ha producido un error.
	 */
 /*
	public function creaNuevoConcurso($concurso,$idAdministrador) {
		$stmt = $this->db->prepare("INSERT INTO concurso(comienzovotacion, finalvotacionpopular, finalvotacionprofesional, comienzovotacionfinalistas, finalvotacionfinalistas, folleto , nombre_concurso) values (?,?,?,?,?,?,?,?)");
		$stmt->execute ( array (
				$concurso->get_nombre_concurso(),
				$concurso->get_comienzo_vot_popular(),
				$concurso->get_comienzo_vot_finalistas(),
				$concurso->get_final_vot_finalistas(),
				$concurso->get_final_vot_pro(),
				$concurso->get_final_votacion_pop(),
				$concurso->get_folleto(),
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
 */
	/**
	 * Recupera un concurso
	 *
	 * @param Concurso $concurso El concurso con id que se quiere recuperar de la base de datos
	 * @throws PDOException si existe un error con la base de datos
	 * @return Concurso El concurso de la base de datos. Devuelve null si se ha producido un error.
	 */

	public function recuperarConcurso($id_concurso) {
		$stmt= $this->db->prepare( "SELECT * FROM concurso WHERE idconcurso=1" );
		$stmt->execute();
		$concurso = $stmt-> fetch(PDO::FETCH_ASSOC);
		if ($concurso != null) {
			return new Concurso($concurso["idconcurso"],$concurso["nombre"],$concurso["comienzovotacion"],$concurso["finalvotacionpopular"],$concurso["finalvotacionprofesional"],$concurso["comienzovotacionfinalistas"],$concurso["finalvotacionfinalistas"],null);
		} else {
			return false;
		}
	}

	/**
	 * Actualizar/modificar un concurso
	 *
	 * @param Concurso $concurso El concurso con id que se quiere modificar de la base de datos
	 * @throws PDOException si existe un error con la base de datos
	 * @return Concurso El concurso de la base de datos. Devuelve null si se ha producido un error.
	 */

	public function modificarConcursoActual($concurso){
		$stmt= $this->db->prepare("UPDATE concurso SET comienzovotacion=?, finalvotacionpopular=?, finalvotacionprofesional=?, comienzovotacionfinalistas=?, finalvotacionfinalistas=? WHERE idconcurso=1");
		$stmt->execute( array (
			$concurso->get_comienzo_vot_popular(),
			$concurso->get_final_vot_pop(),
			$concurso->get_final_vot_pro(),
			$concurso->get_comienzo_vot_finalistas(),
			$concurso->get_final_vot_finalistas()
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
				//throw new Exception ( "Error al realizar la actualizacion en la BD" );
				return false;
				break;
		}
	}


	/**
	 * Subir un folleto para el concurso
	 *
	 * @param String $folleto El folleto que se quiere a�adir en la base de datos
	 * @throws PDOException si existe un error con la base de datos
	 * @return Concurso El concurso de la base de datos. Devuelve null si se ha producido un error.
	 */

	public function subirFolleto($folleto){
		$stmt= $this->db->prepare("UPDATE concurso SET folleto=? WHERE idconcurso=1");
		$stmt->execute( array(
				$folleto
		) );
		$count = $stmt->rowCount ();
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
	
	/**
	 * Pasa el estado del concurso a la fase final de votaciones
	 *
	 * @param Concurso $concurso El concurso con id que se desea pasar a la fase final
	 * @throws PDOException si existe un error con la base de datos
	 * @return $boolean Devuelve true si se ha pasado a la fase final con éxito y false en caso contrario.
	 */
	
	public function faseFinal($id_concurso) {
		$stmt= $this->db->prepare( "UPDATE concurso SET elegidosfinalistas=1 WHERE idconcurso=1" );
		$stmt->execute();
		$count = $stmt->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				return true;
				break;
			default :
				return false;
				break;
		}
	}

	/**
	 * Cambia el estado del concurso a pinchos repartidos
	 *
	 * @param Concurso $concurso El concurso con id que se desea pasar a la fase final
	 * @throws PDOException si existe un error con la base de datos
	 * @return $boolean Devuelve true si se ha pasado al periodo con pinchos repartidos.
	 */
	
	public function asignacionesCompletadas($id_concurso) {
		$stmt= $this->db->prepare( "UPDATE concurso SET repartidospinchos=1 WHERE idconcurso=1" );
		$stmt->execute();
		$count = $stmt->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				return true;
				break;
			default :
				return false;
				break;
		}
	}

	/**
	 * Devuelve true si el concurso se encuentra en su fase final
	 *
	 * @throws PDOException si existe un error con la base de datos
	 * @return $boolean Devuelve true si el concurso se encuentra en su fase final
	 */
	
	public function faseFinalAlcancada() {
		$stmt= $this->db->prepare( "SELECT * FROM concurso WHERE idconcurso=1" );
		$stmt->execute();
		$concurso = $stmt-> fetch(PDO::FETCH_ASSOC);
		if ($concurso != null) {
			return $concurso["elegidosfinalistas"];
		} else {
			return false;
		}
	}

	/**
	 * Devuelve true si se han asignado los pinchos a los jurados profesionales
	 *
	 * @throws PDOException si existe un error con la base de datos
	 * @return $boolean Devuelve true si el concurso se encuentra en su fase final
	 */
	
	public function pinchosRepartidos() {
		$stmt= $this->db->prepare( "SELECT * FROM concurso WHERE idconcurso=1" );
		$stmt->execute();
		$concurso = $stmt-> fetch(PDO::FETCH_ASSOC);
		if ($concurso != null) {
			return $concurso["repartidospinchos"];
		} else {
			return false;
		}
	}
}
