<?php

/**
 * Class Alérgeno
 * Representa un Alérgeno. Relacionada con Ingrediente
 *
 * @author Edgar Figueiras Gómez
 */
class Alergeno {
	
	/**
	 * La id de este Alérgeno
	 * @var string
	 */
	private $id;
	
	
	/**
	 * La nombre de este alergeno
	 * @var string
	 */
	private $nombre;
				
	
	/**
	 * El constructor
	 *
	 * @param string $id El codigo del alergeno
	 * @param string $nombre El nombre del alergeno
	 * 
	 */
	public function __construct($id=NULL, $nombre=NULL) {
		$this->id = $id;
		$this->nombre = $nombre;
	}
	
	/**
	 * Devuelve la id de este alergeno
	 *
	 * @return string La id del alergeno
	 */
	public function getId() {
		return $this->id;
	}
	
	
	/**
	 * Establece la id de este alergeno
	 *
	 * @param string $id La id del alergeno
	 * @return void
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 * Devuelve el nombre de este alergeno
	 *
	 * @return string EL nombre de este alergeno
	 */
	public function getNombre() {
		return $this->nombre;
	}


	/**
	 * Establece el nombre de este alergeno
	 *
	 * @param string $nombre El nombre del alergeno
	 * @return void
	 */
	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

}
?>



