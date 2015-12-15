<?php

/**
 * Class Juradopopular
 * Representa un miembro del jurado popular. Pertenece a un concurso y es administrado por un administrador
 *
 * @author Edgar Figueiras Gómez
 */
class Juradopopular {
	
	/**
	 * La id de este miembro del jurado
	 * @var int
	 */
	private $id;
	
	/**
	 * El nombre de usuario para que el jurado se autentique
	 * @var string
	 */
	private $login;
	
	/**
	 * El email con el que este miembro del jurado se registra
	 * @var string
	 */
	private $email;
	
	/**
	 * La contraseña para que el jurado se autentique
	 * @var string
	 */
	private $password;
	
	
	
	/**
	 * El constructor
	 *
	 * @param int $id El identificador de este miembro del jurado
	 * @param string $login El nombre de usuario de este miembro del jurado 
	 * @param string $email El email de este miembro del jurado
	 * @param string $password La contraseña de este miembro del jurado para autenticarse
	 * 
	 */
	public function __construct($id=NULL, $login=NULL, $email=NULL, $password=NULL) {
		$this->id = $id;
		$this->login = $login;
		$this->email = $email;
		$this->password = $password;
	}
	/**
	 * Devuelve la id de este miembro del jurado
	 *
	 * @return int La id de este miembro del jurado
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Devuelve el nombre de usuario de este miembro del jurado
	 *
	 * @return string El nombre de usuario de este miembro del jurado
	 */
	public function getLogin() {
		return $this->login;
	}
	/**
	 * Devuelve el email de este miembro del jurado
	 *
	 * @return string El email de este miembro del jurado
	 */
	public function getEmail() {
		return $this->email;
	}
	/**
	 * Devuelve la contraseña de este miembro del jurado
	 *
	 * @return string La contraseña de este miembro del jurado
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * Establece la id de este miembro del jurado
	 *
	 * @param int $id La id de este jurado
	 * @return void
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * Establece el nombre de usuario de este miembro del jurado
	 *
	 * @param string $login El nombre de usuario de este miembro del jurado
	 * @return void
	 */
	public function setLogin($login) {
		$this->login = $login;
	}

	/**
	 * Establece el email de este miembro del jurado
	 *
	 * @param string $email El email de este miembro del jurado
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Establece la contraseña de este miembro del jurado
	 *
	 * @param string $password La contraseña de este miembro del jurado
	 * @return void
	 */
	public function setPassword($password) {
		$this->password = $password;
	}
}
?>



