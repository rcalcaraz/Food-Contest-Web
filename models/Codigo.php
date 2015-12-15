<?php

/**
 * Class Codigo
 * Representa un Codigo. Pertenece a un pincho
 *
 * @author Edgar Figueiras Gómez
 */
class Codigo {
	
	/**
	 * La id de este codigo
	 * @var string
	 */
	private $id;
				
	
	/**
	 * El constructor
	 *
	 * @param string $id El valor de este codigo
	 * 
	 */
	public function __construct($id=NULL) {
		$this->id = $id;
	}
	/**
	 * Devuelve la id de este codigo
	 *
	 * @return string La id de este codigo
	 */
	public function getId() {
		return $this->id;
	}


	/**
	 * Establece la id de este codigo
	 *
	 * @param string $id La id de codigo
	 * @return void
	 */
	public function setId($id) {
		$this->id = $id;
	}

}
?>



