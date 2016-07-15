<?php
class Venta {
    
	protected $total_origianl;
	protected $total_real;
	protected $fecha;
	
	
    public function __construct($total_origianl,$total_real,$fecha) {
        $this->total_origianl=$total_origianl;
		$this->total_real=$total_real;
		$this->fecha=$fecha;
    }
    
    public function Ingresar() {
       $db = new Conexion();
		$db->query("INSERT INTO `venta`(`total_original`, `total_real`,`fecha`) VALUES ($this->total_origianl,$this->total_real,'$this->fecha');");
		
    }
	public function Imprimir() {
		echo 
		$this->total_origianl,"<br/>",
		$this->total_real,"<br/>",
		$this->fecha,"<br/>";
	}

}

?>