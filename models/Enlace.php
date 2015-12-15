<?php

/**
 * Class Enlace
 * Representa un Enlace. Pertenece a un establecimiento
 *
 * @author Miguel Esmoris Lopez
 */
class Enlace {
	
	/**
	 * La id del enlace
	 * @var int
	 */
	private $id;
	
	/**
	 * La url del enlace
	 * @var string
	 */
	private $url;
	
	
	/**
	 * El constructor
	 *
	 * @param int $id El identificador de este enlace
	 * @param string $url La url del enlace
	 * 
	 */
	public function __construct($id=NULL,$url=NULL) {
		$this->id = $id;
		$this->url = $url;
	}
	/**
	 * Devuelve la id de este enlace
	 *
	 * @return int La id de este enlace
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Devuelve la url del enlace
	 *
	 * @return string la url del enlace
	 */
	public function getUrl() {
		return $this->url;
	}
	

	/**
	 * Establece la id de este enlace
	 *
	 * @param int $id La id de este enlace
	 * @return void
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * Establece la url del enlace
	 *
	 * @param string $nombre La Url de este enlace
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

}
?>

