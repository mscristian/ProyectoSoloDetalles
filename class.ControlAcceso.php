<?php
class ControlAcceso{
	
	protected $usser;
	protected $fecha;
	protected $id;
	
	public function __construct($usser=null,$fecha=null,$id=null){
		$z = new Informe();
		$x=$z->ConsultarUsuario($usser);
		$this->usser=$x[0];
		$this->fecha=$fecha;
		$this->id=$id;
	}
	
	public function IniciarSesion() {
		$db = new Conexion();
		$db->query("INSERT INTO `acceso`(`Usuario_idUsuario`,`inicio_sesion`) VALUES ($this->usser,'$this->fecha');");
	}
	
	public function CerrarSesion(){
		$db = new Conexion();
		$db->query("UPDATE `acceso` SET cerro_sesion='$this->fecha' WHERE idacceso=$this->id;");
		
	}
}
?>