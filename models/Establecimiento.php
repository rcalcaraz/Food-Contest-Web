<?php

/**
 * Class Enlace
 * Representa un Enlace. Pertenece a un establecimiento
 *
 * @author Miguel Esmoris Lopez
 */

class Establecimiento{
	/**
	 * La id del Establecimiento
	 * @var int
	 */
	private $id_establecimiento;
	/**
	 * El nombre del establecimiento
	 * @var string
	 */
	private $nombre;
	/**
	 * La direccion del establecimiento
	 * @var string
	 */
	private $direccion;
	/**
	 * Confirmacion del establecimiento
	 * @var boolean
	 * La descripcion del establecimiento
	 * @var string
	 */
	private $confirmado;
	/**
	 * La localizacion del establecimiento
	 * @var string
	 */
	private $localizacion;
	/**
	 * La descripcion del establecimiento
	 * El nombre del establecimiento
	 * @var string
	 */
	private $descripcion;
	/**
	 * La password del establecimiento
	 * @var string
	 */
	private $password;
	/**
	 * El login del establecimiento
	 * @var string
	 */
	private $login;


	/**
	 * El constructor
	 *
	 * @param int $id_establecimiento El identificador del establecimiento, es un autoincremental en la base de datos, se recomienda insertar "".
	 * @param string $nombre El nombre del establecimiento.
	 * @param string $direccion La direccion del establecimiento.
	 * @param string $localizacion La localizacion del establecimiento.
	 * @param string $confirmado Indica si el establecimiento ha sido confirmado o no.
	 * @param string $descripcion Descripcion sobre el establecimiento.
	 * @param string $login El nombre del establecimiento.
	 * @param string $password La contraseña del administrador.
	 * 
	 * 
	 */	public function __construct($id_establecimiento=NULL,$nombre=NULL,$direccion=NULL,$localizacion=NULL,$confirmado=NULL,$descripcion=NULL,$login=NULL,$password=NULL)
		{
			$this->id_establecimiento=$id_establecimiento;
			$this->nombre=$nombre;
			$this->direccion=$direccion;
			$this->localizacion=$localizacion;
			$this->confirmado=$confirmado;
			$this->descripcion=$descripcion;
			$this->login=$login;
			$this->password=$password;
		}

	// Getters
	/**
	 * Devuelve la id de este establecimiento
	 *
	 * @return int La id de este establecimiento
	 */
	public function get_id_establecimiento(){
		return $this->id_establecimiento;
	}
	/**
	 * Devuelve el nombre de este establecimiento
	 *
	 * @return string El nombre de este establecimiento
	 */
	public function get_nombre(){
		return $this->nombre;
	}
	/**
	 * Devuelve la direccion de este establecimiento
	 *
	 * @return string La direccion de este establecimiento
	 */
	public function get_direccion(){
		return $this->direccion;
	}
	/**
	 * Devuelve la descripcion de este establecimiento
	 *
	 * @return string La descripcion de este establecimiento
	 */
	public function get_descripcion(){
		return $this->descripcion;
	}
	/**
	 * Devuelve la localizacion de este establecimiento
	 *
	 * @return string La localizacion de este establecimiento
	 */
	public function get_localizacion(){
		return $this->localizacion;
	}
	/**
	 * Devuelve la confirmacion de este establecimiento
	 *
	 * @return int La confirmacion de este establecimiento
	 */
	public function get_confirmado(){
		return $this->confirmado;
	}
	/**
	 * Devuelve el login de este establecimiento
	 *
	 * @return string EL login de este establecimiento
	 */
	public function get_login(){
		return $this->login;
	}
	/**
	 * Devuelve la password de este establecimiento
	 *
	 * @return string La password de este establecimiento
	 */
	public function get_password(){
		return $this->password;
	}


	//Setters
	/**
	 * Establece la id de este establecimiento
	 *
	 * @param int $id La id de este establecimiento
	 * @return void
	 */
	public function set_id_establecimiento($id_establecimiento){
		$this->id_establecimiento=$id_establecimiento;
	}
	/**
	 * Establece el nombre de este establecimiento
	 *
	 * @param int $nombre El nombre de este establecimiento
	 * @return void
	 */
	public function set_nombre($nombre){
		$this->nombre=$nombre;
	}
	/**
	 * Establece la direccion de este establecimiento
	 *
	 * @param int $direccion La direccion de este establecimiento
	 * @return void
	 */
	public function set_direccion($direccion){
		$this->direccion=$direccion;
	}
	/**
	 * Establece la descripcion de este establecimiento
	 *
	 * @param int $descripcion La descripcion de este establecimiento
	 * @return void
	 */
	public function set_descripcion($descripcion){
		$this->descripcion=$descripcion;
	}
	/**
	 * Establece la localizacion de este establecimiento
	 *
	 * @param int $localizacion La localizacion de este establecimiento
	 * @return void
	 */
	public function set_localizacion($localizacion){
		$this->localizacion=$localizacion;
	}
	/**
	 * Establece si el establecimiento se ha confirmado
	 *
	 * @param int $confirmado Establece si el establecimiento se ha confirmado
	 * @return void
	 */
	public function set_confirmado($confirmado){
		$this->confirmado=$confirmado;
	}
	/**
	 * Establece el login de este establecimiento
	 *
	 * @param int $login El login de este establecimiento
	 * @return void
	 */
	public function set_login($login){
		$this->login=$login;
	}
	/**
	 * Establece la password de este establecimiento
	 *
	 * @param int $password La password de este establecimiento
	 * @return void
	 */
	public function set_password($password){
		$this->password=$password;
	}

}
?>
