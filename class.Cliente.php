<?php

class Cliente {

	protected $nombre;
	protected $apellido;
	protected $documento;
	protected $correo;
	protected $telefono;
	protected $direccion;
	protected $id;
	
	public function __construct($nombre,$apellido,$documento,$correo,$telefono,$direccion,$id=null) {
		$this->nombre =  $nombre;
		$this->apellido = $apellido;
		$this->documento = $documento;
		$this->correo = $correo;
		$this->telefono = $telefono;
		$this->direccion = $direccion;
		$this->id = $id;
	}
	
	public function Ingresar(){
		$db = new Conexion();
		$db->query("INSERT INTO `cliente`(`nombre`, `apellido`, `documento`, `correo`, `telefono`, `direccion`) VALUES ('$this->nombre','$this->apellido','$this->documento','$this->correo','$this->telefono','$this->direccion');");
	}
	
	
	public function Modificar(){
		$db = new Conexion();
		$db->query("UPDATE cliente SET nombre='$this->nombre',apellido='$this->apellido',documento='$this->documento',correo='$this->correo',telefono='$this->telefono',direccion='$this->direccion' WHERE idcliente='$this->id';");		
	}
	
	public function Desactivar(){
		return 1;
	}

}

?>