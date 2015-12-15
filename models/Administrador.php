<?php

/**
 * Class Administrador
 * Administrador es el encargado de validar pincho,gestionar JuradoProfesional,organizar concurso y administrar los establecimientos.
 *
 * @author Miguel Esmoris Lopez
 *
 **/

	class Administrador{
	/*
	 * La id del administrador
	 * @var int
	 */
	private $id;
	
	
	/**
	 * El nombre de usuario para que el administrador se autentifique
	 * @var string
	 */
	private $login;
	
	
	/**
	 * La contraseña para que el administrador se autentifique
	 * @var string
	 */
	private $password;
	
	
	/**
	 * El constructor
	 *
	 * @param int $id El identificador del administrador.
	 * @param string $login El nombre de usuario del administrador.
	 * @param string $password La contraseña del administrador.
	 * 
	 */
	public function __construct($id=NULL, $login=NULL, $password=NULL) {
		$this->id = $id;
		$this->login = $login;
		$this->password = $password;
	}
	/**
	 * Devuelve la id de este miembro del administrador
	 *
	 * @return int La id del administrador
	 */
	public function get_id() {
		return $this->id;
	}
	
	/**
	 * Devuelve el nombre de usuario de este administrador
	 *
	 * @return string El nombre de usuario de este administrador
	 */
	public function get_login() {
		return $this->login;
	}
	/**
	 * Devuelve la contraseña de este administrador
	 *
	 * @return string La contraseña de este administrador
	 */
	public function get_password() {
		return $this->password;
	}
	

	/**
	 * Establece la id de este administrador
	 *
	 * @param int $id La id de este administrador
	 * @return void
	 */
	public function set_id($id) {
		$this->id = $id;
	}


	/**
	 * Establece el nombre de usuario de este administrador
	 *
	 * @param string $login El nombre de usuario de este administrador
	 * @return void
	 */
	public function set_login($login) {
		$this->login = $login;
	}


	/**
	 * Establece la contraseña de este administrador
	 *
	 * @param string $password La contraseña de este administrador
	 * @return void
	 */
	public function set_password($password) {
		$this->password = $password;
	}

}
?>



