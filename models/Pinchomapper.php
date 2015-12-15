<?php
require_once('core/PDOConnection.php');

require_once (__DIR__ . "/Pincho.php");

require_once (__DIR__ . "/Establecimiento.php");

require_once (__DIR__ . "/Establecimientomapper.php");

require_once (__DIR__ . "/Concursomapper.php");

require_once (__DIR__ . "/Codigo.php");

/**
 * Class Pinchomapper
 *
 * Interfaz para el acceso a la base de dato de las entidades de Pincho
 *
 * @author Edgar Figueiras Gómez
 */
class Pinchomapper {
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
	 * Recupera un pincho
	 *
	 * @param $idPincho La id del pincho que se quiere recuperar de la base de datos
	 * @throws PDOException si existe un error con la base de datos
	 * @return $Pincho El pincho recuperado de la base de datos. Devuelve null si se ha producido un error.
	 */
	public function recuperarPincho($idPincho) {
		$stmt = $this->db->prepare ( "SELECT * FROM pincho WHERE idpincho=?" );
		$stmt->execute ( array (
				$idPincho 
		) );
		$Pincho = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($Pincho != null) {
			return new Pincho ( $Pincho ["idpincho"], $Pincho ["nombre"], $Pincho ["precio"], $Pincho["foto"] );
		} else {
			return NULL;
		}
	}

	/**
	* Recupera todos los pinchos
	*
	* @param no
	* @throws PDOException si existe error con la base de datos
	* @return $pinchos El array de pinchos recuperados de la base de datos
	*/

	public function recuperarTodosLosPinchos(){
		$stmt = $this->db->prepare ( "SELECT * FROM pincho");
		$stmt->execute();
		$pinchosRecuperados = $stmt->fetchAll();
		$pinchos = array();
		foreach ($pinchosRecuperados as $pincho) {
			$pinchos[] = new Pincho( $Pincho ["idpincho"],$pincho["nombre"], $pincho["precio"], $pincho["foto"]);
		}
		return $pinchos;
	}
	

	/**
	 * Actualiza un pincho 
	 *
	 * @param Pincho $pincho pincho con la id y los datos que se desean actualizar
	 * @param int $idEstablecimiento identificador del establecimiento asociado al pincho
	 * @throws PDOException si existe un error con la base de datos	 
	 * @throws Exception si se actualiza mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la actualizacion, false (0) en caso contrario
	 */
	public function actualizarPincho($pincho, $idEstablecimiento) {
		$stmt = $this->db->prepare ( "UPDATE pincho SET nombre=?,precio=?,foto=?,establecimiento_idestablecimiento=? WHERE idpincho=?" );
		$stmt->execute ( array (
				$pincho->getNombre(),
				$pincho->getPrecio(),
				$pincho->getFoto(),
				$idEstablecimiento,
				$pincho->getId()  
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
				//throw new Exception ( "Error al realizar la actualizacion en la BD" );
				return false;
				break;
		}
	}
	
	/**
	 * Elimina un pincho
	 *
	 * @param  $idPincho id del pincho que se desea eliminar
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se elimina mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la eliminacion, false (0) en caso contrario
	 */
	public function borrarPincho($idPincho) {
		$stmt = $this->db->prepare ( "DELETE from pincho WHERE idpincho=?" );
		$stmt->execute ( array (
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
	 * Recupera la id del pincho a partir de su nombre
	 *
	 * @param $nombrePincho Nombre del pincho del que se quiere recuperar la id
	 * @throws PDOException si existe un error con la base de datos
	 * @return $idpincho id del Pincho recuperado
	 */
	public function recuperaPinchoPorNombre($nombrePincho) {
		$stmt = $this->db->prepare ( "SELECT idpincho FROM pincho WHERE nombre=?" );
		$stmt->execute ( array (
				$nombrePincho,
		) );
		$idpincho = $stmt->fetchColumn(0);
		if ($idpincho != null) {
			return $idpincho;
		} else {
			return 0;
		}
	}
	
	/**
	 * Inserta un nuevo pincho
	 * 
	 *
	 * @param Pincho $pincho pincho con los datos que se desean insertar
	 * @param int $idEstablecimiento identificador del establecimiento al que pertenece el pincho
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function insertarPincho($pincho, $idEstablecimiento) {
		$rutaFoto = "images/" . $idEstablecimiento . ".jpg";
		$stmt = $this->db->prepare ( "INSERT INTO pincho(nombre, precio, foto, establecimiento_idestablecimiento) values (?,?,?,?)" );
		$stmt->execute ( array (
				$pincho->getNombre(),
				$pincho->getPrecio(),
				$rutaFoto,
				$idEstablecimiento
		) );
		$count = $stmt->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				//Creo la ruta de la foto obteniendo la id que acaba de asignarsele al pincho
					
				return true;
				break;
			default :
				//throw new Exception ( "Error al realizar la insercion en la BD" );
				return false;
				break;
		}
	}

	
	/**
	 * Recupera el total de codigos
	 *
	 * @param $idPincho La id del pincho al que pertenecen los codigos a consultar
	 * @throws PDOException si existe un error con la base de datos
	 * @return $maximo El codigo con la id mas alta
	 */
	public function totalCodigos($idPincho) {
		$stmt = $this->db->prepare ( "SELECT COUNT(*) FROM codigo WHERE pincho_idpincho=?" );
		$stmt->execute ( array (
				$idPincho,
		) );
		$max = $stmt->fetchColumn(0);
		if ($max != null) {
			return $max	;
		} else {
			return 0;
		}
	}
	
	/**
	 * Genera un numero N de codigos para el pincho
	 *
	 * @param Pincho $idPincho id del pincho al que se le generará un nuevo codigo
	 * @param $numCodigos numero de codigos que van a generarse
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function crearNCodigos($idPincho, $numCodigos) {	
		//Generacion del codigo
		$autoincremental=$this->totalCodigos($idPincho);
		$operacionCorrecta = true;
		for ($i = 1; $i <= $numCodigos; $i++, $autoincremental++) {
			if($this->crearCodigo($idPincho,$autoincremental)){
				// Se ha creado correctamente el codigo
			}
			else{
				$operacionCorrecta = false;
				return $operacionCorrecta;
			}
		}			
		return $operacionCorrecta;
	}
	
	/**
	 * Genera un codigo para el pincho
	 *
	 * @param Pincho $idPincho id del pincho al que se le generará un nuevo codigo
	 * @throws PDOException si existe un error con la base de datos
	 * @throws Exception si se inserta mas de una tupla en la base de datos
	 * @return boolean. Devuelve true (1) si se ha producido la insercion, false (0) en caso contrario
	 */
	public function crearCodigo($idPincho, $autoincremental) {
		
		//Generacion del codigo
		//$autoincremental=$this->totalCodigos($idPincho);
		$key='';
		$claves=array();
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
		
		$max = strlen($pattern)-1;
		
		for($i=0;$i < 3;$i++) $key .= $pattern{mt_rand(0,$max)};
	
		$claves[0]= "$idPincho"."$autoincremental"."$key";
		//$key='';
		//$autoincremental++;
		
		//Creacion del codigo con el valor que acaba de generarse
		$codigo = new Codigo($claves[0]);
		
		//Insercion en la base de datos
		$stmt = $this->db->prepare ( "INSERT INTO codigo(idcodigo, pincho_idpincho) values (?,?)" );
		$stmt->execute ( array (
				$codigo->getId(),
				$idPincho,
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
	 * Recupera la id del pincho al que pertenece un codigo
	 *
	 * @param $idPincho La id del pincho al que pertenecen los codigos a consultar
	 * @throws PDOException si existe un error con la base de datos
	 * @return $maximo El codigo con la id mas alta
	 */
	public function recuperaPinchodeCodigo($idCodigo) {
		$stmt = $this->db->prepare ( "SELECT pincho_idpincho FROM codigo WHERE idcodigo=?" );
		$stmt->execute ( array (
				$idCodigo,
		) );
		$idpincho = $stmt->fetchColumn(0);
		if ($idpincho != null) {
			return $idpincho	;
		} else {
			return 0;
		}
	}
	
	/**
	 * Comprueba que el codigo existe en la base de datos y esta asignado a la $idPincho correcta
	 *
	 * @param $idCodigo La id del pincho al que pertenecen los codigos a consultar
	 * @param $idPincho La id del pincho al que pertenecen los codigos a consultar
	 * @throws PDOException si existe un error con la base de datos
	 * @return $existe Devuelve 1 si existe y 0 si no existe
	 */
	public function compruebaCodigo($idCodigo, $idPincho) {
		$stmt = $this->db->prepare ( "SELECT count(*) FROM codigo WHERE idcodigo=? AND pincho_idpincho=?" );
		$stmt->execute ( array (
				$idCodigo,
				$idPincho
		) );
		$existe = $stmt->fetchColumn(0);
		if ($existe == 1) {
			return $existe;
		} else {
			return 0;
		}
	}

	/**
	 * Borra un codigo
	 *
	 *	Se automatiza la generacion de codigos una vez todos los asignados a un pincho han
	 *  sido utilizados, se generan 100 codigos mas para ese pincho
	 *
	 * @param $idCodigo La id del codigo que se quiere borrar de la base de datos
	 * @throws PDOException si existe un error con la base de datos
	 *  
	 */
	public function borrarCodigo($idCodigo) {
		$idPincho = $this->recuperaPinchodeCodigo($idCodigo);
		$stmt = $this->db->prepare ( "DELETE FROM codigo WHERE idcodigo=?" );
		$stmt->execute ( array (
				$idCodigo
		) );
		$count = $stmt->rowCount ();
		switch ($count) {
			case 0 :
				return false;
				break;
			case 1 :
				if ($this->totalCodigos($idPincho)==0)
				{
					$this->crearNCodigos($idPincho, "100");
				}
				return true;
				break;
			default :
				//throw new Exception ( "Error al realizar la eliminación en la BD" );
				return false;
				break;
		}
	}
	
	/**
	 * Recupera Pinchos asociados a establecimientos
	 *
	 *	Funcion que recupera todos los pinchos asociados a los establecimientos
	 *
	 * @param $arrayEstablecimientos array que contiene todos los establecimientos
	 * @throws PDOException si existe un error con la base de datos
	 *  
	 */
	public function recuperarPinchosAsociados($arrayEstablecimientos) {
		$pinchos = array();
		foreach ($arrayEstablecimientos as $establecimiento) {
			$idEstablecimiento = $establecimiento->get_id_establecimiento();
			$stmt = $this->db->prepare ( "SELECT * FROM pincho WHERE establecimiento_idestablecimiento=?" );
			$stmt->execute ( array (
				$idEstablecimiento,
				) );
			$pincho = $stmt->fetch ( PDO::FETCH_ASSOC );
			if ($pincho != null) {
				$pinchos[] = new Pincho($pincho["idpincho"],$pincho["nombre"], $pincho["precio"], $pincho["foto"]);
			}
		}
		return $pinchos;
	}	
	
	/**
	 * Recupera la id del Pincho asociado a su estableciiento
	 *
	 *	Funcion que recupera la id del pincho asociado a la id del establecimiento
	 *
	 * @param $idEstablecimiento id del establecimiento del que se quiere recuperar la id del pincho
	 * @throws PDOException si existe un error con la base de datos
	 * @return $idPincho id del pincho que pertenece al establecimiento
	 *
	 */
	public function recuperarIdPinchoAsociado($idEstablecimiento) {
		$stmt = $this->db->prepare ( "SELECT idpincho FROM pincho WHERE establecimiento_idestablecimiento=?" );
		$stmt->execute ( array (
				$idEstablecimiento,
		) );
		$idPincho = $stmt->fetch ( PDO::FETCH_ASSOC );
		if ($idPincho != null) {
			return $idPincho["idpincho"];
		}
	return $idPincho;
	}
	
	/**
	 * Recupera la nota media del Pincho asociado a las votaciones profesionales
	 *
	 *
	 * @param $idPincho id del pincho del que se quiere recuperar la nota media
	 * @throws PDOException si existe un error con la base de datos
	 * @return integer $nota nota media calculada de todas las votaciones profesionales efectuadas
	 *
	 */
	public function recuperarNotaMedia($idPincho) {
		$stmt = $this->db->prepare ( "SELECT notavotoprofesional FROM votacionprofesional WHERE pincho_idpincho=?" );
		$stmt->execute ( array (
				$idPincho,
		) );
		$notasRecuperadas = $stmt->fetchAll();
		$nota = 0;
		
		foreach ($notasRecuperadas as $notaArray) {
			$nota += $notaArray[0];
		}
		if($nota != 0)
			$nota = $nota/count($notasRecuperadas);
		
		return $nota;
	}
	
	/**
	 * Recupera el total de votaciones populares que se han hecho al pincho
	 *
	 *
	 * @param $idPincho id del pincho del que se quiere recuperar las votaciones
	 * @throws PDOException si existe un error con la base de datos
	 * @return integer $total cifra con el total de votos realizados
	 *
	 */
	public function recuperarTotalVotosPopulares($idPincho) {
		$stmt = $this->db->prepare ( "SELECT COUNT(votado) FROM votacionpopular WHERE pincho_idpincho=? AND votado=1" );
		$stmt->execute ( array (
				$idPincho,
		) );
		$total = $stmt->fetchColumn(0);
		if ($total != null)
			return $total;
		else 
			return 0;
	}
	
	/**
	 * Calcula y recupera las ids de los pinchos finalistas
	 *
	 *
	 * @param $numero numero de pinchos que pasan a la final
	 * @throws PDOException si existe un error con la base de datos
	 * @return $idPinchos array con las ids de los pinchos que pasan a la final
	 *
	 */
	public function calcularFinalistas($numero) {
		$pinchoMap = new Pinchomapper();
		$concursoMap = new Concursomapper();
		
		$stmt = $this->db->prepare ( "SELECT idpincho FROM pincho" );
		$stmt->execute ();
		$idPinchosRecuperados = $stmt->fetchAll();
		$notasVotacionProfesional = array();
		$totalVotacionPopular = array();
		$idsPincho = array();
		
		$arrayGlobal = array(array());
		$x = 0;
		
		foreach ($idPinchosRecuperados as $idPincho) {
			$notasVotacionProfesiona[$x] = $pinchoMap->recuperarNotaMedia($idPincho[0])*100;
			$totalVotacionPopular[$x] = $pinchoMap->recuperarTotalVotosPopulares($idPincho[0]);
			$idsPincho[$x] = $idPincho[0];
						
			$arrayGlobal[$x]= array('vp'=> $notasVotacionProfesiona[$x] , 'po' => $totalVotacionPopular[$x], 'id' =>$idsPincho[$x]);

			
			$x++;
			
		}
		
		$x--;
		$numeroTotalPinchos = $x;
		
		$pinchosADevolver = $numeroTotalPinchos-$numero;
		
		$arrayGlobal = $pinchoMap->msort($arrayGlobal, array('vp','po','id'));
		
		
		$idPinchos = array();
		for(; $x>$pinchosADevolver; $x--)
		{
			$idPinchos[$x] = $arrayGlobal[$x]['id'];
			$pinchoMap->establecerFinalista($arrayGlobal[$x]['id']);
		}
		
		$concursoMap->faseFinal(1);
		return $idPinchos;
	}
	
	/**
	 * Establece un pincho como finalista
	 *
	 * @param $idPincho La id del pincho que se quiere establecer como finalista
	 * @throws PDOException si existe un error con la base de datos
	 * @return $boolean Devuelve true si se ha producido con éxito la modificación, y false en el caso contrario
	 */
	public function establecerFinalista($idPincho) {
		$stmt = $this->db->prepare ( "UPDATE pincho SET finalista=1 WHERE idpincho=?" );
		$stmt->execute ( array (
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
				return false;
				break;
		}
	}
	
	/**
	 * Recupera un establecimiento asociado a un pincho por la id del pincho
	 *
	 * @param $idPincho La id del pincho que se quiere recuperar el establecimiento asociado
	 * @throws PDOException si existe un error con la base de datos
	 * @return $Establecimiento El establecimiento recuperado de la base de datos. Devuelve null si se ha producido un error.
	 */
	public function recuperarEstablecimientoAsociado($idPincho) {
		$stmt = $this->db->prepare ( "SELECT establecimiento_idestablecimiento FROM pincho WHERE idpincho=?" );
		$stmt->execute ( array (
				$idPincho
		) );
		$idEstablecimiento = $stmt->fetchAll();
		if ($idEstablecimiento != null) {
			$EstablecimientoMap = new Establecimientomapper();
			return $EstablecimientoMap->recuperarEstablecimiento($idEstablecimiento[0][0]);
		} else {
			return NULL;
		}
	}
	
	
	/**
	 * Recupera un vector de establecimientos relacionados con el vector de pinchos que se le introduce
	 *
	 * @param $arrayPinchos Vector con las id de los poinchos
	 * @throws PDOException si existe un error con la base de datos
	 * @return $establecimientos Aray con los establecimientos recuperados
	 */
	public function recuperarEstablecimientosAsociados($arrayPinchos) {
		$pinchoMap = new Pinchomapper();
		$cont = 0;
		$establecimientos = array();
		foreach ($arrayPinchos as $pincho) {
			$idPincho = $pincho->getId();
			$establecimiento = $pinchoMap->recuperarEstablecimientoAsociado($idPincho);
			if ($establecimiento != null) {
				$establecimientos[$cont++] = $establecimiento;
			}
		}
		return $establecimientos;
	}	

	/**
	 * Sort a 2 dimensional array based on 1 or more indexes.
	 *
	 * msort() can be used to sort a rowset like array on one or more
	 * 'headers' (keys in the 2th array).
	 *
	 * @param array        $array      The array to sort.
	 * @param string|array $key        The index(es) to sort the array on.
	 * @param int          $sort_flags The optional parameter to modify the sorting
	 *                                 behavior. This parameter does not work when
	 *                                 supplying an array in the $key parameter.
	 *
	 * @return array The sorted array.
	 */
	private function msort($array, $key, $sort_flags = SORT_NATURAL) {
		if (is_array($array) && count($array) > 0) {
			if (!empty($key)) {
				$mapping = array();
				foreach ($array as $k => $v) {
					$sort_key = '';
					if (!is_array($key)) {
						$sort_key = $v[$key];
					} else {
						// @TODO This should be fixed, now it will be sorted as string
						foreach ($key as $key_key) {
							$sort_key .= $v[$key_key];
						}
						$sort_flags = SORT_STRING;
					}
					$mapping[$k] = $sort_key;
				}
				asort($mapping, $sort_flags);
				$sorted = array();
				foreach ($mapping as $k => $v) {
					$sorted[] = $array[$k];
				}
				return $sorted;
			}
		}
		return $array;
	}
}


	
?>
