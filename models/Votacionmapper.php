<?php
require_once('core/PDOConnection.php');

require_once (__DIR__ . "/VotacionPopular.php");

require_once (__DIR__ . "/VotacionProfesional.php");

require_once (__DIR__ . "/Pinchomapper.php");

/**
 * Class Votacionmapper
 *
 * Interfaz para el acceso a la base de dato de las entidades de VotacionPopupar y VotacionProfesional
 *
 * @author Edgar Figueiras Gómez
 */

class Votacionmapper {
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
	 * Inserta una nueva VotacionPopular
	 *
	 * Comprueba ademas si el codigo insertado es correcto y lo borra de la base de taba de codigos tras su insercion
	 *
	 * @param Pincho $idPincho id del pincho que se va a votar
	 * @param int $idJuradoPPopular identificador del jurado que vota
	 * @param int $idCodigo Codigo asignado al pincho que permite efectuar 1 voto
	 * @param int $votado Informa sobre si el pincho ha sido votado(1) o solo listado(0)
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarVotacionPopular($idJuradoPopular, $idPincho, $idCodigo, $votado) {
		$pinchoMapper = new Pinchomapper();
		if($pinchoMapper->compruebaCodigo($idCodigo, $idPincho) != 1)
		{
			throw new Exception ( "Error el codigo no es valido" );
		}
		$stmt = $this->db->prepare ( "INSERT INTO votacionpopular(juradopopular_idjuradopopular, 
									pincho_idpincho, codigo_idcodigo, votado) values (?,?,?,?)" );
		$stmt->execute ( array (
				$idJuradoPopular,
				$idPincho,
				$idCodigo,
				$votado
		) );
		$count = $stmt->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				$pinchoMapper->borrarCodigo($idCodigo);
				return true;
				break;
			default :
				//throw new Exception ( "Error al realizar la insercion en la BD" );
				return false;
				break;
		}
	}
	
	/**
	 * Inserta una triple VotacionPopular
	 *
	 * Comprueba ademas si los codigos insertados son correctos y los borra de la base de datos en la tabla de codigos tras su insercion
	 *
	 * @param int $idJuradoPPopular identificador del jurado que vota
	 * @param Pincho $idPincho1, $idPincho2, $idPincho3 ids de los pinchos que sen va a votar
	 * @param int $idCodigo1, $idCodigo2, $idCodigo2, Codigos asignado a los pinchos que permiten efectuar 1 votacion por cada pincho
	 * @param int $votado1, $votado2, $votado3 Informa sobre si el pincho ha sido votado(1) o solo listado(0)
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos, si se insertan codigos erroneos, si se vota a mas de un pincho
	 * @return boolean. Devuelve true si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarTripleVotacionPopular($idJuradoPopular, $idPincho1, $idCodigo1, $votado1, $idPincho2, $idCodigo2, $votado2, $idPincho3, $idCodigo3, $votado3) {
		$pinchoMapper = new Pinchomapper();
		if($votado1+$votado2+$votado3!=1)
		{
			//throw new Exception ( "Error, solo puede votarse un pincho de los 3, será por las veces que te lo tengo dicho" );
			return false;
		}
		if($pinchoMapper->compruebaCodigo($idCodigo1, $idPincho1) != 1 || $pinchoMapper->compruebaCodigo($idCodigo2, $idPincho2) != 1 || $pinchoMapper->compruebaCodigo($idCodigo3, $idPincho3) != 1)
		{
			//throw new Exception ( "Error el codigo no es valido" );
			//throw new Exception ( "Error, solo puede votarse un pincho de los 3, será por las veces que te lo tengo dicho" );
			return false;
		}
		if($idCodigo1 == $idCodigo2 || $idCodigo2 == $idCodigo3 || $idCodigo1 == $idCodigo3)
		{
			//throw new Exception ( "Error el codigo no es valido" );
			//throw new Exception ( "Error, solo puede votarse un pincho de los 3, será por las veces que te lo tengo dicho" );
			return false;
		}
		
		$stmt = $this->db->prepare ( "INSERT INTO votacionpopular(juradopopular_idjuradopopular,
									pincho_idpincho, codigo_idcodigo, votado) values (?,?,?,?),(?,?,?,?),(?,?,?,?)" );
		$stmt->execute ( array (
				$idJuradoPopular,
				$idPincho1,
				$idCodigo1,
				$votado1,
				$idJuradoPopular,
				$idPincho2,
				$idCodigo2,
				$votado2,
				$idJuradoPopular,
				$idPincho3,
				$idCodigo3,
				$votado3
		) );
		$count = $stmt->rowCount ();
		switch ($count) {
			case 3 :
				$pinchoMapper->borrarCodigo($idCodigo1);
				$pinchoMapper->borrarCodigo($idCodigo2);
				$pinchoMapper->borrarCodigo($idCodigo3);
				return true;
				break;
			default :
				//throw new Exception ( "Error al realizar la insercion en la BD" );
				return false;
				break;
		}
	}

	/**
	 * Recupera una votacionPopular
	 *
	 * @param $idJuradoPopular La id del juradoPopular asociado al voto
	 * @param $idPincho La id del pincho asociado al voto
	 * @param $idCodigo La id del codigo asociad al voto
	 * @throws PDOException si existe un error con la base de datos
	 * @return $VotacionPopular La votacion recuperada de la base de datos. Devuelve null si se ha producido un error.
	 */
	public function recuperarValorVotacionPopular($idJuradoPopular, $idPincho, $idCodigo) {
		$stmt = $this->db->prepare ( "SELECT * FROM votacionpopular WHERE juradopopular_idjuradopopular=? AND 
									pincho_idpincho=? AND codigo_idcodigo=?" );
		$stmt->execute ( array (
				$idJuradoPopular,
				$idPincho,
				$idCodigo
		) );
		$VotacionPopular = $stmt->fetchColumn(0);
		if ($VotacionPopular != null) {
			return $VotacionPopular;
		} else {
			return 0;
		}
	}
	
	/**
	 * Recupera todas las veces que se ha votado un pincho
	 *
	 * @param $idPincho La id del pincho del que van a recuperarse los votos
	 * @throws PDOException si existe un error con la base de datos
	 * @return $totalVotos Numero total de votos que ha recibido el Pincho cuya id es $idPincho
	 */
	public function recuperarVecesVotadoP($idPincho) {
		$stmt = $this->db->prepare ( "SELECT COUNT(*) FROM votacionpopular WHERE pincho_idpincho=? AND votado=1" );
		$stmt->execute ( array (
				$idPincho
		) );
		$totalVotos = $stmt->fetchColumn(0);
		if ($totalVotos != null) {
			return $totalVotos;
		} else {
			return 0;
		}
	}
	
	/**
	 * Recupera todas las veces que se ha listado un pincho
	 *
	 * @param $idPincho La id del pincho del que van a recuperarse los votos
	 * @throws PDOException si existe un error con la base de datos
	 * @return $totalListado Numero total de veces que ha sido listado y no votado el pincho cuya id es $idPincho
	 */
	public function recuperarVecesListado($idPincho) {
		$stmt = $this->db->prepare ( "SELECT COUNT(*) FROM votacionpopular WHERE pincho_idpincho=? AND votado=0" );
		$stmt->execute ( array (
				$idPincho
		) );
		$totalVotos = $stmt->fetchColumn(0);
		if ($totalVotos != null) {
			return $totalVotos;
		} else {
			return 0;
		}
	}
	


	/**
	 * Inserta una nueva VotacionProfesional
	 *
	 * @param int $votoFinalista Identifica si es una votacion de la fase final(1) o no(0)
	 * @param int $nota Valor de la votacion
	 * @param Pincho $idPincho id del pincho que se va a votar
	 * @param int $idJuradoProfesional identificador del jurado que vota
	 * 
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarVotacionProfesional($votoFinalista, $nota, $idPincho, $idJuradoProfesional) {
		$stmt = $this->db->prepare ( "INSERT INTO votacionprofesional(juradoprofesional_idjuradoprofesional,
										pincho_idpincho, votacionfinalista, notavotoprofesional) values (?,?,?,?)" );
		$stmt->execute ( array (
				$idJuradoProfesional,
				$idPincho,
				$votoFinalista,
				$nota
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
	 * Elimina una VotacionProfesional
	 *
	 * @param int $votoFinalista Identifica si es una votacion de la fase final(1) o no(0)
	 * @param Pincho $idPincho id del pincho que se va a votar
	 * @param int $idJuradoProfesional identificador del jurado que vota
	 * 
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function borraVotacionProfesional($votoFinalista, $idPincho, $idJuradoProfesional) {
		$stmt = $this->db->prepare ( "DELETE FROM votacionprofesional WHERE votacionfinalista=? 
									AND pincho_idpincho=? AND juradoprofesional_idjuradoprofesional=?" );
		$stmt->execute ( array (
				$votoFinalista,
				$idPincho,
				$idJuradoProfesional
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
				//throw new Exception ( "Error al realizar el borrado en la BD" );
				return false;
				break;
		}
	}
	
	/**
	 * Modifica una VotacionProfesional
	 *
	 * @param int $votoFinalista Identifica si es una votacion de la fase final(1) o no(0)
	 * @param int $nota valor de la nota que se va a modificar
	 * @param Pincho $idPincho id del pincho que se va a votar
	 * @param int $idJuradoProfesional identificador del jurado que vota
	 *
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */	
	public function modificaVotacionProfesional($votoFinalista, $nota, $idPincho, $idJuradoProfesional) {
		$stmt = $this->db->prepare ( "UPDATE votacionprofesional SET notavotoprofesional=? WHERE votacionfinalista=? AND pincho_idpincho=? AND juradoprofesional_idjuradoprofesional=?" );
		$stmt->execute ( array (
				$nota,
				$votoFinalista,
				$idPincho,
				$idJuradoProfesional
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
			//	throw new Exception ( "Error al realizar el borrado en la BD" );
				return false;
				break;
		}
	}
	
	/**
	 * Recupera la nota de una votacionProfesional
	 *
	 * @param $idJuradoProfesional La id del juradoPopular asociado al voto
	 * @param $idPincho La id del pincho asociado al voto
	 * @param $votacionFinal La informacion de si es un voto de fase final o no
	 * @throws PDOException si existe un error con la base de datos
	 * @return $notaVotacionProfesional La votacion recuperada de la base de datos. Devuelve null si se ha producido un error.
	 */
	public function recuperarValorVotacionProfesional($idJuradoProfesional, $idPincho, $votacionFinal) {
		$stmt = $this->db->prepare ( "SELECT notavotoprofesional FROM votacionprofesional WHERE juradoprofesional_idjuradoprofesional=? AND
									pincho_idpincho=? AND votacionfinalista=?" );
		$stmt->execute ( array (
				$idJuradoProfesional,
				$idPincho,
				$votacionFinal
		) );
		$notaVotacionProfesional = $stmt->fetchColumn(0);
		if ($notaVotacionProfesional != null) {
			return $notaVotacionProfesional;
		} else {
			return 0;
		}
	}
	
	/**
	 * Recupera la media de todas las notas de un pincho
	 *
	 * @param $idPincho La id del pincho asociado al voto
	 * @param $votacionFinal La informacion de si es un voto de fase final o no
	 * @throws PDOException si existe un error con la base de datos
	 * @return $notaVotacionProfesional La votacion recuperada de la base de datos. Devuelve null si se ha producido un error.
	 */
	public function recuperarMediaProfesional($idPincho, $votacionFinal) {
		$stmt = $this->db->prepare ( "SELECT AVG(notavotoprofesional) FROM votacionprofesional WHERE
									pincho_idpincho=? AND votacionfinalista=?" );
		$stmt->execute ( array (
				$idJuradoProfesional,
				$idPincho,
				$votacionFinal
		) );
		$notaMediaVotacionProfesional = $stmt->fetchColumn(0);
		if ($notaMediaVotacionProfesional != null) {
			return $notaMediaVotacionProfesional;
		} else {
			return 0;
		}
	}
	
	/**
	 * Recupera todos los pinchos asignados a un juradoProfesional que aun no han sido votados
	 *
	 * @param $idJuradoProfesional La id del juradoPopular al que se le han asignado los pinchos
	 *
	 * @throws PDOException si existe error con la base de datos
	 * @return $pinchos El array de pinchos asignados al juradoProfesional cuya id es $idJuradoProfesional
	 */
	
	public function recuperarPinchosAsignadosJuradoProfesional($idJuradoProfesional){
		$pinchoMapper = new Pinchomapper();
		$stmt = $this->db->prepare ( "SELECT pincho_idpincho FROM votacionprofesional WHERE juradoprofesional_idjuradoprofesional=? AND notavotoprofesional IS NULL");
		$stmt->execute ( array (
				$idJuradoProfesional
		) );
		$idPinchosRecuperados = $stmt->fetchAll();
		$pinchos = array();
		foreach ($idPinchosRecuperados as $idPincho) {
			$pinchos[] = $pinchoMapper->recuperarPincho($idPincho[0]);
		}
		return $pinchos;
	}
}
	
?>
