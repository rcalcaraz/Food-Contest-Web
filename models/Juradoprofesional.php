<?php

/**
 * Class Juradoprofesional
 * Representa un miembro del jurado profesional. Pertenece a un concurso y es administrado por un administrador
 *
 * @author Rafael Castillo Alcaraz
 */
class Juradoprofesional {
	
	/**
	 * La id de este miembro del jurado
	 * @var int
	 */
	private $id;
	
	/**
	 * El nombre de este miembro del jurado
	 * @var string
	 */
	private $nombre;
	
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
	 * Telefono de contacto de este miembro del jurado
	 * @var string
	 */
	private $telefono;
	
	/**
	 * URL de la fotografia de perfil de este miembro del jurado
	 * @var string
	 */
	private $foto;
	
	/**
	 * Breve descripcion sobre este miembro del jurado
	 * @var string
	 */
	private $descripcion;
	
	/**
	 * El constructor
	 *
	 * @param int $id El identificador de este miembro del jurado
	 * @param string $nombre El nombre real de este miembro del jurado
	 * @param string $login El nombre de usuario de este miembro del jurado 
	 * @param string $email El email de este miembro del jurado
	 * @param string $password La contraseña de este miembro del jurado para autenticarse
	 * @param string $telefono Un telefono de contacto de este miembro del jurado
	 * @param string $foto La URL de la foto de perfil de este miembro del jurado
	 * @param string $descripcion Una breve descripcion de este miembro del jurado
	 * 
	 */
	public function __construct($id=NULL, $nombre=NULL, $login=NULL, $email=NULL, $password=NULL, $telefono=NULL, $foto=NULL, $descripcion=NULL) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->login = $login;
		$this->email = $email;
		$this->password = $password;
		$this->telefono = $telefono;
		$this->foto = $foto;
		$this->descripcion = $descripcion;
	}
	/**
	 * Devuelve la id de este miembro del jurado
	 *
	 * @return int La id de este miembro del jurado
	 */
	public function get_id() {
		return $this->id;
	}
	/**
	 * Devuelve el nombre de este miembro del jurado
	 *
	 * @return string El nombre de este miembro del jurado
	 */
	public function get_nombre() {
		return $this->nombre;
	}
	/**
	 * Devuelve el nombre de usuario de este miembro del jurado
	 *
	 * @return string El nombre de usuario de este miembro del jurado
	 */
	public function get_login() {
		return $this->login;
	}
	/**
	 * Devuelve el email de este miembro del jurado
	 *
	 * @return string El email de este miembro del jurado
	 */
	public function get_email() {
		return $this->email;
	}
	/**
	 * Devuelve la contraseña de este miembro del jurado
	 *
	 * @return string La contraseña de este miembro del jurado
	 */
	public function get_password() {
		return $this->password;
	}
	/**
	 * Devuelve el telefono de este miembro del jurado
	 *
	 * @return string El telefono de este miembro del jurado
	 */
	public function get_telefono() {
		return $this->telefono;
	}
	/**
	 * Devuelve la URL donde se encuentra la foto de este miembro del jurado
	 *
	 * @return string La URL de la foto de este miembro del jurado
	 */
	public function get_foto() {
		return $this->foto;
	}
	/**
	 * Devuelve la descripcion de este miembro del jurado
	 *
	 * @return string La descripcion de este miembro del jurado
	 */
	public function get_descripcion() {
		return $this->descripcion;
	}

	/**
	 * Establece la id de este miembro del jurado
	 *
	 * @param int $id La id de este jurado
	 * @return void
	 */
	public function set_id($id) {
		$this->id = $id;
	}

	/**
	 * Establece el nombre real de este miembro del jurado
	 *
	 * @param string $nombre El nombre de este miembro del jurado
	 * @return void
	 */
	public function set_nombre($nombre) {
		$this->nombre = $nombre;
	}

	/**
	 * Establece el nombre de usuario de este miembro del jurado
	 *
	 * @param string $login El nombre de usuario de este miembro del jurado
	 * @return void
	 */
	public function set_login($login) {
		$this->login = $login;
	}

	/**
	 * Establece el email de este miembro del jurado
	 *
	 * @param string $email El email de este miembro del jurado
	 * @return void
	 */
	public function set_email($email) {
		$this->email = $email;
	}

	/**
	 * Establece la contraseña de este miembro del jurado
	 *
	 * @param string $password La contraseña de este miembro del jurado
	 * @return void
	 */
	public function set_password($password) {
		$this->password = $password;
	}

	/**
	 * Establece el telefono de este miembro del jurado
	 *
	 * @param string $telefono El telefono de este miembro del jurado
	 * @return void
	 */
	public function set_telefono($telefono) {
		$this->telefono = $telefono;
	}
	
	/**
	 * Establece la URL de la foto de perfil de este miembro del jurado
	 *
	 * @param string $foto La URL de la foto de este miembro del jurado
	 * @return void
	 */
	public function set_foto($foto) {
		$this->foto = $foto;
	}

	/**
	 * Establece la descripcion de este miembro del jurado
	 *
	 * @param string $descripcion La descripcion de este miembro del jurado
	 * @return void
	 */
	public function set_descripcion($descripcion) {
		$this->descripcion = $descripcion;
	}
}
?>



