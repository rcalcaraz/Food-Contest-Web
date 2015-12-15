<?php

/**
 * Class Pincho
 * Representa un Pincho. Pertenece a un establecimiento
 *
 * @author Edgar Figueiras Gómez
 */
class Pincho {
	
	/**
	 * La id de este pincho
	 * @var int
	 */
	private $id;
	
	/**
	 * El nombre del pincho
	 * @var string
	 */
	private $nombre;
	
	/**
	 * El precio del pincho
	 * @var float
	 */
	private $precio;
	
	/**
	 * La ruta con la foto que representa al pincho
	 * @var string
	 */
	private $foto;
	
		
	
	/**
	 * El constructor
	 *
	 * @param int $id El identificador de este pincho
	 * @param string $login El nombre de este pincho
	 * @param float $precio EL precio de este pincho
	 * @param string $foto La direccion con la foto de este pincho
	 * 
	 */
	public function __construct($id=NULL, $nombre=NULL, $precio=NULL, $foto=NULL) {
		$this->id=$id;
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->foto = $foto;
	}
	
	/**
	 * Devuelve la id de este pincho
	 *
	 * @return int La id de este pincho
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Devuelve el nombre de este pincho
	 *
	 * @return string El nombre de este pincho
	 */
	public function getNombre() {
		return $this->nombre;
	}
	/**
	 * Devuelve el precio de este pincho
	 *
	 * @return float El precio de este pincho
	 */
	public function getPrecio() {
		return $this->precio;
	}
	/**
	 * Devuelve la ruta donde se almacena la foto del pincho
	 *
	 * @return string La ruta donde se alberga la foto del pincho
	 */
	public function getFoto() {
		return $this->foto;
	}

	/**
	 * Establece la id de este pincho
	 *
	 * @param int $id La id de este pincho
	 * @return void
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * Establece el nombre de usuario de este pincho
	 *
	 * @param string $nombre El nombre de usuario de este pincho
	 * @return void
	 */
	public function setLogin($nombre) {
		$this->nombre = $nombre;
	}

	/**
	 * Establece el precio de este pincho
	 *
	 * @param float $email El precio de este pincho
	 * @return void
	 */
	public function setPrecio($precio) {
		$this->precio = $precio;
	}

	/**
	 * Establece la ruta con la foto de este pincho
	 *
	 * @param string $foto La ruta donde se almacena la foto de este pincho
	 * @return void
	 */
	public function setPassword($foto) {
		$this->foto = $foto;
	}
}
?>



