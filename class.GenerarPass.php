<?php

class GenerarPass {
	
	private $cadena;
	private $longitud;
	private $pass;
	
	public function __construct(){
		$this->cadena = "ABCDEFGHIJKLMNOPQRSTWXYZabcdefghijklmnopqrstwxyz0123456789";
		$this->pass = '';
	}
	
	public function NuevaPass($long){
		$lng_cadena = strlen($this->cadena);
		$this->longitud = $long;

		
		for ($x=1;$x<=$this->longitud;$x++){
			$aleatorio = mt_rand(0,$lng_cadena-1);
			$this->pass .=substr($this->cadena,$aleatorio,1);
		}
		
		return $this->pass;
	}
	
}	
