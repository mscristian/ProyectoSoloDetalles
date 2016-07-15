<?php
class Acceso {

	protected $nombre;
	protected $apellido;
	protected $correo;
	protected $documento;
    protected $direccion;

	
	public function __construct($nombre=null,$apellido=null,$correo=null,$documento=null,$direccion=null) {
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->correo = $correo;
		$this->documento = $documento;
        $this->direccion = $direccion;
	}
	
	public function getCantidad(){
        return $this->cantidad;
    }
    
    public function setFamilia($familia)
    {
        $this->familia= $familia;
    }
}