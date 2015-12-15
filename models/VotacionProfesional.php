<?php

/**
 * Class VotacionProfesional
 * Representa una Votacion Profesional. Pertenece a un pincho
 *
 * @author Edgar Figueiras Gómez
 */
class VotacionProfesional {
	
	/**
	 * Informa sobre el valor de la votacion efectuada
	 * @var int
	 */
	private $notaVoto;
	
	/**
	 * Contiene información sobre si el voto ha sido efectuado en la votacionfinal o no 
	 * @var int
	 */
	private $votacionFinal;
				
	
	/**
	 * El constructor de VotacionProfesional
	 *
	 * @param int $notaVoto La nota del voto
	 * @param int $votacionFinal SI la votacion a sido en la final(1) o no(0)
	 * 
	 */
	public function __construct($notaVoto=NULL, $votacionFinal=NULL) {
		$this->notaVoto = $notaVoto;
		$this->votacionFinal = $votacionFinal;
	}
	
	/**
	 * Devuelve si el pincho ha sido votado en la votacion final final(1) o no(0)
	 *
	 * @return int $votacionFinal El valor de este voto
	 */
	public function getVotacionFinal() {
		return $this->$votacionFinal;
	}
	
	/**
	 * Devuelve si el valor de la votacion
	 *
	 * @return int $notaVoto El valor de este voto
	 */
	public function getNotaVotoFinal() {
		return $this->$notaVoto;
	}
	
	
	/**
	 * Establece si el pincho ha sido votado en la votacion final final(1) o no(0)
	 *
	 * @param int $votacionFinal El valor de votacionFinal (1 o 0)
	 */
	public function setVotacionFinal($votacionFinal) {
		$this->votacionFinal = $votacionFinal;
	}
	
	/**
	 * Establece el valor del voto
	 *
	 * @param int $notaVoto El valor de este voto
	 */
	public function setNotaVotoFinal($notaVoto) {
		$this->notaVoto = $notaVoto;
	}
	

}
?>



