<?php
class Acceso {

	protected $user;
	protected $pass;
	
	public function __construct($usuario,$contraseña) {
		$this->user = htmlspecialchars($usuario);
		$this->pass = htmlspecialchars($contraseña);
	}
	
	public function Login() {
		$db = new Conexion();
        $user = $db->real_escape_string($this->user);
        $pass = $db->real_escape_string($this->pass);
		$sql = $db->query("SELECT usser,pass FROM usuario WHERE usser='$user' AND pass='$pass';");
        if($db->rows($sql) > 0 ) {
            session_start();
			if ($_POST['sesion'] == 1) {
                ini_set(session.cookie_lifetime,time()+(60*60*24*7));
            }			
            $_SESSION['user'] = $this->user;
			header('location: principal.php');
		} else {
            //echo 		$this->user,		$this->pass;
			header('location: index.php?error=datos_incorrectos');
		}
	}
	
	public function Registro() {
		
	}
	
	public function ClavePerdida() {
		
	}
}
?>