<?php

class Concurso{
	// Indica el identificador del concurso
	var $id_concurso;
	// Indica el comienzo de la votacion
	var $com_vot_pop;
	// Indica el final de la votacion popular
	var $fin_vot_pop;
	// Indica el final de la votacion profesional
	var $fin_vot_pro;
	// Indica el comienzo de la votacion de los finalistas
	var $com_vot_fin;
	// Indica el final de la votaion de los finalistas
	var $fin_vot_fin;
	// Indica el folleto si existe
	var $folleto;
	// Indica el nombre del concurso
	var $nombre_concurso;

	// Constructor con posible valor null de inicio
	public function __construct($id_concurso,$nombre_concurso,$com_vot_pop=null,$fin_vot_pop=null,$fin_vot_pro=null,$com_vot_fin=null,$fin_vot_fin=null,$folleto=null)
		{
			$this->id_concurso=$id_concurso;
			$this->nombre_concurso=$nombre_concurso;
			$this->com_vot_pop=$com_vot_pop;
			$this->fin_vot_pop=$fin_vot_pop;
			$this->fin_vot_pro=$fin_vot_pro;
			$this->com_vot_fin=$com_vot_fin;
			$this->fin_vot_fin=$fin_vot_fin;
			$this->folleto=$folleto;
		}	
		
	// Getters
	
	/**
	 * Devuelve la id de este concurso
	 *
	 * @return int La id de este concurso
	 */
	public function get_id_concurso(){
		return $this->id_concurso;
	}
	
	/**
	 * Devuelve el nombre de este concurso
	 *
	 * @return string el nombre de este concurso
	 */
	public function get_nombre_concurso(){
		return $this->nombre_concurso;
	}
	
	
	/**
	 * Devuelve la fecha de comienzo de la votacion popular
	 *
	 * @return date La fecha del comiendo de la votacion popular
	 */
	public function get_comienzo_vot_popular(){
		return $this->com_vot_pop;
	}
	
	
	/**
	 * Devuelve la fecha final de la votacion popular
	 *
	 * @return date La fecha de finalizacion de la votacion popular
	 */
	public function get_final_vot_pop(){
		return $this->fin_vot_pop;
	}
	
	/**
	 * Devuelve la fecha de comienzo de la votacion de los finalistas
	 *
	 * @return date La date de el comienzo de la votacion de los finalistas
	 */
	public function get_comienzo_vot_finalistas(){
		return $this->com_vot_fin;
	}
	
	/**
	 * Devuelve la fecha de la finalizacion de la votacion profesional
	 *
	 * @return date La date de la finalizacion de la votacion profesional
	 */
	public function get_final_vot_pro(){
		return $this->fin_vot_pro;
	}
	
	/**
	 * Devuelve la fecha de finalizacion de la votacion de los finalistas
	 *
	 * @return date La date de finalizacion de la votacion de los finalistas
	 */
	public function get_final_vot_finalistas(){
		return $this->fin_vot_fin;
	}
	
	/**
	 * Devuelve El folleto del concurso
	 *
	 * @return string La ruta del file que contiene el folleto
	 */
	public function get_folleto(){
		return $this->folleto;
	}
	
	//Setters
	
	/**
	 * Establece la id de este concurso
	 *
	 * @param int $id La id de este concurso
	 * @return void
	 */
	public function set_id_concurso($id_concurso){
		$this->id_concurso=$id_concurso;
	}
	
	/**
	 * Establece el nombre de este concurso
	 *
	 * @param string $nombre el nombre de este concurso
	 * @return void
	 */
	public function set_nombre_concurso($nombre_concurso){
		$this->nombre_concurso=$nombre_concurso;
	}
	
	/**
	 * Establece la fecha de comienzo de la votacion popular
	 *
	 * @param date $com_vot_pop La date del comienzo de la votacion popular
	 * @return void
	 */
	public function set_comienzo_vot_popular($com_vot_pop){
		$this->com_vot_pop=$com_vot_pop;
	}
	
	/**
	 * Establece la fecha de finalizacion de la votacion popular
	 *
	 * @param date $fin_vot_pop La fecha de finalizacion de la votacion popular
	 * @return void
	 */
	public function set_final_vot_pop($fin_vot_pop){
		$this->fin_vot_pop=$fin_vot_pop;
	}
	
	/**
	 * Establece la fecha del comienzo de la votacion de los finalistas
	 *
	 * @param date $com_vot_fin La date de comienzo de la votacion de los finalistas
	 * @return void
	 */
	public function set_comienzo_vot_finalistas($com_vot_fin){
		$this->com_vot_fin=$com_vot_fin;
	}
	
	/**
	 * Establece la fecha de finalizacion de la votacion profesional
	 *
	 * @param date $fin_vot_pro La fecha de finalizacion de la votacion profesional
	 * @return void
	 */
	public function set_final_vot_pro($fin_vot_pro){
		$this->fin_vot_pro=$fin_vot_pro;
	}
	
	/**
	 * Establece la fecha de finalizacion de la votacion de los finalistas
	 *
	 * @param date $fin_vot_fin La date finalizacionde la votacion de los finalistas
	 * @return void
	 */
	public function set_final_vot_finalistas($fin_vot_fin){
		$this->fin_vot_fin=$fin_vot_fin;
	}
	
	/**
	 * Establece el folleto del concurso
	 *
	 * @param string $folleto La url que contendra el file del folleto
	 * @return void
	 */
	public function set_folleto($folleto){
		$this->folleto=$folleto;
	}
}
?>