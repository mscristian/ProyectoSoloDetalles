<?php
class Acceso {

	protected $user;
	protected $pass;
	
	public function __construct($usuario,$contraseña) {
		$this->user = $usuario;
		$this->pass = $contraseña;
	}
	
	public function Login() {
		$db = new Conexion();
		$sql = $db->query("SELECT usser,pass FROM usuario WHERE usser='$this->user' AND pass='$this->pass';");
		$dato = $db->recorrer($sql);
		
		if(strtolower($dato['usser']) == strtolower($this->user) and $dato['pass'] == $this->pass){
			session_start();
			if ($_POST['sesion'] == 1) {
                ini_set(session.cookie_lifetime,time()+(60*60*24*7));
            }			
			$_SESSION['user'] = $this->user;
			header('location: principal.php');
		} else {
			header('location: index.php?error=datos_incorrectos');
		}
	}
	
	public function Registro() {
		
	}
	
	public function ClavePerdida() {
		
	}
}
?>