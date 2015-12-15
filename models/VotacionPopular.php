<?php

/**
 * Class VotacionPopular
 * Representa una Votacion Popular. Pertenece a un pincho
 *
 * @author Edgar Figueiras Gómez
 */
class VotacionPopular {
	
	/**
	 * Informa sobre si el pincho ha sido listado o votado
	 * @var int
	 */
	private $votado;
				
	
	/**
	 * El constructor de VotacionPopular
	 *
	 * @param int $votado El valor de este voto
	 * 
	 */
	public function __construct($votado=NULL) {
		$this->votado = $votado;
	}
	/**
	 * Devuelve si el pincho ha sido votado(1) o listado(0)
	 *
	 * @return int $votado El valor de este voto
	 */
	public function getVotado() {
		return $this->votado;
	}


	/**
	 * Establece  el valor si el pincho ha sido votado(1) o listado(0)
	 *
	 * @param int $votado El valor de este voto
	 * @return void
	 */
	public function setVotado($votado) {
		$this->votado = $votado;
	}

}
?>



