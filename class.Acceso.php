<?php
class Acceso {

	protected $user;
	protected $pass;
	protected $email;
	protected $tipou;
	protected $cc;
	protected $nombre;
	protected $apellido;
	protected $telefono;
	protected $ses;
	
	
	public function __construct($usuario,$contraseña,$email=null,$tipou=null,$cc=null,$nombre=null,$apellido=null,$telefono=null,$ses=null) {
		$this->user = htmlspecialchars($usuario);
		$this->pass = htmlspecialchars($contraseña);
		$this->email = htmlspecialchars($email);
		$this->tipou = $tipou;
		$this->cc = $cc;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->telefono = $telefono;
		$this->ses = $ses;
	}
	
	public function Login() {
		$db = new Conexion();
        $user = $db->real_escape_string($this->user);
        $pass = $db->real_escape_string($this->pass);
		$sql = $db->query("SELECT usser,pass FROM usuario WHERE usser='$user' AND pass='$pass';");
        if($db->rows($sql) > 0 ) {
            session_start();
			/*if ($this->ses == 1) {
                ini_set(session.cookie_lifetime,time()+(60*60*24*7));
            }			
            echo $this->ses;*/
			$_SESSION['user'] = $this->user;
			$fecha_hora_actual = date('Y-m-d H:i:s');
			$usuario = new ControlAcceso($_SESSION['user'],$fecha_hora_actual);
			$usuario->IniciarSesion();
			header('location: principal.php');
		} else {
            //echo 		$this->user,		$this->pass;
			header('location: index.php?error=datos_incorrectos');
		}
	}
	
	public function Registro() {
		$db = new Conexion();
		
		$user = $db->real_escape_string($this->user);
        $pass = $db->real_escape_string($this->pass);
		$email = $db->real_escape_string($this->email);
		
		$sql=$db->query("SELECT usser,correo FROM usuario WHERE usser='$user' OR correo='$email'");
		$existe = $db->recorrer($sql);
		
		if(strtolower($existe['usser']) != strtolower($this->user) and strtolower($existe['correo']) != strtolower($this->email)){	
			echo "validado",$existe['nombre'],$existe['correo'];
			$db->query("INSERT INTO `usuario`(`usser`, `pass`, `correo`,`tipo_usuario`,`numero_identificacion`,`nombre`, `apellido`, `telefono`) VALUES ('$user','$pass','$email','$this->tipou',$this->cc,'$this->nombre','$this->apellido',$this->telefono);");
			session_start();
			$_SESSION['user'] = $this->user;
			header('location: principal.php');
		}else if(strtolower($existe['usser']) == strtolower($this->user) and strtolower($existe['correo']) != strtolower($this->email)){
			header('location: index.php?modo=registro&error=usuario_usado');
		}else if(strtolower($existe['correo']) == strtolower($this->email) and strtolower($existe['usser']) != strtolower($this->user)){
			header('location: index.php?modo=registro&error=email_usado');
		}else if(strtolower($existe['correo']) == strtolower($this->email) and strtolower($existe['usser']) == strtolower($this->user)){
			header('location: index.php?modo=registro&error=email_user_usado');
		}
	}	
	
	public function ClavePerdida() {
		$db = new Conexion();
		$email = $db->real_escape_string($this->email);
		$sql=$db->query("SELECT correo FROM usuario WHERE correo='$email'");
		$existe = $db->recorrer($sql);
		if(strtolower($existe['correo']) == strtolower($this->email)) {
			include('includes/contenido/class.GenerarPass.php');
			$p = new GenerarPass();
			$pasword = $p->NuevaPass(10);
			$db->query("UPDATE usuario SET pass='$pasword' WHERE correo = '$this->email';");
			echo $pasword, $this->email;
			mail("$this->email",'Cambio de contraseña',"Estimado usuario se ha realizado el cambio de su contraseña a $pasword");
			header('location: index.php?modo=claveperdida&succes=1');
		}else{
			header('location: index.php?modo=claveperdida&error=email_inexistente');
		}
	}
}
?>