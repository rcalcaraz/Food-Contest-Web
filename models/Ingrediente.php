<?php

/**
 * Class Ingrediente
 * Representa un Ingrediente. Relacionada con Pincho y Alergeno
 *
 * @author Edgar Figueiras Gómez
 */
class Ingrediente {
	
	/**
	 * La id de este ingrediente
	 * @var string
	 */
	private $id;	

	
	/**
	 * La nombre de este ingrediente
	 * @var string
	 */
	private $nombre;
				
	
	/**
	 * El constructor
	 *
	 * @param string $id El codigo del ingrediente
	 * @param string $nombre El nombre del ingrediente
	 * 
	 */
	public function __construct($id=NULL, $nombre=NULL) {
		$this->id = $id;
		$this->nombre = $nombre;
	}
	
	/**
	 * Devuelve la id de este ingrediente
	 *
	 * @return string La id del ingrediente
	 */
	public function getId() {
		return $this->id;
	}
	
	
	/**
	 * Establece la id de este ingrediente
	 *
	 * @param string $id La id del ingrediente
	 * @return void
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 * Devuelve el nombre de este ingrediente
	 *
	 * @return string EL nombre de este ingrediente
	 */
	public function getNombre() {
		return $this->nombre;
	}


	/**
	 * Establece el nombre de este ingrediente
	 *
	 * @param string $nombre El nombre del ingrediente
	 * @return void
	 */
	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

}
?>



